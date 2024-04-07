<div class="sidebar-cart-all">
        <a class="cart-close"><i class="pe-7s-close"></i></a>
        <h1 class="font-cormorant fw-bolder pb-4 border-bottom border-1 mb-5">Корзина</h1>
        <div class="cart-content">
            <ul>
                @foreach($items as $item)
                    <li>
                        <div class="cart-img">
                            <a href="#"><img src="" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">{{$item->title}}</a></h4>
                            <span>ID {{$item->id}}</span>
                            <span>Count {{}}</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cart-bottom">
            <div class="border-bottom border-1 text-secondary d-flex justify-content-between">
                <p class="font-kyiv fs-5">Промежуточный итог:</p>
                <p class="font-kyiv fs-5 fw-bolder text-black">1420000</p>
            </div>
            <div class="pt-2">
                <p class="text-secondary font-kyiv">Налоги, стоимость доставки рассчитывается при оформлении заказа.</p>
            </div>
            <div class="d-flex">
                <div class="single-product-cart btn-hover w-50 pe-1 text-center">
                    <a href="#" class="w-100 text-dark bg-light border border-1">Посмотреть корзину</a>
                </div>
                <div class="single-product-cart btn-hover w-50 ps-1 text-center">
                    <a href="#" class="w-100 text-dark">Перейти к оплате</a>
                </div>
            </div>
        </div>
    </div>
