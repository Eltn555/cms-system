@foreach($sliders as $slider)
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
        <div class="box">
            <div class="p-5">
                <div
                    class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                    <img alt="Midone - HTML Admin Template" class="rounded-md"
                         src="{{ asset('storage/' . $slider->image) }}">
                </div>
                <div class="text-slate-600 dark:text-slate-500 mt-5">
                    <div class="flex items-center">
                        Subtitle: {{ $slider->subtitle }}
                    </div>
                    <div class="flex items-center mt-2">
                        Title: {{ $slider->title }}
                    </div>
                    <div class="flex items-center mt-2">
                        Href: <a href="{{ $slider->href }}">{{ $slider->href }}</a>
                    </div>
                </div>
            </div>
            <div
                class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <a class="flex items-center mr-3" href="javascript:;">
                    <i data-lucide="check-square"></i>
                    Edit </a>
                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                   data-tw-target="#delete-confirmation-modal">
                    <i data-lucide="trash-2"></i>
                    Delete </a>
            </div>
        </div>
    </div>
@endforeach
