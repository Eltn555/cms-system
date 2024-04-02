@section('style')
    <style>
        .icon-input{
            top: 0;
            right: 0;
            padding: 12px 15px;
        }
    </style>
@endsection

<div>
    <div class="pt-3 ms-5 mb-5 font-cormorant position-relative row" style="margin-top: 150px">
        <div class="col-6">
            <h5 class="shadow-text-1 font-cormorant fw-bold">Профиль</h5>
            <h5 class="shadow-text-2 font-cormorant fw-bold">Профиль</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#account" class="active" data-bs-toggle="tab">Личная информация</a>
                    <a href="#orders" data-bs-toggle="tab">Покупки</a>
                </div>
            </div>


            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="myaccount-content font-kyiv">
                            <h3 class="fw-semibold">Личная информация</h3>
                            <div class="account-details-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Имя</label>
                                                <div class="position-relative">
                                                    <input type="text" id="first-name" placeholder="Ваш имя"/>
                                                    <div class="position-absolute icon-input">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1334_4361)">
                                                                <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C" stroke-width="1.5"/>
                                                                <circle cx="9.99935" cy="9.99996" r="8.33333" stroke="#8C8C8C" stroke-width="1.5"/>
                                                                <path d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
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
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="last-name" class="required">Фамилия</label>
                                                <div class="position-relative">
                                                    <input type="text" id="last-name" placeholder="Ваш фамилия"/>
                                                    <div class="position-absolute icon-input">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_1334_4361)">
                                                                <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C" stroke-width="1.5"/>
                                                                <circle cx="9.99935" cy="9.99996" r="8.33333" stroke="#8C8C8C" stroke-width="1.5"/>
                                                                <path d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
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
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="display-name" class="required">Телефон номер</label>
                                                <div class="position-relative">
                                                    <input type="tel" id="display-name" placeholder="+998 555 005 444"/>
                                                    <div class="position-absolute icon-input">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.834 2.5C10.834 2.5 12.6673 2.66667 15.0007 5C17.334 7.33333 17.5007 9.16667 17.5007 9.16667" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                                            <path d="M11.0059 5.44641C11.0059 5.44641 11.8308 5.68211 13.0683 6.91955C14.3057 8.15699 14.5414 8.98194 14.5414 8.98194" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                                            <path d="M7.53132 5.26344L8.07217 6.23254C8.56025 7.10711 8.36432 8.25439 7.59559 9.02312C7.59559 9.02313 7.59559 9.02313 7.59559 9.02313C7.59548 9.02324 6.66325 9.95568 8.35376 11.6462C10.0436 13.3361 10.976 12.4052 10.9768 12.4044C10.9769 12.4043 10.9768 12.4044 10.9769 12.4043C11.7456 11.6356 12.8929 11.4397 13.7674 11.9278L14.7365 12.4686C16.0571 13.2056 16.2131 15.0577 15.0523 16.2185C14.3548 16.916 13.5003 17.4587 12.5558 17.4945C10.9656 17.5548 8.26523 17.1524 5.55642 14.4435C2.84761 11.7347 2.44518 9.03431 2.50546 7.4442C2.54127 6.49963 3.084 5.64516 3.7815 4.94765C4.9423 3.78686 6.79431 3.94282 7.53132 5.26344Z" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="email" class="required">Электронная почта</label>
                                                <div class="position-relative">
                                                    <input type="email" id="email" placeholder="sample@mail.uz"/>
                                                    <div class="position-absolute icon-input">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1.66602 10C1.66602 6.85734 1.66602 5.286 2.64233 4.30968C3.61864 3.33337 5.18999 3.33337 8.33268 3.33337L11.666 3.33337C14.8087 3.33337 16.3801 3.33337 17.3564 4.30968C18.3327 5.286 18.3327 6.85734 18.3327 10C18.3327 13.1427 18.3327 14.7141 17.3564 15.6904C16.3801 16.6667 14.8087 16.6667 11.666 16.6667H8.33268C5.18999 16.6667 3.61864 16.6667 2.64233 15.6904C1.66602 14.7141 1.66602 13.1427 1.66602 10Z" stroke="#8C8C8C" stroke-width="1.5"/>
                                                            <path d="M5 6.66663L6.79908 8.16586C8.32961 9.4413 9.09488 10.079 10 10.079C10.9051 10.079 11.6704 9.4413 13.2009 8.16586L15 6.66663" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
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
                                                    <select id="citySelect" type="text">
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
                                                    <select id="regionSelect">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="last-name" class="required">Улица</label>
                                                    <input type="text" id="last-name" placeholder="Напишите полное"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Дом</label>
                                                    <input type="text" id="display-name" placeholder="Напишите дом, подйез, этаж"/>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="single-input-item btn-hover">
                                        <button class="check-btn sqr-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Orders</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Aug 22, 2022</td>
                                        <td>Pending</td>
                                        <td>$3000</td>
                                        <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>July 22, 2022</td>
                                        <td>Approved</td>
                                        <td>$200</td>
                                        <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>June 12, 2017</td>
                                        <td>On Hold</td>
                                        <td>$990</td>
                                        <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@section('scripts')
    <script>
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

        window.onload = function() {
            populateRegions();
        };

        // Event listener to populate regions when city is selected
        document.getElementById("citySelect").addEventListener("change", populateRegions);
    </script>
@endsection
