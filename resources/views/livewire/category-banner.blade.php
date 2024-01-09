<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image:url({{ asset(($background != null) ? 'storage/'.$background->image : '') }}); background-position: center; background-size: cover ;">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 id="main-title" data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">{{ $category->title }}</h2>
            <ul data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                <li><a href="{{ route('front..index') }}">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>{{ $category->title }}</li>
            </ul>
            <img src="{{asset(($icon != null) ? 'storage/'.$icon->image : '')}}" alt="{{$icon->alt}}">
        </div>
    </div>
    <div class="breadcrumb-img-1 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
        <img src="assets/images/banner/breadcrumb-1.png" alt="">
    </div>
    <div class="breadcrumb-img-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
        <img src="assets/images/banner/breadcrumb-2.png" alt="">
    </div>
</div>
