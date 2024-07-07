
<div>
    @if ($showModal)
            <div class="position-fixed w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 998; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
            <div class="position-relative w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="position-absolute w-100 h-100" style="z-index: 999;" onclick="closeModal()">

                </div>
                <div class="p-4 rounded-1 bg-white registration" style="z-index: 1000">
                    @if ($status == 'initial')
                        <form wire:submit.prevent="submitPhoneNumber">
                            <div class="position-relative">
                                <div class="position-absolute h-100 top-0 left-0 p-3">
                                    +998
                                </div>
                                <input wire:model="phone" class="tel telPadding p-2" id="logPhone" type="tel" value="{{ old('phone') }}" autocomplete="false" name="phone" placeholder="555005444">
                            </div>
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                            <button type="submit">Send Code</button>
                        </form>
                    @elseif ($status == 'verifying')
                        <p>SMS verification code sent to +{{ $phone }}</p>
                        <input wire:model="inputCode" class="p-2 mb-2" type="number" name="code" placeholder="Enter Code">
                        <button wire:click="verifyCode">Verify</button>
                        @if ($showResendButton)
                            <button wire:click="resendCode">Resend Code</button>
                        @endif
                    @elseif($status == 'register')
                        <form wire:submit.prevent="register">
                            <input wire:model="name" class="p-2 mb-2" type="text" name="name" placeholder="Name">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    @elseif ($status == 'success')
                        <p>Verification successful for +998{{ $phone }}</p>
                        <!-- Add logic here to log in or register the user -->
                    @elseif ($status == 'failed')
                        <p>Verification failed. Please try again later.</p>
                        @if ($showResendButton)
                            <button wire:click="resendCode">Resend Code</button>
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
