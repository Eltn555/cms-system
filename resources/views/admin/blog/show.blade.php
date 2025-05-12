@extends('admin')

@section('content')
    <div class="intro-y news xl:w-3/5 p-5 box mt-8">
        <!-- BEGIN: Blog Layout -->
        <h2 class="intro-y font-medium text-xl sm:text-2xl">
            {{ $news->title }}
        </h2>
        <div class="intro-y text-slate-600 dark:text-slate-500 mt-3 text-xs sm:text-sm"> {{ $date->format('d F Y') }} <span class="mx-1">•</span>
            <a class="text-primary" href="{{ route('admin.blog.categories.show', $news->category->id) }}">{{ $news->category->title }}</a></div>
        <div class="intro-y mt-6">
            <h3 class="intro-y font-medium text-lg sm:text-xl my-5">
                {{ $news->description }}
            </h3>
            <div class="news__preview image-fit">
                <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{ asset('storage/' . $news->image) }}">
            </div>
        </div>
        <div class="intro-y flex relative pt-16 sm:pt-6 items-center pb-6">
            <div class="absolute sm:relative -mt-12 sm:mt-0 w-full flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm">
                <div class="intro-x sm:mr-3 ml-auto"> Likes: <span class="font-medium">{{ $news->likes->count() }}</span> </div>
            </div>
        </div>
        <div class="intro-y text-justify leading-relaxed">{!! html_entity_decode($news->content) !!}</div>
        <div class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="flex items-center">
                <div class="w-12 h-12 flex-none image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                </div>
                <div class="ml-3 mr-auto">
                    <a href="#" class="font-medium">{{ $news->author->name }}</a>, Author
                </div>
            </div>
        </div>
        <!-- END: Blog Layout -->
    </div>

@endsection
