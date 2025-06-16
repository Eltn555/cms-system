@section('title', 'Калькулятор')
@section('description', 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет')
@section('keyword', 'LumenLux, lumen, lux, ')

@push('styles')
    <style>
        .container{
            max-width: 1400px;
            margin: 0 auto;
        }

        /* text loop */
        .notification-box{
            background-color: #f8b301;
            padding: 10px;
            white-space: nowrap;
            overflow: hidden;
        }
        .notification-box > div{
            display: flex;
            align-items: top;
            -webkit-animation: loop 10s infinite linear;
            animation: loop 10s infinite linear;
            padding-right: 15px;
        }
        @keyframes loop {
            100% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }

        .calc-menu{
            padding: 10px;
            white-space: nowrap;
        }
        .calc-menu a{
            background-color: #f8b301;
            color: white;
            border: white solid 1px;
            border-bottom: none;
        }
        .calc-menu a.active, .calc-menu a:hover{
            background-color: #f8f9fa;
            color: #f8b301;
        }

        .calc-content{
            padding-top: 10px;
            display: none;
            background-color: #f8f9fa;
        }
        .calc-content.active{
            display: block;
        }

        .calc-more-btn{
            background-color: #f8b301;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .calc-more-btn:hover{
            background-color: #fdd05c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
@endpush

<div>
    <div class="container mt-5 pt-5 pb-2">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 mx-0 p-1 font-cormorant position-relative">
                <h1 class="shadow-text-1 font-cormorant fw-bold">Калькулятор</h1>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Калькулятор</h5>
            </div>
        </div>
    </div>

    <!-- testing mode -->
    <div class="notification-box d-flex">
        <div>
            <p class="text-center fw-bold fs-5 font-kyiv m-0 text-danger"> Калькулятор в разработке, поэтому некоторые данные могут быть неточными. </p>
        </div>
        <div>
            <p class="text-center fw-bold fs-5 font-kyiv m-0 text-danger"> Калькулятор в разработке, поэтому некоторые данные могут быть неточными. </p>
        </div>
        <div>
            <p class="text-center fw-bold fs-5 font-kyiv m-0 text-danger"> Калькулятор в разработке, поэтому некоторые данные могут быть неточными. </p>
        </div>
    </div>

    <div class="container mt-2 m-0 w-100 p-0">
        <div class="row calc-menu m-0 p-0">
            <a href="javascript:showContent('spot');" id="spot-link" class="text-center col-3 fw-bold fs-5 font-kyiv m-0 p-2 active">Споты</a>
            <a href="javascript:showContent('led');" id="led-link" class="text-center col-3 fw-bold fs-5 font-kyiv m-0 p-2">Ленты</a>
            <a href="javascript:showContent('track');" id="track-link" class="text-center col-3 fw-bold fs-5 font-kyiv m-0 p-2">Трековые системы</a>
            <a href="javascript:showContent('chandelier');" id="chandelier-link" class="text-center col-3 fw-bold fs-5 font-kyiv m-0 p-2">Люстры</a>
        </div>
    </div>
    <div id="spot" class="calc-content active">
        <livewire:front.calculator.spot />
    </div>
    <div id="led" class="calc-content">
        {{-- <livewire:front.calculator.led /> --}}
    </div>
    <div id="track" class="calc-content">
        {{-- <livewire:front.calculator.track /> --}}
    </div>
    <div id="chandelier" class="calc-content">
        {{-- <livewire:front.calculator.chandelier /> --}}
    </div>
    <div class="container">
        <div class="row">
            <h3 class="mt-3 font-kyiv fs-3 fw-bold">Результаты</h3>
            @foreach ($products as $product)
                <div class="col-6 p-2 col-sm-4 col-md-3 col-lg-3 col-xl-2" wire:key="product-{{ $product->id }}-{{ $lux }}">
                    <livewire:front.component.product-calc :product="$product" :lux="$lux" :wire:key="'calc-'.$product->id.'-'.$lux"/>
                </div>
            @endforeach
            {{-- hide button if no more products to show--}}
            @if ($allProductsCount > $limit)
                <div class="col-12 my-3 d-flex justify-content-center">
                    <button wire:click="loadMore" class="calc-more-btn">Посмотреть еще <i class="ps-2 fa fa-angles-down"></i></button>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function showContent(id){
            document.querySelectorAll('.calc-content').forEach(content => {
                content.classList.remove('active');
            });
            document.querySelectorAll('.calc-menu a').forEach(link => {
                link.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
            document.getElementById(id + '-link').classList.add('active');
        }
        // Handle all number inputs
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('keydown', (event) => {
                const maxValue = parseFloat(input.getAttribute('max'));
                const key = event.key;

                // Allow decimal point
                if (key === '.') {
                    // Check if decimal point already exists
                    if (input.value.includes('.') || input.value.includes(',')) {
                        event.preventDefault();
                    }
                    return;
                }

                // Allow backspace, delete, arrows
                if (key === "Backspace" || key === "Delete" || key === "ArrowUp" || key === "ArrowDown" || key === "ArrowLeft" || key === "ArrowRight") {
                    return;
                }

                // Allow numbers
                if (key.match(/[0-9]/)) {
                    let currentValue = input.value;
                    const hasDecimal = currentValue.includes('.');
                    
                    // If we already have 2 decimal places, prevent more numbers
                    if (hasDecimal && currentValue.split('.')[1].length >= 2) {
                        event.preventDefault();
                        return;
                    }
                    // Check if adding this number would exceed max value
                    let newValue = parseFloat(currentValue + key);
                    if (newValue > maxValue) {
                        newValue = parseFloat(currentValue + '.' + key);
                        if(newValue > maxValue){
                            event.preventDefault();
                        }else{
                            event.preventDefault();
                            input.value = newValue;
                            // Trigger Livewire update
                            input.dispatchEvent(new Event('input', { bubbles: true }));
                        }
                    }
                } else {
                    event.preventDefault();
                }
            });

            // Handle paste event
            input.addEventListener('paste', (event) => {
                event.preventDefault();
                const pastedText = (event.clipboardData || window.clipboardData).getData('text');
                const maxValue = parseFloat(input.getAttribute('max'));
                
                // Format the pasted number to have max 2 decimal places
                const formattedNumber = parseFloat(pastedText).toFixed(2);
                
                // Check if pasted value is a valid number and within range
                if (!isNaN(formattedNumber) && parseFloat(formattedNumber) <= maxValue) {
                    input.value = formattedNumber;
                }
            });

            // Handle input event to format the number
            input.addEventListener('input', (event) => {
                const value = event.target.value;
                if (value.includes('.') || value.includes(',')) {
                    const parts = value.split(/[.,]/);
                    if (parts[1] && parts[1].length > 2) {
                        event.target.value = parseFloat(value).toFixed(2);
                    }
                }
            });
        });
    </script>
@endpush

