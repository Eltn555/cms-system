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
            box-shadow: inset 0 0 5px 1px #8ab2ff !important;
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
        <div class="col-12 mb-3 room-type px-0 d-flex flex-wrap align-self-start" wire:ignore>
            <h3 class="font-kyiv fs-5 fw-bold w-100">Тип помещения</h3>
            {{-- @foreach ($roomTypesKelvin as $roomType)
                <div style="padding: 0.1rem;" class="col-12 col-sm-6 col-lg-12">
                    <label for="lux{{ $roomType->setting_value }}" class="rounded-1 p-1 p-md-2 w-100 h-100 shadow-sm d-flex align-items-center justify-content-between">
                        <div class="w-100 ps-2 text-start">
                        <h3 class="font-kyiv fs-6 fw-bold mb-0">{{ $roomType->title }}</h3>
                        <p class="font-kyiv fw-bolder mb-0">{{ $roomType->description }}</p>
                    </div>
                    <div class="room-icon px-2">
                        <i class="fa-solid {{ $roomType->media }} fs-1"></i>
                    </div>
                        <input wire:model="roomTypeValue" name="room-type" id="lux{{ $roomType->setting_value }}" type="radio" value="{{ $roomType->setting_value }}">
                    </label>
                </div>
            @endforeach --}}
        </div>

        <!-- Size of the room -->
        <div class="col-12 col-lg-6 mb-3">
            <h3 class="font-kyiv fs-5 fw-bold">Размер помещения</h3>
            <div class="row px-2 gap-1 pt-1">
                <div class="room-size row px-0 m-0" wire:ignore>
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i style="transform: rotate(40deg);" class="fa-solid fa-arrows-left-right"></i>м</p>
                        <input wire:model="roomSize.length" type="number" max="100" name="room-length" class="form-control" placeholder="Д (3.5)">
                    </div>
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i style="transform: rotate(-40deg);" class="fa-solid fa-arrows-left-right"></i>м</p>
                        <input wire:model="roomSize.width" type="number" max="100" name="room-width" class="form-control" placeholder="Ш (2.5)">
                    </div>
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i class="fa-solid fa-arrows-up-down"></i>м</p>
                        <input wire:model="roomSize.height" type="number" max="15" name="room-height" class="form-control" placeholder="В (3.1)">
                    </div>
                </div>

                <div class="col-12 m-0 p-1">
                    <div class="room-size-result d-flex justify-content-center align-items-center p-5">
                        <div class="room-image position-relative">
                            <div class="width-room position-absolute d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p class="font-kyiv fs-md-5 fw-bold mb-0"> {{ $roomSize['length'] ?? '0'}} м </p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="length-room position-absolute d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p class="font-kyiv fs-md-5 fw-bold mb-0"> {{$roomSize['width'] ?? '0'}} м</p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="height-room position-absolute d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p class="font-kyiv fs-md-5 fw-bold mb-0"> {{$roomSize['height'] ?? '0'}} м </p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <img src="{{ asset('3droom.png') }}" loading="lazy" class="w-100 h-100" alt="room">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spot types -->
        <div class="col-12 col-lg-3 mb-3 spotTypes px-0">
            <h3 class="font-kyiv fs-5 fw-bold">Оттенок помещения</h3>
            <div class="row rColor m-0 pt-1">
                {{-- <div class="col-4 p-0 m-0">
                    <label for="white" class="room-white p-2 shadow-sm d-flex flex-column {{ $roomColor == 0.8 ? 'active' : '' }} align-items-center justify-content-between">
                        <input wire:click="upRoomColor(0.8)" id="white" type="radio" class="">
                    </label>
                </div>
                <div class="col-4 p-0 m-0">
                    <label for="gray" class="room-gray p-2 shadow-sm d-flex flex-column {{ $roomColor == 0.6 ? 'active' : '' }} align-items-center justify-content-between">
                        <input wire:click="upRoomColor(0.6)" id="gray" type="radio" class="">
                    </label>
                </div>
                <div class="col-4 p-0 m-0">
                    <label for="black" class="room-black p-2 shadow-sm d-flex flex-column {{ $roomColor == 0.4 ? 'active' : '' }} align-items-center justify-content-between">
                        <input wire:click="upRoomColor(0.4)" id="black" type="radio" class="">
                    </label>
                </div> --}}
            </div>
            {{-- <h3 class="font-kyiv fs-5 fw-bold mt-3">Освещение</h3>
            <div class="row sType m-0">
                @foreach ($spotTypes as $spotType)
                    <div class="col-6 p-1 m-0">
                        <label for="spot{{ $spotType->id }}" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between {{ $spotTypeValue == $spotType->setting_value ? 'active' : '' }}">
                            <div class="spot-icon">
                                <img src="{{ asset('storage/'.$spotType->media) }}" alt="{{ $spotType->title }}">
                            </div>
                            <div class="w-100 text-center">
                                <p class="font-kyiv fs-6 fw-bolder mb-0">{{ $spotType->title }}</p>
                            </div>
                            <input wire:click="upSpotTypeValue({{ $spotType->setting_value }})" id="spot{{ $spotType->id }}" type="radio">
                        </label>
                    </div>
                @endforeach
            </div> --}}
            <h3 class="font-kyiv fs-5 fw-bold mt-3">Расположение</h3>
            {{-- <div class="row sLocation m-0">
                @foreach ($spotLocations as $spotLocation)
                    <div class="col-6 p-1 m-0">
                        <label for="spot{{ $spotLocation->id }}" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between {{ $spotLocationValue == $spotLocation->setting_value ? 'active' : '' }}">
                            <div class="spot-icon">
                                <img src="{{ asset('storage/'.$spotLocation->media) }}" alt="{{ $spotLocation->title }}">
                            </div>
                            <div class="w-100 text-center">
                                <p class="font-kyiv fs-6 fw-bolder mb-0">{{ $spotLocation->title }}</p>
                            </div>
                            <input wire:click="upSpotLocationValue({{ $spotLocation->setting_value }})" id="spot{{ $spotLocation->id }}" type="radio">
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="p-1 col-12 my-3 d-flex flex-column justify-content-center">
                <button wire:click="lux" class="calc-more-btn w-100">Рассчитать <i class="ps-2 fa fa-calculator"></i></button>
                <p class="text-danger fs-6 mt-2 font-kyiv fw-bold m-0 p-0 col-12">{{ $error }}</p>
            </div> --}}
        </div>
    </div>
</div>

@push('scripts')
    <script>

    </script>
@endpush
