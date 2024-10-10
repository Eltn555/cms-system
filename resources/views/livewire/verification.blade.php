
<div>
    @if ($showModal)
            <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 998; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
            <div class="position-relative w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="position-absolute w-100 h-100" style="z-index: 999;" onclick="closeModal()">
                </div>
                <div class="p-4 bg-white registration single-input-item position-relative " style="z-index: 1000">
                    <h2 class="font-cormorant fw-bold">Введите номер<br>телефона</h2>
                    <a onclick="closeModal()" class="position-absolute p-0" style="top: 20px; right: 20px; width: 50px; height: 50px"><i class="pe-7s-close w-100 h-100 text-secondary" style="font-size: 50px"></i></a>
                    <p class="text-secondary my-4 lh-1">
                        Отправим смс с кодом подтверждение
                    </p>

                    <p class="text-secondary mb-1 m-0 lh-1">
                        Телефон номер
                    </p>
                    @if ($status == 'initial')
                        <form wire:submit.prevent="submitPhoneNumber">
                            <div class="position-relative mb-4">
                                <div class="position-absolute h-100 top-0 left-0 p-3" style="padding-top: 0.9rem !important; color: #1f2226; font-size: 15px; font-weight: 600;">
                                    +998
                                </div>
                                <div class="position-absolute h-100 top-0 end-0 p-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8334 2.5C10.8334 2.5 12.6667 2.66667 15 5C17.3334 7.33333 17.5 9.16667 17.5 9.16667" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M11.0059 5.44629C11.0059 5.44629 11.8308 5.68199 13.0683 6.91943C14.3057 8.15686 14.5414 8.98182 14.5414 8.98182" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M7.53132 5.2638L8.07217 6.23291C8.56025 7.10748 8.36432 8.25476 7.59559 9.02349C7.59559 9.02349 7.59559 9.02349 7.59559 9.0235C7.59548 9.02361 6.66325 9.95605 8.35376 11.6466C10.0436 13.3364 10.976 12.4055 10.9768 12.4047C10.9769 12.4047 10.9768 12.4047 10.9769 12.4047C11.7456 11.636 12.8929 11.4401 13.7674 11.9282L14.7365 12.469C16.0571 13.206 16.2131 15.058 15.0523 16.2188C14.3548 16.9163 13.5003 17.4591 12.5558 17.4949C10.9656 17.5551 8.26523 17.1527 5.55642 14.4439C2.84761 11.7351 2.44518 9.03468 2.50546 7.44457C2.54127 6.49999 3.084 5.64552 3.7815 4.94802C4.9423 3.78723 6.79431 3.94319 7.53132 5.2638Z" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <input wire:model="phone" class="tel telPadding p-2 " id="logPhone" type="tel" value="{{ old('phone') }}" autocomplete="false" name="phone" placeholder="(--) --- -- --">
                            </div>
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                            <div class="w-100 d-flex justify-content-end btn-hover">
                                <button onclick="closeModal()" type="button" class="py-2 bg-light border me-2 border-1 border-secondary check-btn sqr-btn fw-bolder">Отмена</button>
                                <button type="submit" class="fw-bolder py-2">Отправить</button>
                            </div>
                        </form>
                    @elseif ($status == 'verifying')
                        <p>СМС-код подтверждения отправлен на номер +{{ $phone }}</p>
                        <form wire:submit.prevent="verifyCode">
                            <input wire:model="inputCode" class="p-2 mb-2" type="number" name="code" placeholder="Введите код">
                            <div class="w-100 d-flex justify-content-end btn-hover">
                                <button onclick="closeModal()" type="button" class="py-2 bg-light border me-2 border-1 border-secondary check-btn sqr-btn fw-bolder">Отмена</button>
                                <button type="submit" class="py-2 fw-bolder">Проверять</button>
                            </div>
                        </form>
                        @if ($showResendButton)
                            <div class="w-100 d-flex justify-content-end btn-hover">
                                <button onclick="closeModal()" type="button" class="py-2 bg-light border me-2 border-1 border-secondary check-btn sqr-btn fw-bolder">Отмена</button>
                                <button wire:click="resendCode" class="py-2 fw-bolder">Еще раз</button>
                            </div>
                        @endif
                    @elseif($status == 'register')
                        <form wire:submit.prevent="register" class="">
                            <input wire:model="name" class="p-2 mb-2" type="text" name="name" placeholder="Имя">
                            <div class="w-100 d-flex justify-content-end btn-hover">
                                <button onclick="closeModal()" type="button" class="py-2 bg-light border me-2 border-1 border-secondary check-btn sqr-btn fw-bolder">Отмена</button>
                                <button type="submit" class="py-2 btn btn-primary fw-bolder">Сохранять</button>
                            </div>
                        </form>
                    @elseif ($status == 'success')
                        <p>Проверка успешна на +998{{ $phone }}</p>
                        <!-- Add logic here to log in or register the user -->
                    @elseif ($status == 'failed')
                        <p>Проверка не удалась. Пожалуйста, повторите попытку позже.</p>
                        @if ($showResendButton)
                            <div class="w-100 d-flex justify-content-end btn-hover">
                                <button onclick="closeModal()" type="button" class="py-2 bg-light border me-2 border-1 border-secondary check-btn sqr-btn fw-bolder">Отмена</button>
                                <button wire:click="resendCode" class="py-2 fw-bolder">Еще раз</button>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('userLoggedIn', () => {
                window.location.reload();
            });
        });
        $(".registration").on('focusout', function () {
            alert('hey');
            Livewire.emit('closeReg');
        });
    </script>
@endpush
