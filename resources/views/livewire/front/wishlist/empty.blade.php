@section('title', 'Избранное')
@section('style')
    <style>
        body{
            height: unset !important;
        }
        .empty-block h1{
            font-weight: 700;
            font-size: 42px;
            color: #232323;
        }
        .empty-block p{
            font-weight: 400;
            font-size: 20px;
            color: #4d4d4d;
        }
        .seeMore{
            font-family: Poppins;
            margin-top: 1.2em;
            padding: 5px 0;
            border: none;
            border-bottom: 1px solid #555;
            background-color: #F8B301;
            font-weight: bolder;
            letter-spacing: 1px;
            transition: background 0.3s;
        }
    </style>
@endsection

<div class="container my-5 py-5">
    <div class="row my-5 py-5 align-items-center justify-content-center">
        <div class="col-12 col-md-6 col-xl-6 col-lg-6 d-flex justify-content-center align-items-center flex-column">
            <div class="empty-block d-flex justify-content-center align-items-center flex-column">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 18.7044C4 28.4302 12.0389 33.613 17.9235 38.2519C20 39.8889 22 41.4302 24 41.4302C26 41.4302 28 39.8889 30.0765 38.2519C35.9611 33.613 44 28.4302 44 18.7044C44 8.9785 32.9997 2.0811 24 11.4314C15.0003 2.0811 4 8.9785 4 18.7044Z" fill="#B6B6B6"/>
                </svg>
                <svg width="40" height="16" viewBox="0 0 40 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_f_242_5443)">
                        <ellipse cx="20" cy="8" rx="14" ry="2" fill="url(#paint0_linear_242_5443)"/>
                    </g>
                    <defs>
                        <filter id="filter0_f_242_5443" x="0" y="0" width="40" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                            <feGaussianBlur stdDeviation="3" result="effect1_foregroundBlur_242_5443"/>
                        </filter>
                        <linearGradient id="paint0_linear_242_5443" x1="20" y1="6" x2="20" y2="10" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#CACACA"/>
                            <stop offset="1" stop-color="#DADADA" stop-opacity="0.29"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <h1 class="font-cormorant">Список пожеланий</h1>
            <p class="font-kyiv">У вас нет сохраненных списков желаний</p>
            <a href="https://lumenlux.uz/category" class="seeMore py-3 px-4 text-dark font-kyiv">Посмотреть магазин</a>
        </div>
    </div>
</div>
