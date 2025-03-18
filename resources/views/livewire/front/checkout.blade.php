@section('title', 'Чекаут')
@section('style')
    <style>
        .fw-500{
            font-weight: 510 !important;
        }
        p{
            color: rgba(161, 161, 161, 1);
        }
        .map-radio input{
            width: 20px;
            height: 20px;
            margin-right: 15px;
        }
        .map-radio{
            cursor: pointer;
        }
        .showroom{
            cursor: pointer;
        }
        .selected_map{
            color: #F8B301 !important;
            border-color: #F8B301 !important;
        }
        .expanded{
            height: 0px;
            transition: 1s !important;
        }
        .showroomList{
            overflow: hidden;
            transition: 1s !important;
        }
        .deliverySet{
            overflow: hidden;
            transition: 1s !important;
        }
        .bg-light{
            background-color: rgb(244,244,244) !important;
        }
        .payment-meth{
            height: 100px;
            padding: 10px;
        }
        .payment-meth button{
            border: 1px solid #F4F4F4;
            width: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .payment-meth button:focus{
            border: 1px solid #F8B301;
        }
        .payment-meth img{
            width: 100%;
        }
        .flash-message{
            top: 100px;
            right: 10px;
            opacity: 1;
            transition: 0.2s;
            position: fixed !important;
        }
        .hiddenmsg{
            right: -500px;
            opacity: 0;
            transition: 1s;
            position: fixed;
        }
    </style>
@endsection

<div class="itemss container mt-0 mt-md-3 mt-lg-5 pt-5">
    <div class="row sidebar-cart-all pt-4 overflow-hidden">
        <h1 class="font-cormorant fw-bolder pb-0 pb-md-2 pb-lg-3 mb-2">Оформление заказа</h1>

        <div class="col-12 col-lg-8 cart-content px-2">
{{--            user Info--}}
            <div class="text-secondary p-4 border-1 border mb-5">
                <h3 class="font-cormorant fw-bolder pb-3 border-bottom-1 mb-4">Информация покупателя</h3>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <p class="mb-1">Имя</p>
                        <p class="text-black fw-500">{{$user->name}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="mb-1">Номер телефона</p>
                        <p class="text-black fw-500">{{$user->phone}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="mb-1">Электронная почта</p>
                        <p class="text-black fw-500">{{$user->email}}</p>
                    </div>
                </div>
            </div>

{{--            delivery/collect--}}
            <div class="text-secondary p-4 border-1 border mb-5">
                <h3 class="font-cormorant fw-bolder pb-3 border-bottom-1 mb-4">Информация доставки</h3>

{{--collect Info--}}
                <div class="mb-3">
                    <div class="p-3 d-flex align-items-center justify-content-between bg-light border showroom">
                        <div class="d-flex align-items-center ">
                            <svg class="pick-up" width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 7L8 1L1 7" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg class="pick-up d-none" width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 1L8 7L1 1" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="text-black mb-0 ms-4 ps-1 fw-semibold">Забрать из шоурума</p>
                        </div>
                        <p class="mb-0 fw-semibold">Ташкент, Самарканд</p>
                    </div>
                    <div class="font-kyiv showroomList {{($addressCollected)?'expanded':''}}">
                        <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio row m-0" wire:click="updateCollect('г. Ташкент, Ц5  (Напротив Респуликанской пожарки)')">
                            <div class="col-12 col-lg-8 d-flex align-items-center">
                                <input class="radio mt-2 mt-lg-0" type="radio" name="location" {{($collect == 'г. Ташкент, Ц5  (Напротив Респуликанской пожарки)') ? 'checked' : ''}}>
                                <p class="mb-0 fw-semibold text-black">г. Ташкент, Ц5  (напротив Респуликанской пожарки)</p>
                            </div>
                            <div class="col-12 col-lg-4 d-flex justify-content-lg-end justify-content-start align-items-center ps-5 ps-lg-0 p-0">
                                <p class="mb-0">Пн - Сб  10:00 - 19:00</p>
                            </div>
                        </div>
                        <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio row m-0" wire:click="updateCollect('Ул. Паркентская, дом 241')">
                            <div class="col-12 col-lg-8 d-flex align-items-center">
                                <input class="radio mt-2 mt-lg-0" type="radio" name="location" {{($collect == 'Ул. Паркентская, дом 241') ? 'checked' : ''}}>
                                <p class="mb-0 fw-semibold text-black">Ул. Паркентская, дом 241</p>
                            </div>
                            <div class="col-12 col-lg-4 d-flex justify-content-lg-end justify-content-start align-items-center ps-5 ps-lg-0 p-0">
                                <p class="mb-0">Пн - Сб  10:00 - 19:00</p>
                            </div>
                        </div>
                        <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio row m-0" wire:click="updateCollect('г. Самарканд, Микрорайон (Напротив поликлиники)')">
                            <div class="col-12 col-lg-8 d-flex align-items-center">
                                <input class="radio mt-2 mt-lg-0" type="radio" name="location" {{($collect == 'г. Самарканд, Микрорайон (Напротив поликлиники)') ? 'checked' : ''}}>
                                <p class="mb-0 fw-semibold text-black">г. Самарканд, Микрорайон (напротив поликлиники)</p>
                            </div>
                            <div class="col-12 col-lg-4 d-flex justify-content-lg-end justify-content-start align-items-center ps-5 ps-lg-0 p-0">
                                <p class="mb-0">Пн - Сб  10:00 - 19:00</p>
                            </div>
                        </div>
                    </div>
                </div>

{{--                delivery Info--}}
                <div class="">
                    <div class="p-3 d-block d-md-flex align-items-center justify-content-between bg-light border delivery">
                        <div class="d-flex align-items-center ">
                            <svg class="pick-down d-none" width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 7L8 1L1 7" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg class="pick-down " width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 1L8 7L1 1" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="text-black mb-0 ms-4 ps-1 fw-semibold">Доставка</p>
                        </div>
                        <p class="mb-0 fw-semibold text-end">Бесплатная доставка по городу</p>
                    </div>
                    <div class="font-kyiv deliverySet {{(!$addressCollected)?'expanded':''}}">
                        <div wire:ignore class="row mt-2">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="citySelect" class="required">Город</label>
                                    <select id="citySelect" wire:click="$emit('Address', 'city', $event.target.options[$event.target.selectedIndex].text)" type="text">
                                        <option value="tashkent">Ташкент</option>
                                        <option value="tashkentobl">Ташкентская область</option>
                                        <option value="samarkand">Самарканд</option>
                                        <option value="nukus">Нукус</option>
                                        <option value="andijon">Андижон</option>
                                        <option value="namangan">Наманган</option>
                                        <option value="fergana">Фергана</option>
                                        <option value="karshi">Карши</option>
                                        <option value="termez">Термез</option>
                                        <option value="bukhoro">Бухара</option>
                                        <option value="jizzax">Джизак</option>
                                        <option value="navoi">Навои</option>
                                        <option value="urganch">Ургенч</option>
                                        <option value="guliston">Гулистан</option>
                                        <option value="nurafshon">Нурафшон</option>
                                        <option value="syrdarya">Сырдарьинская область</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="regionSelect" class="required">Район</label>
                                    <select id="regionSelect" wire:click="$emit('Address', 'state', $event.target.options[$event.target.selectedIndex].text)">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="last-name" class="required">Улица</label>
                                    <input wire:change="$emit('Address', 'address', $event.target.value)" type="text" id="last-name" placeholder="Введите полный адрес"
                                           value="{{ $user->address ?? ''}}"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="display-name" class="required">Дом</label>
                                    <input wire:change="$emit('Address', 'home', $event.target.value)" type="text" id="display-name"
                                           placeholder="Введите дом, подъезд, этаж"
                                           value="{{ $user->home ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            payment--}}
            <div wire:ignore class="text-secondary p-4 border-1 border mb-5">
                <h3 class="font-cormorant fw-bolder pb-3 border-bottom-1 mb-4">Детали оплаты</h3>
                <div class="row m-0">
                    <div class="col-12 col-lg-4 p-0 px-lg-1 online disabled">
{{--                        wire:click="payment('Онлайн оплата')"--}}
                        <div class="bg-light d-flex align-items-center map-radio p-3" wire:click="payment('')">
                            <input class="radio mt-2 mt-lg-0" type="radio" name="payment" {{($payment == 'Онлайн оплата') ? 'checked' : ''}}>
                            <p class="mb-0 fw-semibold text-black">Онлайн оплата</p>
                        </div>
                    </div>
                    <div class="notOnline col-12 col-lg-4 p-0 px-lg-1">
                        <div class="bg-light d-flex align-items-center map-radio p-3" wire:click="payment('Наличные')">
                            <input class="radio mt-2 mt-lg-0" type="radio" name="payment" {{($payment == 'Наличные') ? 'checked' : ''}}>
                            <p class="mb-0 fw-semibold text-black">Наличные</p>
                        </div>
                    </div>
                    <div class="notOnline col-12 col-lg-4 p-0 px-lg-1">
                        <div class="bg-light d-flex align-items-center map-radio p-3" wire:click="payment('Оплата на месте')">
                            <input class="radio mt-2 mt-lg-0"  type="radio" name="payment" {{($payment == 'Оплата на месте') ? 'checked' : ''}}>
                            <p class="mb-0 fw-semibold text-black">Оплата на месте</p>
                        </div>
                    </div>
                    <div class="col-12 p-1 d-flex flex-wrap overflow-hidden payments expanded">
                        <div class="payment-meth">
                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('click')">
                                <img src="{{asset('storage/payment/click.jpg')}}" alt="Click LumenLux">
                            </button>
                        </div>
                        <div class="payment-meth">
                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('PayMe')">
                                <img src="{{asset('storage/payment/payme.png')}}" alt="PayMe LumenLux">
                            </button>
                        </div>
                        <div class="payment-meth">
                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('Uzum')">
                                <img src="{{asset('storage/payment/uzum.png')}}" alt="Uzum LumenLux">
                            </button>
                        </div>
{{--                        <div class="payment-meth">--}}
{{--                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('UzCard')">--}}
{{--                                <img src="{{asset('storage/payment/uzcard.png')}}" alt="UzCard LumenLux">--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="payment-meth">--}}
{{--                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('Humo')">--}}
{{--                                <img src="{{asset('storage/payment/humo.png')}}" alt="Humo LumenLux">--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="payment-meth">--}}
{{--                            <button class="h-100 bg-white overflow-hidden" wire:click="payment('Visa')">--}}
{{--                                <img src="{{asset('storage/payment/visa.png')}}" alt="Visa LumenLux">--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 position-relative px-2">
            <div class="bg-light text-secondary p-3 border-1 border">
                <h3 class="font-cormorant fw-bolder pb-3 border-bottom-1 mb-4">Чекаут</h3>
                <div class="font-kyiv d-flex justify-content-between">
                    <p class="pe-4">{{(!$addressCollected) ? 'Забрать из шоурума:' : 'Доставка:'}}</p>
                    <p class="text-black fw-500 text-end">{{($collect) ? $collect : $addressCollected}}</p>
                </div>
                <div class="font-kyiv d-flex justify-content-between">
                    <p class="pe-4">Вид оплаты:</p>
                    <p class="text-black fw-500 text-end">{{$payment ? $payment : '-'}}</p>
                </div>
                <div class="font-kyiv d-flex justify-content-between {{(!$addressCollected)?'d-none':''}}">
                    <p class="pe-4">Сумма доставки:</p>
                    <p class="text-black fw-500 text-end">0</p>
                </div>
                <div class="font-kyiv d-flex justify-content-between">
                    <p class="pe-4">Сумма заказа:</p>
                    <p class="text-black fw-500 text-end">{{number_format($truePrice, 0, '.', ' ')}} сум</p>
                </div>
                <div class="font-kyiv d-flex justify-content-between">
                    <p class="pe-4">Скидка:</p>
                    <p class="text-black fw-500 text-end">{{number_format($disc, 0, '.', ' ')}} сум</p>
                </div>
                <div class="border-top border-1 mb-0 pt-3 text-secondary d-flex justify-content-between align-items-end">
                    <p class="font-kyiv fs-5 fw-semibold mb-0">Итого:</p>
                    <p class="font-kyiv fs-4 fw-bolder text-black mb-0">{{number_format($overall, 0, '.', ' ')}} сум</p>
                </div>
            </div>
            <div class="row p-3">
                <div class="single-product-cart btn-hover ps-sm-1 p-0 pb-2 text-center col-12">
                    <a wire:click="button()" class="btn- w-100 text-dark p-3">Перейти к оформлению заказа</a>
                </div>
            </div>
        </div>
    </div>
            <div class="hiddenmsg flash-message position-absolute text-white fs-4 px-4 py-2 rounded shadow">
                {{ $flashMessage }}
            </div>
</div>

@section('scripts')
    <script>

        window.addEventListener('flashMessage', event => {
            const flashMessage = document.querySelector('.flash-message');
            flashMessage.text = event.detail.message;
            flashMessage.classList.remove('hiddenmsg');
            flashMessage.classList.add(event.detail.style);
            setTimeout(() => flashMessage.classList.add('hiddenmsg'), 7000);
            if (event.detail.style == 'bg-success'){
                setTimeout(function() {
                    window.location.href = "{{ route('front.profile.index', ['orders']) }}";
                }, 4500);
            }
        });
        $(document).ready(function() {
            $('.map-radio').click(function() {
                // Trigger click event on the radio button when the div is clicked
                $('.radio').removeClass('selected_map');
                $(this).find('.radio').prop('checked', true).addClass('selected_map');
            });
            $('.showroom').click(function() {
                // Toggle the height of the showroomList element

                $('.showroomList').toggleClass('expanded');
                $('.pick-up').toggleClass('d-none');
            });
            $('.online').click(function() {
                // Toggle the height of the showroomList element
                $('.payments').toggleClass('expanded');
            });
            $('.notOnline').click(function() {
                // Toggle the height of the showroomList element
                $('.payments').addClass('expanded');
            });
            $('.delivery').click(function() {
                // Toggle the height of the showroomList element
                $('.deliverySet').toggleClass('expanded');
                $('.pick-down').toggleClass('d-none');
            });
        });

        // Define regions for each city
        const regions = {
            tashkent: ["Алмазарский район", "Чиланзарский район", "Шайхантахурский район", "Яккасарайский район", "Учтепинский район", "Мирабадский район", "Мирзо-Улугбекский район", "Сергелийский район", "Юнусабадский район", "Янгихаётский район", "Яшнободский район", "Bektemir district"],
            tashkentobl: ["Аккурганский район", "Бектемирский район", "Бостонликский район", "Боёвутский район", "Чирчикский район", "Келесский район", "Кибрайский район", "Нининский район", "Охангаронский район", "Акташский район", "Паркентский район", "Пискентский район", "Куйичирчикский район", "Ухчисаройский район", "Янгиюльський район", "Янгиюльский район"],
            samarkand: ["Булунгурский район", "Иштыханский район", "Джамбайский район", "Каттакурганский район", "Кушрабадский район", "Нариманский район", "Нурабадский район"],
            nukus: ["Нукус"],
            andijon: ["Асакинский район", "Балыкский район", "Бозский район", "Булакбашинский район", "Избасканский район", "Джалалкудукский район", "Мархаматский район", "Олтынский район", "Пахтаabadский район", "Кургантепинский район", "Шахриханский район", "Улугнорский район", "Ходжаабадский район", "Андижанский район"],
            namangan: ["Учкурганский район", "Тойтепинский район", "Чордаринский район", "Косонсойский район", "Папский район", "Уйчинский район", "Наманганский район"],
            fergana: ["Адижанский район", "Алтыарыкский район", "Багдадский район", "Бешарикский район", "Узбекский район", "Ферганский район", "Ёзяванский район", "Кувинский район", "Сохский район"],
            karshi: ["Косонсойский район", "Шахрисабзский район"],
            termez: ["Денауский район", "Сариасийский район"],
            bukhoro: ["Аккурганский район", "Бухара тумани", "Гиждувон тумани", "Каган тумани", "Каракуль тумани", "Когон тумани", "Нурота тумани", "Пешкунлар тумани", "Ромитан тумани", "Шофиркон тумани", "Жондор тумани"],
            jizzax: ["Арнасой тумани", "Бахмаль тумани", "Заамин тумани", "Дўстлик тумани", "Зарбдор тумани", "Мирзачўл тумани", "Пахтакор тумани", "Фариш тумани"],
            navoi: ["Карман тумани", "Конимех тумани", "Йўлотан тумани", "Кизирик тумани", "Навоий тумани", "Томди тумани", "Учғозар тумани", "Чиноз тумани"],
            urganch: ["Багат тумани", "Гурлан тумани", "Урганч тумани", "Хазорасп тумани", "Шовот тумани"],
            guliston: ["Гулистан тумани", "Миришкор тумани", "Сардоба тумани", "Учкўприк тумани", "Хаваст тумани"],
            nurafshon: ["Шамхана тумани", "Миришкор тумани", "Гулистан тумани"],
            syrdarya: ["Аккурганский район", "Бекабадский район", "Букинский район", "Гуlistonский район", "Сардобский район", "Хавастский район", "Пахтакорский район"],
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

        window.addEventListener('livewire:load', function () {
            Livewire.on('populateRegions', function (data) {
                // Call your JavaScript function with the provided data
                populateRegions(data.someData);
            });
        });

        window.onload = function () {
            populateRegions();
        };

        // Event listener to populate regions when city is selected
        document.getElementById("citySelect").addEventListener("change", populateRegions);

        @if(session('delayRedirect'))
        // Wait for 3 seconds (adjust the delay as needed)
        setTimeout(function() {
            // Redirect to the desired route
            window.location.href = "{{ route('front.profile.index', ['orders']) }}";
        }, 3000); // 3 seconds delay
        @endif
    </script>
@endsection
