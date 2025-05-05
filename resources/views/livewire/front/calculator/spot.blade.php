@push('styles')
    <style>

    </style>
@endpush

<div class="container pb-5">
    <div class="row">
        <!-- Тип помещения -->
        <div class="col-3 room-type">
            <label for="20lux" class="border p-2 shadow-sm w-100">
                <div class="room-icon">
                    <i class="fa-solid fa-stairs"></i>
                </div>
                <input id="20lux" type="radio" value="20">20 - Лестница, падвал
            </label>
                
                <input type="radio" value="50">50 - Санузел, ванная
                <input type="radio" value="75">75 - Холл, коридор
                <input type="radio" value="100">100 - Сауна, бассейн
                <input type="radio" value="150">150 - Кухня, жилая комната
                <input type="radio" value="200">200 - Зал, переговорная
                <input type="radio" value="300">300 - Офис, кабинет
                <input type="radio" value="500">500 - Офис, чертежные раб.
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
        </div>
    </div>
</div>
