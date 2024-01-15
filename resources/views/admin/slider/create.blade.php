@extends('admin')
@section('content')
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Display Information
            </h2>
        </div>
        <div class="p-5">
            @livewire('admin.slider.create')
        </div>
    </div>
@endsection
