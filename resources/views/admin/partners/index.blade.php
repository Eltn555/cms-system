@extends('admin')
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Партнёры
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Modal Toggle -->
        <div class="text-center"><a href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#static-backdrop-modal-preview" class="btn btn-primary">Show
                Modal</a></div> <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
        <div id="static-backdrop-modal-preview" class="modal" data-tw-backdrop="static" tabindex="-1"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body px-5 py-10">
                        <form action="{{route('admin.partners.store')}}" method="post"
                              enctype="multipart/form-data">
                            <div class="text-center">
                                <div class="mb-5">
                                    @csrf
                                    <div class="w-100 mx-auto xl:mr-0 xl:ml-6">
                                        <div
                                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template"
                                                     src="{{asset('dist/images/profile-10.jpg')}}" id="image">
                                                <div
                                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                    <i data-lucide="x"></i>
                                                </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change Photo
                                                </button>
                                                <input type="file" name="image"
                                                       class="w-full h-full  top-0 left-0 absolute opacity-0"
                                                       id="input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-tw-dismiss="modal" class="btn btn-secondary w-24 mr-2">Cancel
                                </button>
                                <button type="submit" data-tw-dismiss="modal" class="btn btn-primary w-24">Ok</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @foreach($partners as $partner)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <div
                            class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                            <img alt="Midone - HTML Admin Template" class="rounded-md"
                                 src="{{ asset('storage/' . $partner->image) }}">
                        </div>
                    </div>
                    <div
                        class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <a class="flex items-center mr-3" href="javascript:;">
                            <i data-lucide="check-square"></i>
                            Edit </a>
                        <div class="flex items-center text-danger"
                             onclick="getElement({{ $partner->id }})" data-tw-toggle="modal"
                             data-tw-target="#delete-modal">
                            <i data-lucide="trash-2"></i>
                            Delete
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div
                            class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                            <img id="delete-preview" src="">
                        </div>
                        <div class="text-3xl mt-5">Вы уверены?</div>
                        <div class="text-slate-500 mt-2">Вы уверены что хотите удалить эту запись? <br>Это действие
                            нельзя отменить.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                            Отмена
                        </button>
                        <button type="button" class="btn btn-danger w-24">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END: Modal Content -->

@endsection

@section('script')
    <script>

        function getElement(id) {
            console.log(id);
            $.ajax({
                url: '{{ route('admin.partners.search') }}',
                method: 'GET',
                encode: true,
                data: {
                    id: id,
                },
                success: function (response) {
                    console.log({{ asset('storage/') }} + response.image)
                    $('#delete-preview').attr('src', {{ asset('storage/') }} + response.image);
                },
                error: function (error) {
                    console.error('Update failed:', error);
                }
            });
        }

    </script>
@endsection
