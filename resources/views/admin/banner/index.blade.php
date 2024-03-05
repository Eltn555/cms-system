@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Banner Items
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @if($banners->count()<6)
                <a href="{{ route('admin.banner.create') }}" class="btn btn-primary shadow-md mr-2">Add New Item</a>
            @endif
            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $banners->count() }} entries</div>
        </div>

        @foreach($banners as $banner)
            <!-- BEGIN: Items Layout -->
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <div
                            class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                            <img alt="Midone - HTML Admin Template" class="rounded-md"
                                 src="{{ asset('storage/' . $banner->image) }}">
                            <div class="absolute bottom-0 text-white px-5 pb-6 z-10"><a href=""
                                                                                        class="block font-medium text-base">{{ $banner->title }}</a>
                            </div>
                        </div>
                        <div class="text-slate-600 dark:text-slate-500 mt-5">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="link" data-lucide="link"
                                     class="lucide lucide-link w-4 h-4 mr-2">
                                    <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path>
                                </svg>
                                Related Tag: <a class="hover:bg-slate-100 px-2"
                                                href="{{ route('admin.tags.show', $banner->tag->id) }}">{{ $banner->tag->title }}</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <a class="flex items-center mr-3" href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="check-square" data-lucide="check-square"
                                 class="lucide lucide-check-square w-4 h-4 mr-1">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg>
                            Edit </a>
                        <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                           data-tw-target="#delete-modal-preview-{{ $banner->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                            Delete </a>
                        <!-- BEGIN: Modal Content -->
                        <div id="delete-modal-preview-{{ $banner->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center"><i data-lucide="x-circle"
                                                                            class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-slate-500 mt-2">Do you really want to delete "{{ $banner->title }}"
                                                    <br>This process cannot be undone.
                                                </div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <button type="button" data-tw-dismiss="modal"
                                                        class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                </button>
                                                <button type="submit" class="btn btn-danger w-24">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- END: Modal Content -->
                    </div>
                </div>
            </div>
            <!-- END: Items Layout -->


        @endforeach
    </div>

@endsection
