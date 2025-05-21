@section('title', 'Калькулятор')
@section('description', 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет')
@section('keyword', 'LumenLux, lumen, lux, ')

@push('styles')
    <style>
        .container{
            max-width: 1400px;
            margin: 0 auto;
        }
    </style>
@endpush

<div>
    <div class="container mt-5 py-5">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 mx-0 p-1 font-cormorant position-relative">
                <h1 class="shadow-text-1 font-cormorant fw-bold">Калькулятор</h1>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Калькулятор</h5>
            </div>
        </div>
    </div>
    <livewire:front.calculator.spot />
    Продуктов:{{ $products->count() }}<br>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 p-2 col-sm-4 col-md-3 col-lg-2" wire:key="product-{{ $product->id }}-{{ $lux }}">
                    <livewire:front.component.product-calc :product="$product" :lux="$lux" :wire:key="'calc-'.$product->id.'-'.$lux"/>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
    <script>
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

