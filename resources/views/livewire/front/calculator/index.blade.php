@section('title', 'Калькулятор')
@section('description', 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет')
@section('keyword', 'LumenLux, lumen, lux, ')

@push('styles')
    <style>
        
    </style>
@endpush

<div>
    <div class="container mt-5 py-5">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 font-cormorant position-relative">
                <h1 class="shadow-text-1 font-cormorant fw-bold">Калькулятор</h1>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Калькулятор</h5>
            </div>
        </div>
    </div>
    <livewire:front.calculator.spot />
</div>

@push('scripts')
    <script>
        
    </script>
@endpush

