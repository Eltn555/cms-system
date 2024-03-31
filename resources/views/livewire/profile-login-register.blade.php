    <div class="login-register-wrapper mx-5 mb-5" style="margin-top: 150px">
        <div class="login-register-tab-list nav" role="tablist">
            <a class="active" data-bs-toggle="tab" href="#lg1" aria-selected="true" role="tab">
                <h4> login </h4>
            </a>
            <a data-bs-toggle="tab" href="#lg2" aria-selected="false" tabindex="-1" role="tab">
                <h4> register </h4>
            </a>
        </div>
        <div class="tab-content">
            <div id="lg1" class="tab-pane active" role="tabpanel">
                <div class="login-form-container">
                    <div class="login-register-form">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <input type="text" name="email" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <div class="login-toggle-btn">
                                <input type="checkbox">
                                <label>Remember me</label>
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="button-box btn-hover">
                                <button type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="lg2" class="tab-pane" role="tabpanel">
                <div class="login-form-container">
                    <div class="login-register-form">
                        <form action="#" method="post">
                            <input type="text" name="user-name" placeholder="Username">
                            <input type="password" name="user-password" placeholder="Password">
                            <input name="user-email" placeholder="Email" type="email">
                            <div class="button-box btn-hover">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
