@extends('layouts.app')
@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
{{--                    <img alt="Midone - HTML Admin Template" class="w-64" src="{{asset('logo-white.png')}}">--}}
                    <span class="text-white text-3xl ml-3">Lumen LUX</span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                         src="{{asset('logo-white.png')}}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Вход
                    </h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">
                        </div>
                        <div class="intro-x mt-8">
                            <input type="email" name="email" class="intro-x login__input form-control py-3 px-4 block"
                                   placeholder="Логин" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="password" name="password"
                                   class="intro-x login__input form-control py-3 px-4 block mt-4"
                                   placeholder="Пароль" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Войти</button>
                            {{--<a href="{{route('register')}}"
                               class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</a>--}}
                        </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"></div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

@endsection
