
@foreach($products as $product)
<div class="col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="product-wrap mb-35 aos-init aos-animate" data-aos="fade-up"
         data-aos-delay="400">
        <div class="product-img img-zoom mb-25">
            <a href="product-details.html">
                <img src="assets/images/product/product-6.png" alt="">
            </a>
            <div class="product-action-wrap">
                <button class="product-action-btn-1" title="Wishlist"><i
                        class="pe-7s-like"></i></button>
                <button class="product-action-btn-1" title="Quick View"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="pe-7s-look"></i>
                </button>
            </div>
            <div class="product-action-2-wrap">
                <button class="product-action-btn-2" title="Add To Cart"><i
                        class="pe-7s-cart"></i> Add to cart
                </button>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="product-details.html">{{ $product->title }}</a></h3>
            <div class="product-price">
                <span>{{ $product->price }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
