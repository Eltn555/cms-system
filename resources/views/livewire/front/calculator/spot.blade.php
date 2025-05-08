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
            width: 100px;
        }
    </style>
@endpush

<div class="container pb-5 px-0">
    <div class="row">
        <!-- Room type -->
        <div class="col-3 room-type px-0 d-grid gap-1">
            <h3 class="font-kyiv fs-5 fw-bold">Тип помещения</h3>
            <label for="lux20" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">20 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Лестница, падвал</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-stairs fs-1"></i>
                </div>
                <input name="room-type" id="lux20" type="radio" value="20">
            </label>
            <label for="lux50" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">50 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Санузел, ванная</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-bath fs-1"></i>
                </div>
                <input name="room-type" id="lux50" type="radio" value="50">
            </label>
            <label for="lux75" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">75 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Холл, коридор</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-building-columns fs-1"></i>
                </div>
                <input name="room-type" id="lux75" type="radio" value="75">
            </label>
            <label for="lux100" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">100 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Сауна, бассейн</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-person-swimming fs-1"></i>
                </div>
                <input name="room-type" id="lux100" type="radio" value="100">
            </label>
            <label for="lux150" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">150 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Кухня, жилая комната</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-house fs-1"></i>
                </div>
                <input name="room-type" id="lux150" type="radio" value="150">
            </label>
            <label for="lux200" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">200 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Зал, переговорная</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-briefcase fs-1"></i>
                </div>
                <input name="room-type" id="lux200" type="radio" value="200">
            </label>
            <label for="lux300" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">300 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Офис, кабинет</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-building fs-1"></i>
                </div>
                <input name="room-type" id="lux300" type="radio" value="300">
            </label>
            <label for="lux500" class="rounded-1 p-2 shadow-sm w-100 d-flex align-items-center justify-content-between">
                <div class="w-100 ps-2 text-start">
                    <h3 class="font-kyiv fs-5 fw-bold">500 - Люкс</h3>
                    <p class="font-kyiv fs-6 fw-bolder mb-0">Офис, чертежные раб.</p>
                </div>
                <div class="room-icon">
                    <i class="fa-solid fa-compass-drafting fs-1"></i>
                </div>
                <input name="room-type" id="lux500" type="radio" value="500">
            </label>
        </div>

        <!-- Size of the room -->
        <div class="col-6">

        </div>

        <!-- Spot types -->
        <div class="col-3 spotTypes px-0">
            <h3 class="font-kyiv fs-5 fw-bold">Размер помещения</h3>
            <div class="row room-size">
                <div class="col-12 mb-2 p-0 position-relative">
                    <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i class="fa-solid fa-arrows-left-right"></i> м</p>
                    <input type="number" name="room-length" class="form-control" placeholder="Длина">
                </div>
                <div class="col-12 mb-2 p-0 position-relative   ">
                    <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i style="transform: rotate(-45deg);" class="fa-solid fa-arrows-left-right"></i> м</p>
                    <input type="number" name="room-width" class="form-control" placeholder="Ширина">
                </div>
                <div class="col-12 mb-2 p-0 position-relative">
                    <p class="font-kyiv fs-5 fw-bold mb-0 position-absolute"><i class="fa-solid fa-arrows-up-down"></i> м</p>
                    <input type="number" name="room-height" class="form-control" placeholder="Высота">
                </div>
            </div>
            <h3 class="font-kyiv fs-5 fw-bold mt-3">Освещение</h3>
            <div class="row sType">
                <div class="col-6 p-1 m-0">
                    <label for="spotDot" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                        <div class="spot-icon">
                            <img src="{{ asset('storage/calc/straight.png') }}" alt="Точечный">
                        </div>
                        <div class="w-100 text-center">
                            <p class="font-kyiv fs-6 fw-bolder mb-0">Точечный</p>
                        </div>
                        <input name="spot-type" id="spotDot" type="radio" value="point">
                    </label>
                </div>
                <div class="col-6 p-1 m-0">
                    <label for="spotSpread" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                        <div class="spot-icon">
                            <img src="{{ asset('storage/calc/spread.png') }}" alt="Россыпной">
                        </div>
                        <div class="w-100 text-center">
                            <p class="font-kyiv fs-6 fw-bolder mb-0">Россыпной</p>
                        </div>
                        <input name="spot-type" id="spotSpread" type="radio" value="spread">
                    </label>
                </div>
            </div>
            <h3 class="font-kyiv fs-5 fw-bold mt-3">Расположение</h3>
            <div class="row sLocation">
                <div class="col-6 p-1 m-0">
                    <label for="spotInside" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                        <div class="spot-icon">
                            <img src="{{ asset('storage/calc/inside.png') }}" alt="Внутри">
                        </div>
                        <div class="w-100 text-center">
                            <p class="font-kyiv fs-6 fw-bolder mb-0">Внутри</p>
                        </div>
                        <input name="spot-location" id="spotInside" type="radio" value="inside">
                    </label>
                </div>
                <div class="col-6 p-1 m-0">
                    <label for="spotOutside" class="rounded-1 p-2 shadow-sm d-flex flex-column align-items-center justify-content-between">
                        <div class="spot-icon">
                            <img src="{{ asset('storage/calc/outside.png') }}" alt="Снаружи">
                        </div>
                        <div class="w-100 text-center">
                            <p class="font-kyiv fs-6 fw-bolder mb-0">Снаружи</p>
                        </div>
                        <input name="spot-location" id="spotOutside" type="radio" value="outside">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
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

