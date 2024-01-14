@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Tags
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <!-- BEGIN: Modal Toggle -->
            <div class="text-center">
                <a href="javascript:;" data-tw-toggle="modal"
                   data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add new Tag</a>
            </div>
            <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"> <!-- BEGIN: Modal Header -->
                        <form action="{{ route('admin.tags.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Adding new Tag</h2>
                            </div>
                            <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12">
                                    <label for="title"
                                           class="form-label">Title</label>
                                    <input
                                        id="title" type="text" class="form-control"
                                        placeholder="Bedroom lamp" name="title">
                                </div>
                            </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary w-20">Save</button>
                            </div>
                        </form>
                        <!-- END: Modal Footer --> </div>
                </div>
            </div> <!-- END: Modal Content -->

            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $tags->count() }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                         data-lucide="search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->

        @foreach($tags as $tag)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <i style="width: 50px;" data-lucide="tag"></i>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $tag->title }}</a>
                            <div class="text-slate-500 text-xs mt-0.5">Has: {{ $tag->products->count() }} products</div>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary py-1 px-2 mr-2">View</a>
                            <a class="btn btn-outline-secondary py-1 px-2">Edit</a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <!-- BEGIN: Users Layout -->
    </div>
@endsection
