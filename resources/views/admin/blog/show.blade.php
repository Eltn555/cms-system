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
            <a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full border border-slate-300 dark:border-darkmode-400 dark:bg-darkmode-300 dark:text-slate-300 text-slate-500 mr-2 tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bookmark" data-lucide="bookmark" class="lucide lucide-bookmark w-3 h-3"><path d="M19 21l-7-4-7 4V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg> </a>
            <div class="intro-x flex mr-3">
                <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-1.jpg">
                </div>
                <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit -ml-4">
                    <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-10.jpg">
                </div>
                <div class="intro-x w-8 h-8 sm:w-10 sm:h-10 image-fit -ml-4">
                    <img alt="Midone - HTML Admin Template" class="rounded-full border border-white zoom-in tooltip" src="dist/images/profile-10.jpg">
                </div>
            </div>
            <div class="absolute sm:relative -mt-12 sm:mt-0 w-full flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm">
                <div class="intro-x mr-1 sm:mr-3"> Comments: <span class="font-medium">44</span> </div>
                <div class="intro-x mr-1 sm:mr-3"> Views: <span class="font-medium">175k</span> </div>
                <div class="intro-x sm:mr-3 ml-auto"> Likes: <span class="font-medium">26k</span> </div>
            </div>
            <a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto sm:ml-0 tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="share-2" data-lucide="share-2" class="lucide lucide-share-2 w-3 h-3"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> </a>
            <a href="" class="intro-x w-8 h-8 sm:w-10 sm:h-10 flex flex-none items-center justify-center rounded-full bg-primary text-white ml-2 tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="share" data-lucide="share" class="lucide lucide-share w-3 h-3"><path d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg> </a>
        </div>
        <div class="intro-y text-justify leading-relaxed">{!! html_entity_decode($news->content) !!}</div>
        <div class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="flex items-center">
                <div class="w-12 h-12 flex-none image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                </div>
                <div class="ml-3 mr-auto">
                    <a href="" class="font-medium">Denzel Washington</a>, Author
                    <div class="text-slate-500">Senior Frontend Engineer</div>
                </div>
            </div>
            <div class="flex items-center text-slate-600 dark:text-slate-500 sm:ml-auto mt-5 sm:mt-0">
                Share this post:
                <a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                <a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                <a href="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
            </div>
        </div>
        <!-- END: Blog Layout -->
        <!-- BEGIN: Comments -->
        <div class="intro-y mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="text-base sm:text-lg font-medium">2 Responses</div>
            <div class="news__input relative mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="message-circle" data-lucide="message-circle" class="lucide lucide-message-circle w-5 h-5 absolute my-auto inset-y-0 ml-6 left-0 text-slate-500"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path></svg>
                <textarea class="form-control border-transparent bg-slate-100 pl-16 py-6 resize-none" rows="1" placeholder="Post a comment..."></textarea>
            </div>
        </div>
        <div class="intro-y mt-5 pb-10">
            <div class="pt-5">
                <div class="flex">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                    </div>
                    <div class="ml-3 flex-1">
                        <div class="flex items-center"> <a href="" class="font-medium">Denzel Washington</a> <a href="" class="ml-auto text-xs text-slate-500">Reply</a> </div>
                        <div class="text-slate-500 text-xs sm:text-sm">60 minutes ago</div>
                        <div class="mt-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                    </div>
                </div>
            </div>
            <div class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="flex">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                    </div>
                    <div class="ml-3 flex-1">
                        <div class="flex items-center"> <a href="" class="font-medium">Russell Crowe</a> <a href="" class="ml-auto text-xs text-slate-500">Reply</a> </div>
                        <div class="text-slate-500 text-xs sm:text-sm">20 hours ago</div>
                        <div class="mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Comments -->
    </div>

@endsection
