<!-- BEGIN: Top Bar -->
<div
    class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="logo -intro-x hidden md:flex xl:w-[200px] block">
            <img alt="" class="logo__image w-32"
                 src="{{ asset('logo-white.png') }}">
            <span class="logo__text text-white text-lg ml-3"></span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <?php
                $path = array_filter(explode("/", request()->path()));
                ?>
                @if(count($path) !== 0)
                    @foreach($path as $item)
                        <li class="breadcrumb-item {{ $item == end($path) ? 'active' : ''}}"
                            aria-current="page">{{ ucwords(__($item)) }}</li>
                    @endforeach
                @else
                    <li class="breadcrumb-item" aria-current="page">Главная</li>
                @endif
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input id="main-search" type="text" class="search__input form-control border-transparent" placeholder="Поиск...">
                <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
            </div>
        </div>
        <div class="search-result p-2" style="height: 200vh !important; width: 100%; top: 0; background-color: rgba(0,0,0,0.5)">
            <div class="w-full h-full relative" style="padding-top: 65px">
                <div id="search-result__content" class="rounded p-3" style="width: 85%; max-height: 150vh; margin: auto; background-color: #f4f4f4">

                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown mr-4 sm:mr-6">
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                 aria-expanded="false" data-tw-toggle="dropdown"><i data-lucide="bell"
                                                                    class="notification__icon dark:text-slate-500"></i>
            </div>
{{--            <div class="notification-content pt-2 dropdown-menu">--}}
{{--                <div class="notification-content__box dropdown-content">--}}
{{--                    <div class="notification-content__title">Уведомления</div>--}}
{{--                    <div class="cursor-pointer relative flex items-center ">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="Midone - HTML Admin Template" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/profile-15.jpg') }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">Christian Bale</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a--}}
{{--                                reader will be distracted by the readable content of a page when looking at its layout.--}}
{{--                                The point of using Lorem--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cursor-pointer relative flex items-center mt-5">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="Midone - HTML Admin Template" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/profile-7.jpg') }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the--}}
{{--                                printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard--}}
{{--                                dummy text ever since the 1500--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cursor-pointer relative flex items-center mt-5">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="Midone - HTML Admin Template" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/profile-12.jpg') }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum--}}
{{--                                is not simply random text. It has roots in a piece of classical Latin literature from 45--}}
{{--                                BC, making it over 20--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cursor-pointer relative flex items-center mt-5">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}

{{--                            <i data-lucide="user"></i>--}}

{{--                            --}}{{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/profile-1.jpg') }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">Morgan Freeman</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum--}}
{{--                                is not simply random text. It has roots in a piece of classical Latin literature from 45--}}
{{--                                BC, making it over 20--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cursor-pointer relative flex items-center mt-5">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="Midone - HTML Admin Template" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/profile-11.jpg') }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum--}}
{{--                                is not simply random text. It has roots in a piece of classical Latin literature from 45--}}
{{--                                BC, making it over 20--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 bg-white rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                 role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone - HTML Admin Template" src="{{ auth()->user()->image === 'no_photo.jpg' ? asset('no_photo.jpg') : asset('storage/' . auth()->user()->image) }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ auth()->user()->email }}</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                                                              class="w-4 h-4 mr-2"></i> Profile </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i data-lucide="toggle-right" class="mr-2"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
