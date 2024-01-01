@extends('admin')
@section('content')
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Display Information
            </h2>
        </div>
        <div class="p-5">
            <form action="{{route('admin.sliders.edit')}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col-reverse xl:flex-row flex-col">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 2xl:col-span-6">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Sub Title</label>
                                    <input id="update-profile-form-1" type="text" name="subtitle" class="form-control"
                                           placeholder="Input text">
                                </div>
                            </div>
                            <div class="col-span-12 2xl:col-span-6 mt-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Title</label>
                                    <input id="update-profile-form-1" name="title" type="text" class="form-control"
                                           placeholder="Input text">
                                </div>
                            </div>
                            <div class="col-span-12 2xl:col-span-6 mt-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Href</label>
                                    <input id="update-profile-form-1" name="href" type="text" class="form-control"
                                           placeholder="Input text">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                        <div
                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Midone - HTML Admin Template"
                                     src="{{asset('dist/images/profile-10.jpg')}}" id="profile">
                                <div
                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                    <i data-lucide="x"></i>
                                </div>
                            </div>
                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                <input type="file" name="image" class="w-full h-full  top-0 left-0 absolute opacity-0"
                                       id="input-file">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('dist/js/uploadfile.js')}}"></script>
@endsection
