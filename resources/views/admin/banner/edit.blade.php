@extends('admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/upload.css') }}"/>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit banner item: {{ $banner->title }}
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form method="POST" action="{{ route('admin.banner.update', $banner->id) }}" id="file-upload-form" class="uploader"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input id="file-upload" type="file" name="image" accept="image/*"/>
                    <label for="file-upload" id="file-drag" class="uploadlabel my-5">
                        <img id="file-image" src="{{ asset('storage/' . $banner->image ) }}" alt="Preview">
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
                        <input id="crud-form-1" name="title" type="text" class="form-control w-full" value="{{ $banner->title }}" placeholder="Collection ...">
                    </div>

                    <!-- BEGIN: Basic Select -->
                    <div class="mt-3">
                        <label>Basic</label>
                        <div class="mt-2">
                            <select data-placeholder="Select Tag" name="tag_id" class="tom-select w-full">
                                @foreach ($tags as $tag)
                                    <option {{ $banner->tag->id === $tag->id ? 'selected="true"' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select></div>
                    </div> <!-- END: Basic Select -->

                    <div class="text-right mt-5">
                        <a href="{{ route('admin.banner.index') }}" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
