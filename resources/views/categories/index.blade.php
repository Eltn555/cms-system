@extends('admin')
@section('styles')
    <style>
        .editable, .editabledesc{
            min-width: 10px;
            max-width: 200px;
            overflow: hidden;
        }

        table td{
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }
        .avatar-wrapper {
            position: relative;
            /*margin: 20px auto;*/
            /*margin: -100px auto 20px auto;*/
            border-radius: 15%;
            overflow: hidden;
            /*box-shadow: 1px 1px 15px -5px black;*/
            box-shadow: none;
            transition: all .3s ease;
        }

        .avatar-wrapper:hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .avatar-wrapper:hover .profile-pic {
            opacity: .5;
        }

        .avatar-wrapper .profile-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        }

        .avatar-wrapper .profile-pic:after {
            font-family: FontAwesome;
            content: "\f007";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 190px;
            background: #ecf0f1;
            color: #34495e;
            text-align: center;
        }

        .avatar-wrapper .upload-button {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .avatar-wrapper .upload-button .fa-arrow-circle-up {
            position: absolute;
            font-size: 243px;
            top: -16px;
            left: -5px;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #e4eae7;
        }

        .avatar-wrapper .upload-button:hover .fa-arrow-circle-up {
            background-color: #4a5568;
            opacity: .7;
        }
    </style>
@endsection

@section('content')
        <h2 class="intro-y text-lg font-medium mt-10">
            Categories
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button data-tw-toggle="modal" data-tw-target="#create-modal" class="btn btn-primary shadow-md mr-2">Add New Category</button>
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to {{count($categories)}}</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">Icon</th>
                        <th class="whitespace-nowrap">Background</th>
                        <th class="whitespace-nowrap">Category name</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="whitespace-nowrap">Parent Category</th>
                        <th class="whitespace-nowrap">Order</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">MainMenu</th>
                        <th class="text-center whitespace-nowrap">SEO_title</th>
                        <th class="text-center whitespace-nowrap">SEO_description</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        @php
                            if(!$category->images->isEmpty()){
                                $background = $icon = null;
                                foreach ($category->images as $image) {
                                    $background = $background ?: (strpos($image->alt, 'background') !== false ? $image : null);
                                    $icon = $icon ?: (strpos($image->alt, 'icon') !== false ? $image : null);
                                }
                            }
                        @endphp
                        <tr id="{{$category->slug}}" class="intro-x" data-action="{{$category->slug}}" data-field="{{$category->id}}" style="order: {{$category->order_id}}" >
                            <td class="py-0.5 w-20">
                                <form id="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="avatar-wrapper w-16 h-16 image-fit zoom-in tooltip" title="{{($icon == null) ? 'Click to upload' : "Updated at ".$icon->updated_at}}">
                                        <img id="" class="img_category profile-pic w-10 h-10" alt="{{($icon == null) ? '' : $icon->alt}}" src="{{asset(($icon == null) ? 'no_photo.jpg' : "storage/".$icon->image)}}"/>
                                        <div class="upload-button flex items-center justify-center">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round" class="w-12 h-12 fa-arrow-circle-up lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                        </div>
                                        <input name="icon" class="file-upload hidden" type="file" accept="image/*"/>
                                        <input name="id" class="hidden" value="{{$category->id}}"/>
                                    </div>
                                </form>
                            </td>
                            <td class="py-0.5 w-20">
                                <form id="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="avatar-wrapper w-16 h-16 image-fit zoom-in tooltip" title="{{($background == null) ? 'Click to upload' : "Updated at ".$background->updated_at}}">
                                        <img id="" class="img_category profile-pic w-10 h-10" alt="{{($background == null) ? '' : $background->alt}}" src="{{asset(($background == null) ? 'no_photo.jpg' : "storage/".$background->image)}}"/>
                                        <div class="upload-button flex items-center justify-center">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round" class="w-12 h-12 fa-arrow-circle-up lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                        </div>
                                        <input name="background" class="file-upload hidden" type="file" accept="image/*"/>
                                        <input name="id" class="hidden" value="{{$category->id}}"/>
                                    </div>
                                </form>
                            </td>
                        <td class="editable" data-field="title" data-action="read" data-selectable="text">
                            <a href="#" class="font-medium whitespace-nowrap">{{ $category->title }}</a>
                        </td>
                            <td class="editable tooltip" data-field="description" data-action="read" data-selectable="text" title="{{ $category->description }}">
                                <div class="text-center overflow-hidden whitespace-nowrap" style="max-width: 400px;">{{ $category->description }}</div>
                            </td>
                            <td>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select class="form-select edition" data-field="parent_category_id">
                                    @foreach($categories as $lilcat)
                                        @if($category->id != $lilcat->id)
                                        <option value="{{$lilcat->id}}" {{($lilcat->id == $category->parent_category_id) ? 'selected' : ''}}>{{$lilcat->title}}</option>
                                        @endif
                                    @endforeach
                                    <option value="" {{ is_null($category->parent_category_id) ? 'selected' : '' }}>Not Selected</option>
                                </select>
                            </div>
                        </td>
                        <td class="editable text-center" data-field="order_id" data-action="read" data-selectable="number">
                            <div class="">{{$category->order_id}}</div>
                        </td>
                        <td class="">
                            <div class="form-check form-switch w-full h-full flex justify-center">
                                <input class="form-check-input activation" data-field="is_active" type="checkbox" {{($category->is_active) ? 'checked' : ''}}>
                            </div>
                        </td>
                            <td class="">
                                <div class="form-check form-switch w-full h-full flex justify-center">
                                    <input class="form-check-input activation" data-field="images" type="checkbox" {{($category->image) ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td class="editable text-center tooltip" title="{{$category->seo_title}}" data-field="seo_title" data-action="read" data-selectable="text">
                                <div class="text-center font-medium whitespace-nowrap">{{$category->seo_title}}</div>
                            </td>
                            <td class="editable text-center tooltip" title="{{$category->seo_description}}" data-field="seo_description" data-action="read" data-selectable="text">
                                <div class="text-center font-medium whitespace-nowrap">{{$category->seo_description}}</div>
                            </td>
                        <td class="table-report__action w-20 ">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-danger deletion" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                   class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                        @php
                            $background = $icon = null;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
{{--            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">--}}
{{--                <nav class="w-full sm:w-auto sm:mr-auto">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>--}}
{{--                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>--}}
{{--                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>--}}
{{--                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>--}}
{{--                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--                <select class="w-20 form-select box mt-3 sm:mt-0">--}}
{{--                    <option>10</option>--}}
{{--                    <option>25</option>--}}
{{--                    <option>35</option>--}}
{{--                    <option>50</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <!-- END: Pagination -->
        </div>
        <div id="message" class="m-0 fixed alert border-success bg-white show px-3 py-2 rounded absolute flex items-center text-success font-bold" style=" left:50%; transform: translateX(-50%); z-index: 9999; top: 100px; display: none" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>  Updated</div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button id="delete" data-tw-dismiss="modal" type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('categories.create-modal')
          <!-- END: Delete Confirmation Modal -->
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
        let slug;
        $("body").bind("ajaxSend", function(elm, xhr, s){
            if (s.type == "POST") {
                xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
            }
        });
        $(document).ready(function () {
            $('#title').on('input', function () {
                $('#seo_title').val($(this).val());
            });

            $('#description').on('input', function () {
                $('#seo_description').val($(this).val());
            });
            $('.editable').on('dblclick', function () {
                if ($(this).data('action') === 'read') {
                    var $input = $('<input type="' + $(this).data('selectable') + '" class="form-control" value="' + $.trim($(this).text()) + '" />');
                    $(this).html($input).data('action', 'write').css('width', '600px').css('max-width', 'unset');
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
                id = $(this).parents('.intro-x').data('field');
                slug = $(this).parents('.intro-x').attr('id');
            });
            $(document).on('click', '#delete', function () {
                $('#'+slug).addClass('hidden');
                ajax('', '', id, 'Delete');
            });

            //update image
            $(".file-upload").on('change', function() {
                let input = this;
                let form = $(this).parents('form');
                let formData = new FormData(form[0]);
                let id_parent = $(this).parents('.intro-x').data('action');

                // Function to handle file preview
                function previewFile() {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var fileurl = e.target.result;
                            $(input).closest('.avatar-wrapper').find('.img_category').attr('src', fileurl);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                // Preview the file
                previewFile();

                // Handle the 'create' case separately
                if ($(this).data('selectable') !== 'create') {
                    ajax('image', formData, id_parent, 'POST');
                }
            });

            $(".upload-button").on('click',function(){
                $(this).siblings('.file-upload').click();
            });

            function ajax(field, newValue, categoryId, method) {
                const apiUrl = field === 'image' ? '{{ route('categories.upload') }}' : 'categories/' + categoryId;
                const requestData = field === 'image' ? newValue : {
                    field,
                    value: newValue,
                    categoryId,
                    _token: "{{ csrf_token() }}"
                };

                $.ajax({
                    url: apiUrl,
                    type: method,
                    dataType: "json",
                    encode: true,
                    processData: field === 'image' ? false : true,
                    contentType: field === 'image' ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
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
