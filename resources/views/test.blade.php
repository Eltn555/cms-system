@extends('admin')

@section('content')
    <form data-single="true" method="POST" action="{{ route('test.store') }}" class="dropzone">
        @csrf
        <div class="fallback"><input name="file" type="file"/></div>
        <div class="dz-message" data-dz-message>
            <div class="text-lg font-medium">Drop files here or click to upload.</div>
            <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                    class="font-medium">not</span> actually uploaded.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
