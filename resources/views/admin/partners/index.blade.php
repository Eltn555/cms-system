@extends('admin')
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Партнёры
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <!-- BEGIN: Modal Toggle -->
            <div class="text-center"><a href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#header-footer-modal-preview"
                                        class="btn btn-primary mr-2">Новое</a></div> <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.partners.store') }}" method="POST" data-single="true" enctype="multipart/form-data">
                            @csrf
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header"><h2 class="font-medium text-base mr-auto">Добавить нового
                                    партнёра</h2></div>
                            <!-- END: Modal Header -->

                            <!-- BEGIN: Modal Body -->
                            <div class="modal-body gap-4 gap-y-3">
                                <div class="w-100 mx-auto xl:mr-0 xl:ml-6">
                                    <div
                                        class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                 src="{{asset('dist/images/profile-10.jpg')}}" id="profile2">
                                            <div
                                                class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                <i data-lucide="x"></i>
                                            </div>
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                            <input type="file" name="image" class="w-full h-full  top-0 left-0 absolute opacity-0"
                                                   id="input-file2">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END: Modal Body -->

                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">
                                    Отмена
                                </button>
                                <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                            </div>
                            <!-- END: Modal Footer -->
                        </form>
                    </div>
                </div>
            </div> <!-- END: Modal Content -->
            <div class="pos-dropdown dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 stroke="currentColor" stroke-width="2"
                                                                                 stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 icon-name="chevron-down"
                                                                                 class="lucide lucide-chevron-down w-4 h-4"
                                                                                 data-lucide="chevron-down"><polyline
                                points="6 9 12 15 18 9"></polyline></svg> </span>
                </button>
                <div class="pos-dropdown__dropdown-menu dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity w-4 h-4 mr-2">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                                <span class="truncate">INV-0206020 - Angelina Jolie</span> </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity w-4 h-4 mr-2">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                                <span class="truncate">INV-0206022 - Al Pacino</span> </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity w-4 h-4 mr-2">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                                <span class="truncate">INV-0206021 - Johnny Depp</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
