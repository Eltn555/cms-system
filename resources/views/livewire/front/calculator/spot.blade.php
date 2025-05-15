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
        .room-size p{
            right: 35px;
            top: 7px;
        }
        label{
            cursor: pointer;
            border: solid 1px rgb(248, 179, 1);
        }
        label i{
            color: rgb(248, 179, 1);
        }
        .room-type label:hover{
            background-color: #f4f4f4;
        }
        .room-type label.active{
            background-color: #f4f4f4;
        }
        .spotTypes label:hover{
            background-color: #f4f4f4;
        }
        .spotTypes label.active{
            background-color: #f4f4f4;
        }
        .spot-icon img{
            width: 75px;
        }
        .w-100{
            max-width: 100%;
        }
        .room-size-result{
            background-color: #f4f4f4;
            height: 500px;
            background-size: 30px 30px;
            background-image: linear-gradient(45deg, #E0E0E0 5%, transparent 5%, transparent 50%, #E0E0E0 50%, #E0E0E0 55%, transparent 55%, transparent 100%);
        }
        .room-image{
            max-height: 90%;
            width: 70%;
        }
        .room-image > div{
            width: 100px;
        }
        .height-room{
            top: 47%;
            left: -17%;
            transform: rotate(90deg);
        }
        .length-room{
            left: 50%;
        }
        .width-room{
            left: 50%;
        }
    </style>
@endpush

<div class="container w-100 m-0 pb-5 px-0">
    <div class="row w-100 m-0 px-1 px-md-2 px-lg-3">
        <!-- Room type -->
        <div class="col-3 room-type px-0 d-grid gap-1" wire:ignore>
            <h3 class="font-kyiv fs-5 fw-bold">Тип помещения</h3>
            @foreach ($roomTypes as $roomType)
                <label for="lux{{ $roomType->setting_value }}" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                    <div class="w-100 ps-2 text-start">
                        <h3 class="font-kyiv fs-5 fw-bold">{{ $roomType->title }}</h3>
                        <p class="font-kyiv fs-6 fw-bolder mb-0">{{ $roomType->description }}</p>
                    </div>
                    <div class="room-icon">
                        <i class="fa-solid {{ $roomType->media }} fs-1"></i>
                    </div>
                    <input name="room-type" id="lux{{ $roomType->setting_value }}" type="radio" value="{{ $roomType->setting_value }}">
                </label>
            @endforeach
        </div>

        <!-- Size of the room -->
        <div class="col-7">
            <div class="row px-2 gap-1">
                <h3 class="font-kyiv fs-5 fw-bold">Размер помещения</h3>
                <div class="room-size row m-0">
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i style="transform: rotate(40deg);" class="fa-solid fa-arrows-left-right"></i> м</p>
                        <input type="number" max="100" name="room-length" class="form-control" placeholder="Длина">
                    </div>
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i style="transform: rotate(-40deg);" class="fa-solid fa-arrows-left-right"></i> м</p>
                        <input type="number" max="100" name="room-width" class="form-control" placeholder="Ширина">
                    </div>
                    <div class="col-4 mb-2 px-1 position-relative">
                        <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i class="fa-solid fa-arrows-up-down"></i> м</p>
                        <input type="number" max="15" name="room-height" class="form-control" placeholder="Высота">
                    </div>
                    <div class="col-12 m-0 p-1">
                        <div class="room-size-result d-flex justify-content-center align-items-center p-1">
                            <div class="room-image w-75 position-relative">
                                <div class="width-room position-absolute d-flex align-items-center justify-content-between">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    <p class="font-kyiv fs-5 fw-bold mb-0"> 10 м </p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                                <div class="length-room position-absolute d-flex align-items-center justify-content-between">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    <p class="font-kyiv fs-5 fw-bold mb-0"> 10 м </p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                                <div class="height-room position-absolute d-flex align-items-center justify-content-between">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    <p class="font-kyiv fs-5 fw-bold mb-0"> 10 м </p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                                <img src="{{ asset('3droom.png') }}" class="w-100 h-100" alt="room">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Spot types -->
        <div class="col-2 spotTypes px-0">
            <div class="row sType m-0">
                <h3 class="font-kyiv fs-5 fw-bold">Освещение</h3>
                @foreach ($spotTypes as $spotType)
                    <div class="col-6 p-1 m-0">
                        <label for="spot{{ $spotType->id }}" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                            <div class="spot-icon">
                                <img src="{{ asset('storage/'.$spotType->media) }}" alt="{{ $spotType->title }}">
                            </div>
                            <div class="w-100 text-center">
                                <p class="font-kyiv fs-6 fw-bolder mb-0">{{ $spotType->title }}</p>
                            </div>
                            <input name="spot-type" id="spot{{ $spotType->id }}" type="radio" value="{{ $spotType->setting_value }}">
                        </label>
                    </div>
                @endforeach
            </div>
            <h3 class="font-kyiv fs-5 fw-bold mt-3">Расположение</h3>
            <div class="row sLocation m-0">
                @foreach ($spotLocations as $spotLocation)
                    <div class="col-6 p-1 m-0">
                        <label for="spot{{ $spotLocation->id }}" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                            <div class="spot-icon">
                                <img src="{{ asset('storage/'.$spotLocation->media) }}" alt="{{ $spotLocation->title }}">
                            </div>
                            <div class="w-100 text-center">
                                <p class="font-kyiv fs-6 fw-bolder mb-0">{{ $spotLocation->title }}</p>
                            </div>
                            <input name="spot-location" id="spot{{ $spotLocation->id }}" type="radio" value="{{ $spotLocation->setting_value }}">
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Result -->
        <div class="col-3">
            <h3 class="font-kyiv fs-5 fw-bold">Результат</h3>
            <div class="row">
                <div class="col-12">
                    <p class="font-kyiv fs-5 fw-bold mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.querySelector('input[type="number"]').addEventListener('keydown', (event) => {
            const input = event.target;
            const maxValue = parseInt(input.getAttribute('max'));
            const currentValue = parseInt(input.value);
            const key = event.key;

            if (key !== "Backspace" && key !== "Delete" && key !== "ArrowUp" && key !== "ArrowDown") {
                if (key.match(/[0-9]/) && (parseInt(input.value + key) > maxValue)) {
                    event.preventDefault();
                }
            }
        });
        $(document).ready(function(){
            // remove active class from all siblings labels
            $('input[type="radio"]').change(function(){
                $(this).parent('label').addClass('active');
                $(this).parent('label').siblings('label').removeClass('active');
                $(this).parent('label').parent('div').siblings('div').children('label').removeClass('active');
            });
        });
    </script>
@endpush

