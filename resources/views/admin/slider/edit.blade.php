@extends('admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/upload.css') }}"/>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit slider item: {{ $slider->title }}
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" id="file-upload-form"
                      class="uploader"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input id="file-upload" type="file" name="image" accept="image/*"/>
                    <label for="file-upload" id="file-drag" class="uploadlabel my-5">
                        <img id="file-image" src="{{ asset('storage/' . $slider->image ) }}" alt="Preview">
                        <div id="start" class="hidden">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Select a file or drag here</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                        </div>
                    </label>

                    <div>
                        <label for="crud-form-1" class="form-label">Title</label>
                        <input id="crud-form-1" name="title" type="text" class="form-control w-full"
                               value="{{ $slider->title }}" placeholder="New Title">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Text</label>
                        <input id="crud-form-1" name="text" type="text" class="form-control w-full"
                               value="{{ $slider->text }}" placeholder="Text description">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Button Text</label>
                        <input id="crud-form-1" name="btn_text" type="text" class="form-control w-full"
                               value="{{ $slider->btn_text }}" placeholder="Click Me!">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Button Link</label>
                        <input id="crud-form-1" name="btn_link" type="text" class="form-control w-full"
                               value="{{ $slider->btn_link }}" placeholder="https://www.google.com/">
                    </div>


                    <div class="text-right mt-5">
                        <a href="{{ route('admin.sliders.index') }}" type="button"
                           class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('dist/js/upload.js') }}"></script>
    <script type="text/javascript">
        let profile = document.getElementById("file-image");
        let inputFile = document.getElementById("file-upload");

        inputFile.onchange = function () {
            profile.src = URL.createObjectURL(inputFile.files[0]);
        }
    </script>
@endsection
