<div class="login-register-wrapper mx-5 mb-5" style="margin-top: 150px">
        <div class="login-register-tab-list nav" role="tablist">
            <a class="{{!$isRegister ? 'active' : ''}} logIn" data-bs-toggle="tab" href="#lg1" aria-selected="true" role="tab">
                <h4> Вход </h4>
            </a>
            <a class="{{$isRegister ? 'active' : ''}} register" data-bs-toggle="tab" href="#lg2" aria-selected="false" tabindex="-1" role="tab">
                <h4> Регистрация </h4>
            </a>
        </div>
        <div class="tab-content">
            <div id="lg1" class="tab-pane {{!$isRegister ? 'active' : ''}}" role="tabpanel">
                <div class="login-form-container">
                    <div class="login-register-form">
                        <form action="{{ route('login') }}" method="POST" autocomplete="off">
                            @csrf
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="logPhone">Номер телефона</label>
                            <div class="position-relative">
                                <div class="position-absolute h-100 top-0 left-0 p-3">
                                    +998
                                </div>
                                <input class="tel telPadding" id="logPhone" type="tel" value="{{ old('phone') }}" autocomplete="false" name="phone" placeholder="555005444">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="logPass">Пароль</label>
                            <input id="logPass" type="password" name="password" placeholder="Пароль">
                            <div class="login-toggle-btn">
                                <input type="checkbox">
                                <label>Запомнить меня</label>
                                <a href="#">Забыли пароль?</a>
                            </div>
                            <div class="button-box btn-hover">
                                <button type="submit">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="lg2" class="tab-pane {{$isRegister ? 'active' : ''}}" role="tabpanel">
                <div class="login-form-container pb-0">
                    <div class="login-register-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Имя">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="position-relative">
                                <div class="position-absolute h-100 top-0 left-0 p-3">
                                    +998
                                </div>
                                <input class="tel telPadding" id="logPhone" type="tel" value="{{ old('phone') }}" autocomplete="false" name="phone" placeholder="555005444">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password" autocomplete="new-password" placeholder="Пароль">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password_confirmation" placeholder="Подтверждение пароля" autocomplete="new-password">
                            <div class="button-box btn-hover">
                                <button type="submit">Регистрация</button>
                            </div>
                        </form>
                    </div>
                    <p class="pt-4 pb-2">Если у вас уже есть аккаунт, <a href="/profile" class="text-primary">войдите</a></p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.register').click(function() {
                    window.history.pushState(null, null, window.location.pathname + '?register');
                });

                $('.logIn').click(function() {
                    window.history.pushState(null, null, window.location.pathname);
                });
            });
        </script>
    @endpush
