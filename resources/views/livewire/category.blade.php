<div class="col-lg-3">
    <div class="sidebar-wrapper">
        <div class="sidebar-widget mb-40 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="search-wrap-2">
                <form class="search-2-form" action="#">
                    <input placeholder="Search*" type="text">
                    <button class="button-search"><i class=" ti-search "></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
             data-aos="fade-up" data-aos-delay="200">
            <div class="sidebar-widget-title mb-30">
                <h3>Filter By Price</h3>
            </div>
            <div class="price-filter">
                <div id="slider-range"
                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"
                         style="left: 0%; width: 77.7778%;"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                          style="left: 0%;"></span><span tabindex="0"
                                                         class="ui-slider-handle ui-corner-all ui-state-default"
                                                         style="left: 77.7778%;"></span></div>
                <div class="price-slider-amount">
                    <div class="label-input">
                        <label>Price:</label>
                        <input type="text" id="amount" name="price" placeholder="Add Your Price">
                    </div>
                    <button type="button">Filter</button>
                </div>
            </div>
        </div>
        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
             data-aos="fade-up" data-aos-delay="200">

            <!-- SIDEBAR CATEGORY LIST -->

            <div class="sidebar-widget-title mb-25">
                <h3>Product Categories</h3>
            </div>

            <div class="sidebar-list-style">
                <ul>
                    @foreach($categories as $category)
                        <li><a onclick="changeTitle({{$category->id}})" id="select-category-{{ $category->id }}">{{ $category->title }}<span>{{ $category->products->count() }}</span></a></li>
                    @endforeach
                </ul>
            </div>

        </div>



        <div class="sidebar-widget aos-init" data-aos="fade-up" data-aos-delay="200">
            <div class="sidebar-widget-title mb-25">
                <h3>Tags</h3>
            </div>
            <div class="sidebar-widget-tag">
                <a href="#">All, </a>
                <a href="#">Clothing, </a>
                <a href="#"> Kids, </a>
                <a href="#">Accessories, </a>
                <a href="#">Stationery, </a>
                <a href="#">Homelife, </a>
                <a href="#">Appliances, </a>
                <a href="#">Clothing, </a>
                <a href="#">Baby, </a>
                <a href="#">Beauty </a>
            </div>
        </div>
    </div>
</div>
