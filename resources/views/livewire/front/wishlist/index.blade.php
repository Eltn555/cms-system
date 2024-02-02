<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Wishlist</h2>
            <ul>
                <li><a href="{{ route('front..index') }}">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-img-1">
        <img src="assets/images/banner/breadcrumb-1.png" alt="">
    </div>
    <div class="breadcrumb-img-2">
        <img src="assets/images/banner/breadcrumb-2.png" alt="">
    </div>
</div>
<div class="wishlist-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="wishlist-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="width-remove"></th>
                                    <th class="width-thumbnail"></th>
                                    <th class="width-name">Product</th>
                                    <th class="width-price"> Unit price</th>
                                    <th class="width-stock-status"> Stock status</th>
                                    <th class="width-wishlist-cart"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td class="product-remove">
                                            <a type="button" wire:click="wishlistRemove({{ $product->id }})">×
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('front..index') }}"><img src="{{ asset('no-photo.jpg') }}"
                                                                                       alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="{{ route('front..index') }}">{{ $product->title }}</a></h5>
                                        </td>
                                        <td class="product-wishlist-price"><span
                                                class="amount">{{ $product->price }}</span></td>
                                        <td class="stock-status">
                                            <span><i class="las la-check"></i> In Stock</span>
                                        </td>
                                        <td class="wishlist-cart btn-hover"><a href="#">Add to Cart</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
