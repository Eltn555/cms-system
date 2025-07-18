@push('styles')
    <style>
        .room-type input{
            display: none;
        }
        .spotTypes input{
            display: none;
        }
        .room-size input{
            display: block !important;
            border: solid 1px rgb(248, 179, 1);
        }
        .room-size input::-webkit-outer-spin-button,
        .room-size input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .room-size p{
            right: 10px;
            top: 6px;
        }
        label{
            cursor: pointer;
            border: solid 2px rgb(248, 179, 1);
        }
        label i{
            color: rgb(248, 179, 1);
        }
        .room-type label:hover, .room-type label.active{
            background-color: #ffffff;
            box-shadow: 0 0 10px 3px #8ab2ff !important;
            border: 2px solid #8ab2ff;
        }

        .room-white{
            background-color: #ffffff;
        }
        .room-white:hover, .room-white.active{
            background-color: #ffffff !important;
        }
        .room-gray{
            background-color: #acacac;
        }
        .room-gray:hover, .room-gray.active{
            background-color: #acacac !important;
        }
        .room-black{
            background-color: #313131;
        }
        .room-black:hover, .room-black.active{
            background-color: #313131 !important;
        }

        .rColor label{
            border: solid 1px rgb(216, 216, 216) !important;
            width: 100%;
            height: 38px;
        }
        .rColor label.active, .rColor label:hover{
            border: solid 3px #8ab2ff !important;
        }

        .spotTypes label:hover, .spotTypes label.active{
            background-color: #ffffff;
            box-shadow: inset 0 0 5px 1px #8ab2ff !important;
            border: 2px solid #8ab2ff;
        }

        .spot-icon img{
            width: 75px;
        }
        .w-100{
            max-width: 100%;
        }
        .room-size-result{
            background-color: #f4f4f4;
            background-size: 30px 30px;
            background-image: linear-gradient(45deg, #E0E0E0 5%, transparent 5%, transparent 50%, #E0E0E0 50%, #E0E0E0 55%, transparent 55%, transparent 100%);
        }
        .room-image{
            width: 80%;
        }
        .room-image > div{
            width: 150px;
        }
        
        .room-image > div > p{
                font-size: 16px !important;
            }
        .height-room{
            top: 51%;
            left: -10px;
            transform: translateX(-50%) translateY(-50%) rotate(90deg);
        }
        .length-room{
            top: 85%;
            left: 79%;
            transform: translateX(-50%) translateY(-50%) rotate(-31deg);
        }
        .width-room{
            top: 85%;
            left: 21%;
            transform: translateX(-50%) translateY(-50%) rotate(28deg);
        }

        .info-box{
            background-image: linear-gradient(to bottom, #000000, #00000000);
        }

        @media (max-width: 1200px) {
            .room-image{
                width: 80%;
            }
        }
        @media (max-width: 1024px) {
            .room-image{
                width: 70%;
            }
            .room-image > div {
                width: 100px;
            }
        }
        @media (max-width: 992px) {
            .room-image > div{
                width: 120px;
                font-size: 14px;
            }
        }
        @media (max-width: 768px) {
            .room-image{
                width: 100%;
            }
            .room-image > div{
                width: 100px;
            }
            .room-image > div > p{
                font-size: 16px !important;
            }
        }
        @media (max-width: 576px) {
            .room-image{
                width: 100%;
            }
            .room-image > div{  
                width: 70px;
            }
            .room-image > div > p{
                font-size: 14px !important;
            }
            .room-size input{
                padding-left: 3px;
            }
        }
    </style>
@endpush

<div class="container pb-5 px-0" style="max-width: 1400px; margin: 0 auto;">
    <div class="row w-100 m-0 px-1 px-md-2 px-lg-3">
        <!-- Room type -->
        <div class="col-12 mb-3 room-type px-0 d-flex flex-wrap align-self-start">
            <h3 class="font-kyiv fs-5 fw-bold w-100">Выберите тип помещения</h3>
            @foreach ($ledRoomTypes as $roomType)
                <div style="padding: 0.1rem;" class="col-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 ">
                    <label onclick="setLoading(true);" for="lux{{ $roomType->setting_value }}" class="rounded-1 w-100 h-100 shadow-sm d-flex align-items-center justify-content-between flex-column position-relative {{ $roomType->setting_value == $ledRoomType ? 'active' : '' }}">
                        <div class="p-2 text-start position-absolute top-0 start-0 info-box">
                            <h3 class="font-kyiv fs-6 fw-bold mb-0 text-white">{{ $roomType->title }}</h3>
                            <p class="font-kyiv fw-bolder mb-0 text-white">{{ $roomType->description }}</p>
                        </div>
                        <div class="room-icon w-100">
                            <img src="{{ asset('storage/'.$roomType->media) }}" alt="{{ $roomType->title }}" class="w-100 h-100 rounded-1 object-fit-cover">
                        </div>
                        <input wire:click="setLedRoomType({{ $roomType->setting_value }})" name="led-room-type" id="lux{{ $roomType->setting_value }}" type="radio" value="{{ $roomType->setting_value }}">
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Size of the led -->
        <div class="col-12 mb-3">
            <h3 class="font-kyiv fs-5 fw-bold">Размер ленты</h3>
            <div class="row px-2 gap-1 pt-1">
                <div class="room-size row px-0 m-0" wire:ignore>
                    <div class="col-12 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i class="fa-solid fa-arrows-up-down"></i>м</p>
                        <input wire:model="ledMeter" type="number" max="100" name="led-meter" class="form-control" placeholder="Д (3.5)">
                    </div>
                </div>
            </div>
        </div>

        <!-- Calculate -->
        <div class="p-1 col-12 my-3 d-flex flex-column justify-content-center">
            <button onclick="setLoading(true);" wire:click="calculate" class="calc-more-btn w-100">Рассчитать <i class="ps-2 fa fa-calculator"></i></button>
            <p class="text-danger fs-6 mt-2 font-kyiv fw-bold m-0 p-0 col-12">{{ $error }}</p>
        </div>
        <!-- Results -->
        <div class="row w-100 m-0 px-1 px-md-2 px-lg-3">
            <div class="col-12 my-3 d-flex justify-content-between gap-2 mt-3">
                <h3 class="font-kyiv fs-3 fw-bold">Результаты</h3>
            </div>
            @foreach ($convertedProducts as $product)
                <div class="col-6 p-2 col-sm-4 col-md-3 col-lg-3 col-xl-2" wire:key="product-{{ $product->id ?? $product['id'] }}-{{ $kelvin }}">
                    <livewire:front.component.product-calc :product="$product" :lux="$kelvin" :wire:key="'calc-'.$product->id.'-'.$kelvin"/>
                </div>
            @endforeach
            @if($showMore)
                <div class="d-flex gap-2 justify-content-center w-100 mt-3">
                    <button onclick="setLoading(true);" wire:click="loadNext" class="calc-more-btn">Показать ещё <i class="fa fa-angles-right"></i></button>
                </div>
            @endif
        </div>
        <!-- Power block -->
        <div class="row w-100 m-0 px-1 px-md-2 px-lg-3">
            <div class="col-12 my-3 d-flex justify-content-between gap-2 mt-3">
                <h3 class="font-kyiv fs-3 fw-bold">Блок питания</h3>
            </div>
            @foreach ($allPowerBlocks as $product)
                <div class="col-6 p-2 col-sm-4 col-md-3 col-lg-3 col-xl-2" wire:key="product-{{ $product->id ?? $product['id'] }}-{{ $kelvin }}">
                    <livewire:front.component.product-calc :product="$product" :lux="$kelvin" :wire:key="'calc-'.$product->id.'-'.$kelvin"/>
                </div>
            @endforeach
        </div>
        <!-- Accessories -->
        <div class="row w-100 m-0 px-1 px-md-2 px-lg-3">
            <div class="col-12 my-3 d-flex justify-content-between gap-2 mt-3">
                <h3 class="font-kyiv fs-3 fw-bold">Аксессуары</h3>
            </div>
            @foreach ($allAccessories as $product)
                <div class="col-6 p-2 col-sm-4 col-md-3 col-lg-3 col-xl-2" wire:key="product-{{ $product->id ?? $product['id'] }}-{{ $kelvin }}">
                    <livewire:front.component.product-calc :product="$product" :lux="$kelvin" :wire:key="'calc-'.$product->id.'-'.$kelvin"/>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
    <script>

    </script>
@endpush
