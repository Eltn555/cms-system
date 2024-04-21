@extends('admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/upload.css') }}"/>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            New Blog
        </h2>
    </div>
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box mt-5 p-3">
            <form method="POST" action="{{ route('admin.blog.store') }}" id="file-upload-form" class="uploader"
                  style="max-width:1000px!important;" enctype="multipart/form-data">
                @csrf
                <input id="file-upload" type="file" name="image" accept="image/*" required/>
                <label for="file-upload" id="file-drag" class="uploadlabel my-5">
                    <img id="file-image" src="#" alt="Preview" class="hidden">
                    <div id="start">
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
                    <input id="crud-form-1" type="text" name="title" class="form-control w-full" required placeholder="Title">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Description</label>
                    <input id="crud-form-1" type="text" name="description" class="form-control w-full" required
                           placeholder="Description">
                </div>
                <!-- BEGIN: Basic Select -->
                <div class="mt-3"><label>Category</label>
                    <div><select name="category_id" class="tom-select w-full">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select></div>
                </div> <!-- END: Basic Select -->
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Content</label>
                    <textarea class="tinyeditor form-control h-[110px]" name="content"></textarea>
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </form>
        </div>
        <!-- END: Form Layout -->
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('dist/js/upload.js') }}"></script>
    <script type="text/javascript">
        let profile = document.getElementById("file-image");
        let inputFile = document.getElementById("file-upload");

        inputFile.onchange = function () {
            profile.src = URL.createObjectURL(inputFile.files[0]);
        }

        tinymce.init({
            selector: 'textarea.tinyeditor',
            plugins: 'code table searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount ' +
                'help charmap emoticons autosave',
            language: 'ru',
            promotion: false,
            branding: false
        });

    </script>
@endsection
