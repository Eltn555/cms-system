@section('style')
    <style>
        .icon-input{
            top: 12px;
            left: 15px;
        }
        @media only screen and (max-width: 767px) {
            .cart-content .position-absolute{
                bottom: -12px !important;
                right: -15px !important;
            }
            .cart-content li{
                padding-bottom: 1.3rem!important;
            }
        }
        @media only screen and (min-width: 768px) {
            .profile{
                margin-top: 100px;
            }
        }
    </style>
@endsection

<div>
    <div class="profile ms-md-5 mb-md-5 pt-5 pb-2 py-md-0 mx-0 font-cormorant position-relative row">
        <div class="col-6 pt-2">
            <h5 class="shadow-text-1 font-cormorant fw-bold">Профиль</h5>
            <h5 class="shadow-text-2 font-cormorant fw-bold">Профиль</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#account"  class="{{!$isOrders ? 'active' : ''}}" data-bs-toggle="tab">Личная информация</a>
                    <a href="#orders" class="{{$isOrders ? 'active' : ''}}" data-bs-toggle="tab">Покупки</a>
                </div>
            </div>



                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="tab-content mb-5" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade {{!$isOrders ? 'show active' : ''}}" id="account" role="tabpanel">
                            <div class="myaccount-content font-kyiv" data-aos="zoom-in" data-aos-delay="10">
                                <h3 class="fw-semibold">Личная информация</h3>
                                <div class="account-details-form">
                                    <form method="POST" action="{{ route('updateProfile') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6" style="height: 100px">
                                                <div class="single-input-item">
                                                    <label for="first-name" class="required">Имя</label>
                                                    <div class="position-relative">
                                                        <input name="name" class="d-none ps-5" type="text" id="first-name" placeholder="Ваше имя" value="{{ $profile->name ?? '' }}"/>
                                                        <span class="ps-5 pt-3 position-absolute top-50 proInfo">{{ $profile->name ?? '-'}}</span>
                                                        <div class="position-absolute icon-input">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1334_4361)">
                                                                    <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C"
                                                                            stroke-width="1.5"/>
                                                                    <circle cx="9.99935" cy="9.99996" r="8.33333"
                                                                            stroke="#8C8C8C" stroke-width="1.5"/>
                                                                    <path
                                                                        d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667"
                                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                                        stroke-linecap="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1334_4361">
                                                                        <rect width="20" height="20" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 100px">
                                                <div class="single-input-item">
                                                    <label for="last-name" class="required">Фамилия</label>
                                                    <div class="position-relative">
                                                        <input name="lastname" class="d-none ps-5" type="text" id="last-name" placeholder="Ваша фамилия" value="{{ $profile->lastname ?? ''}}"/>
                                                        <span class="ps-5 pt-3 position-absolute top-50 proInfo">{{ $profile->lastname ?? '-'}}</span>
                                                        <div class="position-absolute icon-input">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1334_4361)">
                                                                    <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C"
                                                                            stroke-width="1.5"/>
                                                                    <circle cx="9.99935" cy="9.99996" r="8.33333"
                                                                            stroke="#8C8C8C" stroke-width="1.5"/>
                                                                    <path
                                                                        d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667"
                                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                                        stroke-linecap="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1334_4361">
                                                                        <rect width="20" height="20" fill="white"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 100px">
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Номер телефона</label>
                                                    <div class="position-relative">
                                                        <input name="phone" class="tel d-none ps-5" type="tel" id="display-name" placeholder="+998 555 005 444" value="{{ $profile->phone ?? ''}}"/>
                                                        <span class="ps-5 pt-3 position-absolute top-50 proInfo">{{ $profile->phone ?? '-'}}</span>
                                                        <div class="position-absolute icon-input">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.834 2.5C10.834 2.5 12.6673 2.66667 15.0007 5C17.334 7.33333 17.5007 9.16667 17.5007 9.16667"
                                                                    stroke="#8C8C8C" stroke-width="1.5"
                                                                    stroke-linecap="round"/>
                                                                <path
                                                                    d="M11.0059 5.44641C11.0059 5.44641 11.8308 5.68211 13.0683 6.91955C14.3057 8.15699 14.5414 8.98194 14.5414 8.98194"
                                                                    stroke="#8C8C8C" stroke-width="1.5"
                                                                    stroke-linecap="round"/>
                                                                <path
                                                                    d="M7.53132 5.26344L8.07217 6.23254C8.56025 7.10711 8.36432 8.25439 7.59559 9.02312C7.59559 9.02313 7.59559 9.02313 7.59559 9.02313C7.59548 9.02324 6.66325 9.95568 8.35376 11.6462C10.0436 13.3361 10.976 12.4052 10.9768 12.4044C10.9769 12.4043 10.9768 12.4044 10.9769 12.4043C11.7456 11.6356 12.8929 11.4397 13.7674 11.9278L14.7365 12.4686C16.0571 13.2056 16.2131 15.0577 15.0523 16.2185C14.3548 16.916 13.5003 17.4587 12.5558 17.4945C10.9656 17.5548 8.26523 17.1524 5.55642 14.4435C2.84761 11.7347 2.44518 9.03431 2.50546 7.4442C2.54127 6.49963 3.084 5.64516 3.7815 4.94765C4.9423 3.78686 6.79431 3.94282 7.53132 5.26344Z"
                                                                    stroke="#8C8C8C" stroke-width="1.5"
                                                                    stroke-linecap="round"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 100px">
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Электронная почта</label>
                                                    <div class="position-relative">
                                                        <input name="email" class="d-none ps-5" type="email" id="email" placeholder="sample@mail.uz" value="{{ $profile->email ?? ''}}"/>
                                                        <span class="ps-5 pt-3 position-absolute top-50 proInfo">{{ $profile->email ?? '-'}}</span>
                                                        <div class="position-absolute icon-input">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.66602 10C1.66602 6.85734 1.66602 5.286 2.64233 4.30968C3.61864 3.33337 5.18999 3.33337 8.33268 3.33337L11.666 3.33337C14.8087 3.33337 16.3801 3.33337 17.3564 4.30968C18.3327 5.286 18.3327 6.85734 18.3327 10C18.3327 13.1427 18.3327 14.7141 17.3564 15.6904C16.3801 16.6667 14.8087 16.6667 11.666 16.6667H8.33268C5.18999 16.6667 3.61864 16.6667 2.64233 15.6904C1.66602 14.7141 1.66602 13.1427 1.66602 10Z"
                                                                    stroke="#8C8C8C" stroke-width="1.5"/>
                                                                <path
                                                                    d="M5 6.66663L6.79908 8.16586C8.32961 9.4413 9.09488 10.079 10 10.079C10.9051 10.079 11.6704 9.4413 13.2009 8.16586L15 6.66663"
                                                                    stroke="#8C8C8C" stroke-width="1.5"
                                                                    stroke-linecap="round"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset>
                                            <h3 class="fw-semibold">Информация доставки</h3>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="citySelect" class="required">Город</label>
                                                        <select name="city" id="citySelect" disabled type="text">
                                                            {!! $profile->city ? "<option value=".$profile->city." selected>".$profile->city."</option>" : ''!!}
                                                            <option value="Ташкент">Ташкент</option>
                                                            <option value="Ташкентскаяобласть">Ташкентская область</option>
                                                            <option value="Самарканд">Самарканд</option>
                                                            <option value="Нукус">Нукус</option>
                                                            <option value="Андижон">Андижон</option>
                                                            <option value="Наманган">Наманган</option>
                                                            <option value="Фергана">Фергана</option>
                                                            <option value="Карши">Карши</option>
                                                            <option value="Термез">Термез</option>
                                                            <option value="Бухара">Бухара</option>
                                                            <option value="Джизак">Джизак</option>
                                                            <option value="Навои">Навои</option>
                                                            <option value="Ургенч">Ургенч</option>
                                                            <option value="Гулистан">Гулистан</option>
                                                            <option value="Нурафшон">Нурафшон</option>
                                                            <option value="Сырдарьинскаяобласть">Сырдарьинская область</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="regionSelect" class="required">Район</label>
                                                        <select name="state" id="regionSelect" disabled>
                                                            {!! $profile->state ? "<option value=".$profile->state." selected>".$profile->state."</option>" : ''!!}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="street" class="required">Улица</label>
                                                        <input name="address" class="adrs" disabled type="text" id="street" placeholder="Введите полный адрес"
                                                               value="{{ $profile->address ?? ''}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="display-name" class="required">Дом</label>
                                                        <input name="home" class="adrs" disabled type="text" id="display-name"
                                                               placeholder="Введите дом, подъезд, этаж"
                                                               value="{{ $profile->home ?? ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="single-input-item btn-hover">
                                            <button class="check-btn sqr-btn edit" onclick="event.preventDefault();">Редактировать</button>
                                            <button class="check-btn sqr-btn submit d-none" type="submit">Сохранить</button>
                                            <button class="check-btn sqr-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade {{$isOrders ? 'show active' : ''}}" id="orders" role="tabpanel">
                            <div class="myaccount-content">
                                <div class="container">
                                    <div class="section-title-tab-wrap mb-75">
                                        <div class="tab-style-1 nav w-100 row m-0 p-0" data-aos="fade-up" data-aos-delay="100">
                                            <a class="active col-12 col-md-4 m-0 border-bottom" href="#pro-1" data-bs-toggle="tab">Все заказы</a>
                                            <a class="col-12 col-md-4 m-0 border-bottom" href="#pro-2" data-bs-toggle="tab" class="">Активные</a>
                                            <a class="col-12 col-md-4 m-0 border-bottom" href="#pro-3" data-bs-toggle="tab" class="">Завершенные</a>
                                        </div>
                                    </div>
                                    <div class="tab-content jump">
                                        <div id="pro-1" class="tab-pane active">
                                            <div class="cart-content">
                                                <ul>
                                                    @foreach($items as $item)
                                                        <li class="border-bottom pb-3 mb-3 position-relative">
                                                            <div class="cart-img d-flex align-items-center">
                                                                <a href="{{route('front.product.show', ['slug' => $item->product->slug])}}"><img src="{{asset(($item->product->images()->first()) ? 'storage/'.$item->product->images()->first()->image : 'no_photo.jpg')}}" alt="{{$item->product->title}}"></a>
                                                            </div>
                                                            <div class="cart-title w-100 position-relative">
                                                                <h4><a href="{{route('front.product.show', ['slug' => $item->product->slug])}}">{{mb_strimwidth($item->product->title, 0, 70, '..')}}</a></h4>
                                                                <span class="span">{{mb_strimwidth($item->product->short_description, 0, 80, '..')}}</span><br>
                                                                <span class="span">Количество: {{$item->amount}}шт</span><br>
                                                                <span class="span">Дата заказа: {{$item->onUpdate}}</span>
                                                                <div class="product-details-action-wrap font-kyiv">
                                                                    <div class="product-details-price py-md-3">
                                                                        <span class="p-1 fs-6 new-price">{{number_format($item->overall, 0, '.', ' ')}} сум </span>
                                                                        @if(optional($item->sale->payments)->status)
                                                                            @if($item->sale->payments->status == 'completed')
                                                                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#029400">
                                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 10.1666 20.4518 8.46124 19.5103 7.03891L12.355 14.9893C11.6624 15.7589 10.4968 15.8726 9.66844 15.2513L6.4 12.8C5.95817 12.4686 5.86863 11.8418 6.2 11.4C6.53137 10.9582 7.15817 10.8686 7.6 11.2L10.8684 13.6513L18.214 5.48955C16.5986 3.94717 14.4099 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" fill="#00ff62"/> </g>
                                                                            </svg>
                                                                            @elseif($item->sale->payments->status == 'pending')
                                                                                <svg width="25px" height="25px" viewBox="0 0 30 30" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                                                                        .st0{fill:#FD6A7E;}
                                                                                        .st1{fill:#17B978;}
                                                                                        .st2{fill:#8797EE;}
                                                                                        .st3{fill:#41A6F9;}
                                                                                        .st4{fill:#37E0FF;}
                                                                                        .st5{fill:#2FD9B9;}
                                                                                        .st6{fill:#F498BD;}
                                                                                        .st7{fill:#FFDF1D;}
                                                                                        .st8{fill:#C6C9CC;}
                                                                                    </style><path class="st8" d="M15,4C8.9,4,4,8.9,4,15s4.9,11,11,11s11-4.9,11-11S21.1,4,15,4z M21.7,16.8c-0.1,0.4-0.5,0.6-0.9,0.5l-5.6-1.1  c-0.2,0-0.4-0.2-0.6-0.3C14.2,15.7,14,15.4,14,15c0,0,0,0,0,0l0.2-8c0-0.5,0.4-0.8,0.8-0.8c0.4,0,0.8,0.4,0.8,0.8l0.1,6.9l5.2,1.8  C21.6,15.8,21.8,16.3,21.7,16.8z"/></svg>
                                                                            @elseif($item->sale->payments->status == 'failed')
                                                                                <svg width="25px" height="25px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ff0000" stroke="#ff0000">
                                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                    <g id="SVGRepo_iconCarrier"> <title>cancelled</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="add" fill="#000000" transform="translate(42.666667, 42.666667)"> <path d="M213.333333,1.42108547e-14 C331.15408,1.42108547e-14 426.666667,95.5125867 426.666667,213.333333 C426.666667,331.15408 331.15408,426.666667 213.333333,426.666667 C95.5125867,426.666667 4.26325641e-14,331.15408 4.26325641e-14,213.333333 C4.26325641e-14,95.5125867 95.5125867,1.42108547e-14 213.333333,1.42108547e-14 Z M42.6666667,213.333333 C42.6666667,307.589931 119.076736,384 213.333333,384 C252.77254,384 289.087204,370.622239 317.987133,348.156908 L78.5096363,108.679691 C56.044379,137.579595 42.6666667,173.894198 42.6666667,213.333333 Z M213.333333,42.6666667 C173.894198,42.6666667 137.579595,56.044379 108.679691,78.5096363 L348.156908,317.987133 C370.622239,289.087204 384,252.77254 384,213.333333 C384,119.076736 307.589931,42.6666667 213.333333,42.6666667 Z" id="Combined-Shape"> </path> </g> </g> </g>
                                                                                </svg>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-100 d-flex justify-content-end m-0 p-3 fw-semibold position-absolute bottom-0 end-0
                                                                    {!!($item->sale->status == 'Получено') ? ' text-success "><svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_250_5961)">
<path d="M1.66602 10.0001C1.66602 6.07171 1.66602 4.10752 2.8864 2.88714C4.10679 1.66675 6.07098 1.66675 9.99935 1.66675C13.9277 1.66675 15.8919 1.66675 17.1123 2.88714C18.3327 4.10752 18.3327 6.07171 18.3327 10.0001C18.3327 13.9285 18.3327 15.8926 17.1123 17.113C15.8919 18.3334 13.9277 18.3334 9.99935 18.3334C6.07098 18.3334 4.10679 18.3334 2.8864 17.113C1.66602 15.8926 1.66602 13.9285 1.66602 10.0001Z" fill="#32C77F" stroke="#32C77F" stroke-width="1.5"/>
<path d="M7.08398 10.4167L8.75065 12.0834L12.9173 7.91675" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_250_5961">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
' : ' text-warning"> <svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.666 2.43341V9.35841C11.666 10.2084 10.9743 10.9001 10.1243 10.9001H2.49935C2.04102 10.9001 1.66602 10.5251 1.66602 10.0667V4.74175C1.66602 3.04175 3.04102 1.66675 4.74102 1.66675H10.891C11.3243 1.66675 11.666 2.00841 11.666 2.43341Z" fill="#F8B301"/>
<path d="M17.916 12.9167C18.1493 12.9167 18.3327 13.1001 18.3327 13.3334V14.1667C18.3327 15.5501 17.216 16.6667 15.8327 16.6667C15.8327 15.2917 14.7077 14.1667 13.3327 14.1667C11.9577 14.1667 10.8327 15.2917 10.8327 16.6667H9.16602C9.16602 15.2917 8.04102 14.1667 6.66602 14.1667C5.29102 14.1667 4.16602 15.2917 4.16602 16.6667C2.78268 16.6667 1.66602 15.5501 1.66602 14.1667V12.5001C1.66602 12.0417 2.04102 11.6667 2.49935 11.6667H10.416C11.566 11.6667 12.4993 10.7334 12.4993 9.58341V5.00008C12.4993 4.54175 12.8743 4.16675 13.3327 4.16675H14.0327C14.6327 4.16675 15.1827 4.49175 15.4827 5.00841L16.016 5.94175C16.091 6.07508 15.991 6.25008 15.8327 6.25008C14.6827 6.25008 13.7493 7.18341 13.7493 8.33341V10.8334C13.7493 11.9834 14.6827 12.9167 15.8327 12.9167H17.916Z" fill="#F8B301"/>
<path d="M6.66667 18.3333C7.58714 18.3333 8.33333 17.5871 8.33333 16.6667C8.33333 15.7462 7.58714 15 6.66667 15C5.74619 15 5 15.7462 5 16.6667C5 17.5871 5.74619 18.3333 6.66667 18.3333Z" fill="#F8B301"/>
<path d="M13.3327 18.3333C14.2532 18.3333 14.9993 17.5871 14.9993 16.6667C14.9993 15.7462 14.2532 15 13.3327 15C12.4122 15 11.666 15.7462 11.666 16.6667C11.666 17.5871 12.4122 18.3333 13.3327 18.3333Z" fill="#F8B301"/>
<path d="M18.3333 10.4417V11.6667H15.8333C15.375 11.6667 15 11.2917 15 10.8333V8.33333C15 7.875 15.375 7.5 15.8333 7.5H16.9083L18.1167 9.61667C18.2583 9.86667 18.3333 10.15 18.3333 10.4417Z" fill="#F8B301"/>
</svg>
' !!} {{$item->sale->status}}
                                                                </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="pro-2" class="tab-pane">
                                                                <div class="cart-content">
                                                                    <ul>
                                                                        @foreach($process as $item)
                                                                            <li class="border-bottom pb-3 mb-3 position-relative">
                                                                                <div class="cart-img d-flex align-items-center">
                                                                                    <a href="{{route('front.product.show', ['slug' => $item->product->slug])}}"><img src="{{asset(($item->product->images()->first()) ? 'storage/'.$item->product->images()->first()->image : 'no_photo.jpg')}}" alt="{{$item->product->title}}"></a>
                                                                                </div>
                                                                                <div class="cart-title w-100 position-relative">
                                                                                    <h4><a href="{{route('front.product.show', ['slug' => $item->product->slug])}}">{{mb_strimwidth($item->product->title, 0, 70, '..')}}</a></h4>
                                                                                    <span class="span">{{mb_strimwidth($item->product->short_description, 0, 80, '..')}}</span><br>
                                                                                    <span class="span">Количество: {{$item->amount}}шт</span><br>
                                                                                    <span class="span">Дата заказа: {{$item->onUpdate}}</span>
                                                                                    <div class="product-details-action-wrap font-kyiv">
                                                                                        <div class="product-details-price py-md-3">
                                                                                            <span class="p-1 fs-6 new-price">{{number_format($item->overall, 0, '.', ' ')}} сум</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="w-100 d-flex justify-content-end m-0 p-3 fw-semibold position-absolute bottom-0 end-0
                                                                    {!!($item->sale->status == 'Получено') ? ' text-success "><svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_250_5961)">
<path d="M1.66602 10.0001C1.66602 6.07171 1.66602 4.10752 2.8864 2.88714C4.10679 1.66675 6.07098 1.66675 9.99935 1.66675C13.9277 1.66675 15.8919 1.66675 17.1123 2.88714C18.3327 4.10752 18.3327 6.07171 18.3327 10.0001C18.3327 13.9285 18.3327 15.8926 17.1123 17.113C15.8919 18.3334 13.9277 18.3334 9.99935 18.3334C6.07098 18.3334 4.10679 18.3334 2.8864 17.113C1.66602 15.8926 1.66602 13.9285 1.66602 10.0001Z" fill="#32C77F" stroke="#32C77F" stroke-width="1.5"/>
<path d="M7.08398 10.4167L8.75065 12.0834L12.9173 7.91675" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_250_5961">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
' : ' text-warning"> <svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.666 2.43341V9.35841C11.666 10.2084 10.9743 10.9001 10.1243 10.9001H2.49935C2.04102 10.9001 1.66602 10.5251 1.66602 10.0667V4.74175C1.66602 3.04175 3.04102 1.66675 4.74102 1.66675H10.891C11.3243 1.66675 11.666 2.00841 11.666 2.43341Z" fill="#F8B301"/>
<path d="M17.916 12.9167C18.1493 12.9167 18.3327 13.1001 18.3327 13.3334V14.1667C18.3327 15.5501 17.216 16.6667 15.8327 16.6667C15.8327 15.2917 14.7077 14.1667 13.3327 14.1667C11.9577 14.1667 10.8327 15.2917 10.8327 16.6667H9.16602C9.16602 15.2917 8.04102 14.1667 6.66602 14.1667C5.29102 14.1667 4.16602 15.2917 4.16602 16.6667C2.78268 16.6667 1.66602 15.5501 1.66602 14.1667V12.5001C1.66602 12.0417 2.04102 11.6667 2.49935 11.6667H10.416C11.566 11.6667 12.4993 10.7334 12.4993 9.58341V5.00008C12.4993 4.54175 12.8743 4.16675 13.3327 4.16675H14.0327C14.6327 4.16675 15.1827 4.49175 15.4827 5.00841L16.016 5.94175C16.091 6.07508 15.991 6.25008 15.8327 6.25008C14.6827 6.25008 13.7493 7.18341 13.7493 8.33341V10.8334C13.7493 11.9834 14.6827 12.9167 15.8327 12.9167H17.916Z" fill="#F8B301"/>
<path d="M6.66667 18.3333C7.58714 18.3333 8.33333 17.5871 8.33333 16.6667C8.33333 15.7462 7.58714 15 6.66667 15C5.74619 15 5 15.7462 5 16.6667C5 17.5871 5.74619 18.3333 6.66667 18.3333Z" fill="#F8B301"/>
<path d="M13.3327 18.3333C14.2532 18.3333 14.9993 17.5871 14.9993 16.6667C14.9993 15.7462 14.2532 15 13.3327 15C12.4122 15 11.666 15.7462 11.666 16.6667C11.666 17.5871 12.4122 18.3333 13.3327 18.3333Z" fill="#F8B301"/>
<path d="M18.3333 10.4417V11.6667H15.8333C15.375 11.6667 15 11.2917 15 10.8333V8.33333C15 7.875 15.375 7.5 15.8333 7.5H16.9083L18.1167 9.61667C18.2583 9.86667 18.3333 10.15 18.3333 10.4417Z" fill="#F8B301"/>
</svg>
' !!} {{$item->sale->status}}
                                                                </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="pro-3" class="tab-pane">
                                                                                    <div class="cart-content">
                                                                                        <ul>
                                                                                            @foreach($complated as $item)
                                                                                                <li class="border-bottom pb-3 mb-3 position-relative">
                                                                                                    <div class="cart-img d-flex align-items-center">
                                                                                                        <a href="{{route('front.product.show', ['slug' => $item->product->slug])}}"><img src="{{asset(($item->product->images()->first()) ? 'storage/'.$item->product->images()->first()->image : 'no_photo.jpg')}}" alt="{{$item->product->title}}"></a>
                                                                                                    </div>
                                                                                                    <div class="cart-title w-100 position-relative">
                                                                                                        <h4><a href="{{route('front.product.show', ['slug' => $item->product->slug])}}">{{mb_strimwidth($item->product->title, 0, 70, '..')}}</a></h4>
                                                                                                        <span class="span">{{mb_strimwidth($item->product->short_description, 0, 80, '..')}}</span><br>
                                                                                                        <span class="span">Количество: {{$item->amount}}шт</span><br>
                                                                                                        <span class="span">Дата заказа: {{$item->onUpdate}}</span>
                                                                                                        <div class="product-details-action-wrap font-kyiv">
                                                                                                            <div class="product-details-price py-md-3">
                                                                                                                <span class="p-1 fs-6 new-price">{{number_format($item->overall, 0, '.', ' ')}} сум</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                        <div class="w-100 d-flex justify-content-end m-0 p-3 fw-semibold position-absolute bottom-0 end-0
                                                                    {!!($item->sale->status == 'Получено') ? ' text-success "><svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_250_5961)">
<path d="M1.66602 10.0001C1.66602 6.07171 1.66602 4.10752 2.8864 2.88714C4.10679 1.66675 6.07098 1.66675 9.99935 1.66675C13.9277 1.66675 15.8919 1.66675 17.1123 2.88714C18.3327 4.10752 18.3327 6.07171 18.3327 10.0001C18.3327 13.9285 18.3327 15.8926 17.1123 17.113C15.8919 18.3334 13.9277 18.3334 9.99935 18.3334C6.07098 18.3334 4.10679 18.3334 2.8864 17.113C1.66602 15.8926 1.66602 13.9285 1.66602 10.0001Z" fill="#32C77F" stroke="#32C77F" stroke-width="1.5"/>
<path d="M7.08398 10.4167L8.75065 12.0834L12.9173 7.91675" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_250_5961">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
' : ' text-warning"> <svg class="me-1" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.666 2.43341V9.35841C11.666 10.2084 10.9743 10.9001 10.1243 10.9001H2.49935C2.04102 10.9001 1.66602 10.5251 1.66602 10.0667V4.74175C1.66602 3.04175 3.04102 1.66675 4.74102 1.66675H10.891C11.3243 1.66675 11.666 2.00841 11.666 2.43341Z" fill="#F8B301"/>
<path d="M17.916 12.9167C18.1493 12.9167 18.3327 13.1001 18.3327 13.3334V14.1667C18.3327 15.5501 17.216 16.6667 15.8327 16.6667C15.8327 15.2917 14.7077 14.1667 13.3327 14.1667C11.9577 14.1667 10.8327 15.2917 10.8327 16.6667H9.16602C9.16602 15.2917 8.04102 14.1667 6.66602 14.1667C5.29102 14.1667 4.16602 15.2917 4.16602 16.6667C2.78268 16.6667 1.66602 15.5501 1.66602 14.1667V12.5001C1.66602 12.0417 2.04102 11.6667 2.49935 11.6667H10.416C11.566 11.6667 12.4993 10.7334 12.4993 9.58341V5.00008C12.4993 4.54175 12.8743 4.16675 13.3327 4.16675H14.0327C14.6327 4.16675 15.1827 4.49175 15.4827 5.00841L16.016 5.94175C16.091 6.07508 15.991 6.25008 15.8327 6.25008C14.6827 6.25008 13.7493 7.18341 13.7493 8.33341V10.8334C13.7493 11.9834 14.6827 12.9167 15.8327 12.9167H17.916Z" fill="#F8B301"/>
<path d="M6.66667 18.3333C7.58714 18.3333 8.33333 17.5871 8.33333 16.6667C8.33333 15.7462 7.58714 15 6.66667 15C5.74619 15 5 15.7462 5 16.6667C5 17.5871 5.74619 18.3333 6.66667 18.3333Z" fill="#F8B301"/>
<path d="M13.3327 18.3333C14.2532 18.3333 14.9993 17.5871 14.9993 16.6667C14.9993 15.7462 14.2532 15 13.3327 15C12.4122 15 11.666 15.7462 11.666 16.6667C11.666 17.5871 12.4122 18.3333 13.3327 18.3333Z" fill="#F8B301"/>
<path d="M18.3333 10.4417V11.6667H15.8333C15.375 11.6667 15 11.2917 15 10.8333V8.33333C15 7.875 15.375 7.5 15.8333 7.5H16.9083L18.1167 9.61667C18.2583 9.86667 18.3333 10.15 18.3333 10.4417Z" fill="#F8B301"/>
</svg>
' !!} {{$item->sale->status}}
                                                                </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

@section('scripts')
    <script>

        $(document).on('click', '.edit', function() {
            $(this).addClass('editing').removeClass('edit');
            $('input, select').prop('disabled', false);
            $('input, select').removeClass('d-none');
            $('.proInfo').addClass('d-none');
            $('.submit').removeClass('d-none');
        });
        $(document).on('click', '.editing', function() {
            $(this).addClass('edit').removeClass('editing');
            $('input, select').prop('disabled', true);
            $('input').addClass('d-none');
            $('.adrs').removeClass('d-none');
            $('.proInfo').removeClass('d-none');
            $('.submit').addClass('d-none');
        });
        // Define regions for each city
        const regions = {
            Ташкент: ["Алмазарский район", "Чиланзарский район", "Шайхантахурский район", "Яккасарайский район", "Учтепинский район", "Мирабадский район", "Мирзо-Улугбекский район", "Сергелийский район", "Юнусабадский район", "Янгихаётский район", "Яшнободский район", "Bektemir district"],
            Ташкентскаяобласть: ["Аккурганский район", "Бектемирский район", "Бостонликский район", "Боёвутский район", "Чирчикский район", "Келесский район", "Кибрайский район", "Нининский район", "Охангаронский район", "Акташский район", "Паркентский район", "Пискентский район", "Куйичирчикский район", "Ухчисаройский район", "Янгиюльський район", "Янгиюльский район"],
            Самарканд: ["Булунгурский район", "Иштыханский район", "Джамбайский район", "Каттакурганский район", "Кушрабадский район", "Нариманский район", "Нурабадский район"],
            Нукус: ["Нукус"],
            Андижон: ["Асакинский район", "Балыкский район", "Бозский район", "Булакбашинский район", "Избасканский район", "Джалалкудукский район", "Мархаматский район", "Олтынский район", "Пахтаabadский район", "Кургантепинский район", "Шахриханский район", "Улугнорский район", "Ходжаабадский район", "Андижанский район"],
            Наманган: ["Учкурганский район", "Тойтепинский район", "Чордаринский район", "Косонсойский район", "Папский район", "Уйчинский район", "Наманганский район"],
            Фергана: ["Адижанский район", "Алтыарыкский район", "Багдадский район", "Бешарикский район", "Узбекский район", "Ферганский район", "Ёзяванский район", "Кувинский район", "Сохский район"],
            Карши: ["Косонсойский район", "Шахрисабзский район"],
            Термез: ["Денауский район", "Сариасийский район"],
            Бухара: ["Аккурганский район", "Бухара тумани", "Гиждувон тумани", "Каган тумани", "Каракуль тумани", "Когон тумани", "Нурота тумани", "Пешкунлар тумани", "Ромитан тумани", "Шофиркон тумани", "Жондор тумани"],
            Джизак: ["Арнасой тумани", "Бахмаль тумани", "Заамин тумани", "Дўстлик тумани", "Зарбдор тумани", "Мирзачўл тумани", "Пахтакор тумани", "Фариш тумани"],
            Навои: ["Карман тумани", "Конимех тумани", "Йўлотан тумани", "Кизирик тумани", "Навоий тумани", "Томди тумани", "Учғозар тумани", "Чиноз тумани"],
            Ургенч: ["Багат тумани", "Гурлан тумани", "Урганч тумани", "Хазорасп тумани", "Шовот тумани"],
            Гулистан: ["Гулистан тумани", "Миришкор тумани", "Сардоба тумани", "Учкўприк тумани", "Хаваст тумани"],
            Нурафшон: ["Шамхана тумани", "Миришкор тумани", "Гулистан тумани"],
            Сырдарьинскаяобласть: ["Аккурганский район", "Бекабадский район", "Букинский район", "Гуlistonский район", "Сардобский район", "Хавастский район", "Пахтакорский район"],
        };

        // Function to populate the region select options based on the selected city
        function populateRegions() {
            const citySelect = document.getElementById("citySelect");
            const regionSelect = document.getElementById("regionSelect");
            const selectedCity = citySelect.value;

            // Clear existing options
            regionSelect.innerHTML = "";

            // Populate with options for the selected city
            regions[selectedCity].forEach(region => {
                const option = document.createElement("option");
                option.value = region;
                option.textContent = region;
                regionSelect.appendChild(option);
            });
        }

        profile = "{{ $profile->state }}";
        window.onload = function () {
            if (profile == '') {
                populateRegions();
            }
        };

        // Event listener to populate regions when city is selected
        document.getElementById("citySelect").addEventListener("change", populateRegions);
    </script>
@endsection
