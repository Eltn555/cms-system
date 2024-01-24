@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Tags
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <!-- BEGIN: Modal Toggle -->
            <div class="text-center">
                <a href="javascript:;" data-tw-toggle="modal"
                   data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Add new Tag</a>
            </div>
            <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"> <!-- BEGIN: Modal Header -->
                        <form action="{{ route('admin.tags.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Adding new Tag</h2>
                            </div>
                            <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12">
                                    <label for="title"
                                           class="form-label">Title</label>
                                    <input
                                        id="title" type="text" class="form-control"
                                        placeholder="Bedroom lamp" name="title">
                                </div>
                            </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary w-20">Save</button>
                            </div>
                        </form>
                        <!-- END: Modal Footer --> </div>
                </div>
            </div> <!-- END: Modal Content -->

            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $tags->count() }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                         data-lucide="search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->

        @foreach($tags as $tag)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5 intro-x" data-action="{{$tag->id}}">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <i style="width: 50px;" data-lucide="tag"></i>
                        </div>
                        <div class="editable lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0" data-action="read" data-selectable="text" data-field="title">
                            <a class="font-medium">{{ $tag->title }}</a>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <div class="text-slate-500 text-xs mt-0.5">Has: {{ $tag->products->count() }} products</div>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <div class="form-check form-switch w-full h-full flex justify-center p-2">
                                <input class="form-check-input activation" data-field="visible" type="checkbox" {{($tag->visible) ? 'checked' : ''}}>
                            </div>
                            <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary py-1 px-2 mr-2">View</a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <div id="message" class="m-0 fixed alert border-success bg-white show px-3 py-2 rounded absolute flex items-center text-success font-bold" style=" left:50%; transform: translateX(-50%); z-index: 9999; top: 100px; display: none" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>  Updated</div>

        <!-- BEGIN: Users Layout -->
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $("#modal-form-3").each(function () {
            const el = this;
            ClassicEditor.create(el).catch((error) => {
                console.error(error);
            });
        });
        let id;
        $("body").bind("ajaxSend", function(elm, xhr, s){
            if (s.type == "POST") {
                xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
            }
        });
        $(document).ready(function () {
            $('.editable').on('dblclick', function () {
                if ($(this).data('action') === 'read') {
                    var $input = $('<input type="' + $(this).data('selectable') + '" class="form-control" value="' + $.trim($(this).text()) + '" />');
                    $(this).html($input).data('action', 'write').css('width', '200px').css('max-width', 'unset');
                    $input.focus();
                }
            });
            $(document).on('blur', '.editable input', function () {
                var $editable = $(this).parent('.editable');
                $editable.data('action', 'read');
                var newValue = '<div class="font-medium whitespace-nowrap">' + $(this).val() + '</div>';
                ajax($editable.data('field'), $(this).val(), $editable.parents('.intro-x').data('action'), 'PUT');
                $editable.html(newValue).css('width', 'unset').css('max-width', '150px');
            });
            $('.edition, .activation').on('change', function () {
                var value = $(this).hasClass('activation') ? this.checked ? 1 : 0 : $(this).val();
                ajax($(this).data('field'), value, $(this).parents('.intro-x').data('action'), 'PUT');
            });
            $(document).on('click', '.deletion', function () {
                id = $(this).parents('.intro-x').data('action');
            });
            $(document).on('click', '#delete', function () {
                $('#'+id).addClass('hidden');
                ajax('', '', id, 'Delete');
            });

            function ajax(field, newValue, tagId, method) {
                const apiUrl = 'tags/' + tagId;
                const requestData =  {
                    field,
                    value: newValue,
                    tagId,
                    _token: "{{ csrf_token() }}"
                };

                $.ajax({
                    url: apiUrl,
                    type: method,
                    dataType: "json",
                    encode: true,
                    processData: true,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    data: requestData,
                    success: function (response) {
                        $("#message").fadeIn(500).fadeOut(2000);
                        console.log(response);
                    },
                    error: function (error) {
                        console.error('Update failed:', error);
                    }
                });
            }
        });
    </script>
@endsection
