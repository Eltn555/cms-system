@push('styles')
    <style>
        .icon-input {
            top: 0;
            right: 0;
            padding: 12px 15px;
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
        .file-input{
            display: inline-block;
            padding-top: 50px !important;
            padding-bottom: 0 !important;
            -webkit-box-sizing: border-box !important;
            -moz-box-sizing: border-box !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
            height: 50px !important;
        }
        .file-text{
            left: 20px;
            top: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #757575;
        }
    </style>
@endpush
<div class="myaccount-content font-kyiv border-0">
    <div class="account-details-form mt-3">
        <form action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="single-input-item">
                        <label for="first-name" class="required">Имя</label>
                        <div class="position-relative">
                            <input name="name" type="text" id="first-name" placeholder="Ваш имя" wire:model="name" required/>
                            <div class="position-absolute icon-input">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1334_4361)">
                                        <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C"
                                                stroke-width="1.5"/>
                                        <circle cx="9.99935" cy="9.99996" r="8.33333"
                                                stroke="#8C8C8C" stroke-width="1.5"/>
                                        <path
                                            d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667"
                                            stroke="#8C8C8C" stroke-width="1.5"
                                            stroke-linecap="round"/>
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
                <div class="col-12">
                    <div class="single-input-item">
                        <label for="display-name" class="required">Телефон номер</label>
                        <div class="position-relative">
                            <input class="tel" name="phone" wire:model="phone" type="tel" id="display-name" placeholder="+998 555 005 444" required/>
                            <div class="position-absolute icon-input">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.834 2.5C10.834 2.5 12.6673 2.66667 15.0007 5C17.334 7.33333 17.5007 9.16667 17.5007 9.16667"
                                        stroke="#8C8C8C" stroke-width="1.5"
                                        stroke-linecap="round"/>
                                    <path
                                        d="M11.0059 5.44641C11.0059 5.44641 11.8308 5.68211 13.0683 6.91955C14.3057 8.15699 14.5414 8.98194 14.5414 8.98194"
                                        stroke="#8C8C8C" stroke-width="1.5"
                                        stroke-linecap="round"/>
                                    <path
                                        d="M7.53132 5.26344L8.07217 6.23254C8.56025 7.10711 8.36432 8.25439 7.59559 9.02312C7.59559 9.02313 7.59559 9.02313 7.59559 9.02313C7.59548 9.02324 6.66325 9.95568 8.35376 11.6462C10.0436 13.3361 10.976 12.4052 10.9768 12.4044C10.9769 12.4043 10.9768 12.4044 10.9769 12.4043C11.7456 11.6356 12.8929 11.4397 13.7674 11.9278L14.7365 12.4686C16.0571 13.2056 16.2131 15.0577 15.0523 16.2185C14.3548 16.916 13.5003 17.4587 12.5558 17.4945C10.9656 17.5548 8.26523 17.1524 5.55642 14.4435C2.84761 11.7347 2.44518 9.03431 2.50546 7.4442C2.54127 6.49963 3.084 5.64516 3.7815 4.94765C4.9423 3.78686 6.79431 3.94282 7.53132 5.26344Z"
                                        stroke="#8C8C8C" stroke-width="1.5"
                                        stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-input-item btn-hover w-100 my-3">
                <button type="button" wire:click="checker({{$product}})" class="py-3 check-btn sqr-btn w-100 fw-bolder">Отправить</button>
            </div>
        </form>
        <p class="text-success mb-0 lh-1">
            Отправьте свое имя и номер телефона и наши операторы свяжутся с вами в ближайшее время
        </p>
    </div>
    <div class="hiddenmsg flash-message position-absolute text-white px-4 py-2 rounded shadow">
        {{ $flashMessage }}
    </div>
    <a class="close d-none " data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
</div>

