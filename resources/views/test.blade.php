@extends('admin')

@section('styles')
    <style>
        /**
 * FilePond Custom Styles
 */
        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }

    </style>
@endsection

@section('content')
    <form data-single="true" method="POST" action="{{ route('test.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="file"
               class="filepond"
               name="filepond[]"
               multiple
               data-max-file-size="3MB"
               data-max-files="3" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    <script>
        /*
We want to preview images, so we need to register the Image Preview plugin
*/
        FilePond.registerPlugin(

            // encodes the file as base64 data
            FilePondPluginFileEncode,

            // validates the size of the file
            FilePondPluginFileValidateSize,

            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

            // previews dropped images
            FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(
            document.querySelector('input')
        );
    </script>
@endsection
