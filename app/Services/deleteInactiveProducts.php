<?php

namespace App\Services;

use App\Models\Product;
use App\Models\WishlistProduct;
use App\Models\CartProduct;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductCategory;
use App\Models\AdditionalTag;
use App\Models\CategoryProduct;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class deleteInactiveProducts
{
    //for special usage
    public function massDelete()
    {
        $batchSize = 100;
        $processed = 0;
        $page = 0;

        do {
            $products = Product::select('id')
                ->where('status', 0)//inactive products
                ->where('updated_at', '<', now()->subDays(45)) // 45 days without update
                ->where('deleted_at', null)
                ->skip($page * $batchSize)
                ->take($batchSize)
                ->get();

            $count = $products->count();
            if ($count === 0) break;

            foreach ($products as $product) {
                $product->delete();
                $processed++;
                echo "$processed - {$product->id}\n";
                usleep(100000); // sleep 0.1 second
            }
            echo "Page: $page\n, Processed: $processed\n";
            $page++;
        } while ($count === $batchSize);

        $this->destroyOldProducts();
    }

    private function destroyOldProducts()
    {
        $batchSize = 100;
        $page = 0;
        $batchCount = 0;
        $imagesCount = 0;
        do {
            $products = Product::onlyTrashed()
                ->select('id')
                ->skip($page * $batchSize)
                ->take($batchSize)
                ->get();

            $count = $products->count();
            if ($count === 0) break;

            $productIds = $products->pluck('id');

            // Related records
            $wishlistIds = WishlistProduct::whereIn('product_id', $productIds)->withTrashed()->pluck('id');
            $cartIds = CartProduct::whereIn('product_id', $productIds)->pluck('id');
            $images = ProductImage::whereIn('product_id', $productIds)->withTrashed()->get();
            $tagsIds = ProductTag::whereIn('product_id', $productIds)->pluck('id');
            $additionalTagsIds = AdditionalTag::whereIn('product_id', $productIds)->pluck('id');
            $categoriesIds = CategoryProduct::whereIn('product_id', $productIds)->pluck('id');
            $imagesIds = $images->pluck('image_id');

            // Delete images from storage
            foreach ($images as $image) {
                if ($image->image) {
                    Storage::delete('public/' . $image->image);
                    $imagesCount++;
                }
            }

            // Destroy related records
            WishlistProduct::whereIn('id', $wishlistIds)->forceDelete();
            CartProduct::whereIn('id', $cartIds)->forceDelete();
            ProductImage::whereIn('id', $images->pluck('id'))->forceDelete();
            ProductTag::whereIn('id', $tagsIds)->forceDelete();
            AdditionalTag::whereIn('id', $additionalTagsIds)->forceDelete();
            CategoryProduct::whereIn('id', $categoriesIds)->forceDelete();
            Image::whereIn('id', $imagesIds)->forceDelete();

            // Force delete products
            Product::onlyTrashed()->whereIn('id', $productIds)->forceDelete();

            $batchCount += $count;
            $page++;
        } while ($count === $batchSize);
        echo "Deleted: $batchCount\n, Images: $imagesCount\n";
    }
}
