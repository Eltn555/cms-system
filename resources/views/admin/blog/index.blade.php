@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Blog Layout
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary shadow-md mr-2">Add New Post</a>
        </div>
    </div>

    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->

        @foreach($news as $item)
            <div class="intro-y col-span-12 md:col-span-6 box">
                <div
                    class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                    <img class="rounded-t-md" src="{{ asset('storage/' . $item->image) }}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="w-10 h-10 flex-none image-fit">
                            {{--<img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">--}}
                        </div>
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">Angelina Jolie</a>
                            <div class="text-xs mt-0.5">49 seconds ago</div>
                        </div>
                        <div class="dropdown ml-3">
                            <a href="javascript:;"
                               class="bg-white/20 dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"
                               aria-expanded="false" data-tw-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="more-vertical" data-lucide="more-vertical"
                                     class="lucide lucide-more-vertical w-4 h-4 text-white">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" icon-name="edit-2"
                                                 data-lucide="edit-2" class="lucide lucide-edit-2 w-4 h-4 mr-2">
                                                <path d="M17 3a2.828 2.828 0 114 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                            Edit Post </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" icon-name="trash"
                                                 data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                            </svg>
                                            Delete Post </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"><span
                            class="bg-white/20 px-2 py-1 rounded">{{ $item->category->title }}</span>
                        <a href="{{ route('admin.blog.show', $item->id) }}" class="block font-medium text-xl mt-3">{{ $item->title }}</a></div>
                </div>
                <div class="p-5 text-slate-600 dark:text-slate-500">
                    {{ $item->description }}
                </div>
                {{--<div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-slate-300 dark:border-darkmode-400 dark:bg-darkmode-300 dark:text-slate-300 text-slate-500 mr-2 tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bookmark" data-lucide="bookmark" class="lucide lucide-bookmark w-3 h-3"><path d="M19 21l-7-4-7 4V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg> </a>
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-15.jpg">
                        </div>
                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                            <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-13.jpg">
                        </div>
                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                            <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-1.jpg">
                        </div>
                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="share-2" data-lucide="share-2" class="lucide lucide-share-2 w-3 h-3"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="share" data-lucide="share" class="lucide lucide-share w-3 h-3"><path d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg> </a>
                </div>--}}
                {{--<div class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-full flex text-slate-500 text-xs sm:text-sm">
                        <div class="mr-2"> Comments: <span class="font-medium">55</span> </div>
                        <div class="mr-2"> Views: <span class="font-medium">41k</span> </div>
                        <div class="ml-auto"> Likes: <span class="font-medium">35k</span> </div>
                    </div>
                    <div class="w-full flex items-center mt-3">
                        <div class="w-8 h-8 flex-none image-fit mr-3">
                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                        </div>
                        <div class="flex-1 relative text-slate-600 dark:text-slate-200">
                            <input type="text" class="form-control form-control-rounded border-transparent bg-slate-100 pr-10" placeholder="Post a comment...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="smile" data-lucide="smile" class="lucide lucide-smile w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                        </div>
                    </div>
                </div>--}}
            </div>
        @endforeach
        <div class="intro-y col-span-12 md:col-span-6 box">
            <div
                class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                <img alt="Midone - HTML Admin Template" class="rounded-t-md" src="dist/images/preview-13.jpg">
                <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                    <div class="w-10 h-10 flex-none image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                    </div>
                    <div class="ml-3 text-white mr-auto">
                        <a href="" class="font-medium">Denzel Washington</a>
                        <div class="text-xs mt-0.5">31 minutes ago</div>
                    </div>
                    <div class="dropdown ml-3">
                        <a href="javascript:;"
                           class="bg-white/20 dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"
                           aria-expanded="false" data-tw-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="more-vertical" data-lucide="more-vertical"
                                 class="lucide lucide-more-vertical w-4 h-4 text-white">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="12" cy="5" r="1"></circle>
                                <circle cx="12" cy="19" r="1"></circle>
                            </svg>
                        </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="edit-2"
                                             data-lucide="edit-2" class="lucide lucide-edit-2 w-4 h-4 mr-2">
                                            <path d="M17 3a2.828 2.828 0 114 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                        Edit Post </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="trash"
                                             data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                        </svg>
                                        Delete Post </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 text-white px-5 pb-6 z-10"><span class="bg-white/20 px-2 py-1 rounded">Electronic</span>
                    <a href="" class="block font-medium text-xl mt-3">Dummy text of the printing and typesetting
                        industry</a></div>
            </div>
            <div class="p-5 text-slate-600 dark:text-slate-500">It is a long established fact that a reader will be
                distracted by the readable content of a page when looking at its layout. The point of using Lorem
            </div>
            <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                <a href=""
                   class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-slate-300 dark:border-darkmode-400 dark:bg-darkmode-300 dark:text-slate-300 text-slate-500 mr-2 tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="bookmark" data-lucide="bookmark" class="lucide lucide-bookmark w-3 h-3">
                        <path d="M19 21l-7-4-7 4V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                    </svg>
                </a>
                <div class="intro-x flex mr-2">
                    <div class="intro-x w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip"
                             src="dist/images/profile-13.jpg">
                    </div>
                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                        <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip"
                             src="dist/images/profile-12.jpg">
                    </div>
                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                        <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip"
                             src="dist/images/profile-9.jpg">
                    </div>
                </div>
                <a href=""
                   class="intro-x w-8 h-8 flex items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="share-2" data-lucide="share-2" class="lucide lucide-share-2 w-3 h-3">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg>
                </a>
                <a href=""
                   class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="share" data-lucide="share" class="lucide lucide-share w-3 h-3">
                        <path d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8"></path>
                        <polyline points="16 6 12 2 8 6"></polyline>
                        <line x1="12" y1="2" x2="12" y2="15"></line>
                    </svg>
                </a>
            </div>
            <div class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="w-full flex text-slate-500 text-xs sm:text-sm">
                    <div class="mr-2"> Comments: <span class="font-medium">30</span></div>
                    <div class="mr-2"> Views: <span class="font-medium">179k</span></div>
                    <div class="ml-auto"> Likes: <span class="font-medium">80k</span></div>
                </div>
                <div class="w-full flex items-center mt-3">
                    <div class="w-8 h-8 flex-none image-fit mr-3">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                    </div>
                    <div class="flex-1 relative text-slate-600 dark:text-slate-200">
                        <input type="text"
                               class="form-control form-control-rounded border-transparent bg-slate-100 pr-10"
                               placeholder="Post a comment...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="smile" data-lucide="smile"
                             class="lucide lucide-smile w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagiantion -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="chevrons-left"
                                 class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="chevron-left"
                                 class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="chevron-right"
                                 class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="chevrons-right"
                                 class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                <polyline points="13 17 18 12 13 7"></polyline>
                                <polyline points="6 17 11 12 6 7"></polyline>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagiantion -->
    </div>

@endsection
