
<div>
    @if ($showModal)
            <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 998; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
            <div class="position-relative w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="position-absolute w-100 h-100" style="z-index: 999;" onclick="closeModal()">

                </div>
                <div class="p-4 rounded-1 bg-white registration single-input-item" style="z-index: 1000">
                    @if ($status == 'initial')
                        <form wire:submit.prevent="submitPhoneNumber">
                            <div class="position-relative mb-2">
                                <div class="position-absolute h-100 top-0 left-0 p-3">
                                    +998
                                </div>
                                <input wire:model="phone" class="tel telPadding p-2" id="logPhone" type="tel" value="{{ old('phone') }}" autocomplete="false" name="phone" placeholder="555005444">
                            </div>
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                            <button type="submit">Отправить код</button>
                        </form>
                    @elseif ($status == 'verifying')
                        <p>СМС-код подтверждения отправлен на номер +998{{ $phone }}</p>
                        <form wire:submit.prevent="verifyCode">
                            <input wire:model="inputCode" class="p-2 mb-2" type="number" name="code" placeholder="Введите код">
                            <button type="submit">Проверять</button>
                        </form>
                        @if ($showResendButton)
                            <button wire:click="resendCode">Отправить еще раз</button>
                        @endif
                    @elseif($status == 'register')
                        <form wire:submit.prevent="register" class="">
                            <input wire:model="name" class="p-2 mb-2" type="text" name="name" placeholder="Имя">
                            <button type="submit" class="btn btn-primary">Сохранять</button>
                        </form>
                    @elseif ($status == 'success')
                        <p>Проверка успешна на +998{{ $phone }}</p>
                        <!-- Add logic here to log in or register the user -->
                    @elseif ($status == 'failed')
                        <p>Проверка не удалась. Пожалуйста, повторите попытку позже.</p>
                        @if ($showResendButton)
                            <button wire:click="resendCode">Отправить еще раз</button>
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
