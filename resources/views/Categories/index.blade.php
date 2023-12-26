@extends('admin')@section('styles')
    <style>
        .editable, .editabledesc{
            min-width: 10px;
            max-width: 150px;
            overflow: hidden;
        }
        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 20px;
            padding: 20px;
        }
        #drop-area.highlight {
            border-color: purple;
        }
        p {
            margin-top: 0;
        }
        .my-form {
            margin-bottom: 10px;
        }
        #gallery img {
            border-radius: 20px;
            width: 100px;
            margin-bottom: 10px;
            margin-right: 10px;
            vertical-align: middle;
        }
        .button {
            display: inline-block;
            padding: 10px;
            background: #ccc;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .button:hover {
            background: #ddd;
        }
        #fileElem {
            display: none;
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
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                        <th class="whitespace-nowrap">Image</th>
                        <th class="whitespace-nowrap">Category name</th>
                        <th class="whitespace-nowrap">Parent Category</th>
                        <th class="whitespace-nowrap">Order</th>
                        <th class="text-center whitespace-nowrap">SEO_title</th>
                        <th class="text-center whitespace-nowrap">SEO_description</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)

                        <tr id="{{$category->id}}" class="intro-x" data-action="{{$category->id}}">
                            <td class="">
                                <button class="btn" data-tw-toggle="modal" data-tw-target="#image_modal">
                                    @if(!$category->images->isEmpty())
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="{{$category->images[0]->alt}}" class="rounded-lg border-1 border-white shadow-md tooltip" src="{{asset($category->images[0]->image)}}" title="Updated at {{$category->images[0]->updated_at}}">
                                        </div>
                                    @endif
                                </button>
                            </td>
                        <td class="editable" data-field="title" data-action="read" data-selectable="text">
                            <a href="#" class="font-medium whitespace-nowrap">{{ $category->title }}</a>
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
                            <td class="editable text-center" data-field="seo_title" data-action="read" data-selectable="text">
                                <div class="text-center font-medium whitespace-nowrap">{{$category->seo_title}}</div>
                            </td>
                            <td class="editable text-center" data-field="seo_description" data-action="read" data-selectable="text">
                                <div class="text-center font-medium whitespace-nowrap">{{$category->seo_description}}</div>
                            </td>
                        <td class="editable" data-field="description" data-action="read" data-selectable="text">
                            <div class="text-center overflow-hidden" style="max-width: 400px;">{{ $category->description }}</div>
                        </td>
                        <td class="">
                            <div class="form-check form-switch w-full h-full flex justify-center">
                                <input class="form-check-input activation" data-field="is_active" type="checkbox" {{($category->is_active) ? 'checked' : ''}}>
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 updateMore" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger deletion" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
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
        $("body").bind("ajaxSend", function(elm, xhr, s){
            if (s.type == "POST") {
                xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
            }
        });
        $(document).ready(function () {
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
                id = $(this).parents('.intro-x').data('action');
            });
            $(document).on('click', '#delete', function () {
                $('#'+id).addClass('hidden');
                ajax('', '', id, 'Delete');
            });
            function ajax(field, newValue, categoryId, method) {
                // alert('field:'+field+"\n value:"+newValue+"\n ID:"+categoryId);
                $.ajax({
                    url: "categories/" + categoryId, // Replace with your route for updating the category
                    method: method,
                    dataType: "json",
                    encode: true,
                    data: {
                        field: field,
                        value: newValue,
                        categoryId: categoryId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        $("#message").fadeIn(500).fadeOut(2000);
                    },
                    error: function (error) {
                        console.error('Update failed:', error);
                    }
                });
            }
        });

        // ************************ Drag and drop ***************** //
        let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
        ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false)
            document.body.addEventListener(eventName, preventDefaults, false)
        })

// Highlight drop area when item is dragged over it
        ;['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false)
        })

        ;['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false)
        })

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false)

        function preventDefaults (e) {
            e.preventDefault()
            e.stopPropagation()
        }

        function highlight(e) {
            dropArea.classList.add('highlight')
        }

        function unhighlight(e) {
            dropArea.classList.remove('active')
        }

        function handleDrop(e) {
            var dt = e.dataTransfer
            var files = dt.files

            handleFiles(files)
        }

        let uploadProgress = []
        let progressBar = document.getElementById('progress-bar')

        function initializeProgress(numFiles) {
            progressBar.value = 0
            uploadProgress = []

            for(let i = numFiles; i > 0; i--) {
                uploadProgress.push(0)
            }
        }

        function updateProgress(fileNumber, percent) {
            uploadProgress[fileNumber] = percent
            let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
            progressBar.value = total
        }

        function handleFiles(files) {
            files = [...files]
            initializeProgress(files.length)
            files.forEach(uploadFile)
            files.forEach(previewFile)
        }

        function previewFile(file) {
            let reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onloadend = function() {
                let img = document.createElement('img')
                img.src = reader.result
                document.getElementById('gallery').appendChild(img)
            }
        }

        function uploadFile(file, i) {
            var url = 'upload'
            var xhr = new XMLHttpRequest();
            var formData = new FormData();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            // Include CSRF token, required by Laravel for POST requests
            // var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);


            xhr.addEventListener('readystatechange', function(e) {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    updateProgress(i, 100) // <- Add this
                    // var response = JSON.parse(xhr.responseText);
                    // alert(response);
                }
                else if (xhr.readyState == 4 && xhr.status != 200) {
                    // Error. Inform the user
                }
            })

            // formData.append('upload_preset', 'ujpu6gyk')
            formData.append('file', file)
            xhr.send(formData)
        }
    </script>
@endsection
