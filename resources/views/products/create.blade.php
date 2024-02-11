@extends('admin')

@section('styles')
    <style>
        .line {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 15px;
            background-color: #4b9cdb;
        }

        .load-wrap {
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 3;
            position: absolute;
        }

        .load-1 .line:nth-last-child(1) {
            animation: loadingA 1.5s 1s infinite;
        }

        .load-1 .line:nth-last-child(2) {
            animation: loadingA 1.5s 0.5s infinite;
        }

        .load-1 .line:nth-last-child(3) {
            animation: loadingA 1.5s 0s infinite;
        }

        .editable, .editabledesc {
            min-width: 10px;
            max-width: 200px;
            overflow: hidden;
        }

        table td {
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

        @keyframes loadingA {
            0% {
                height: 15px;
            }
            50% {
                height: 35px;
            }
            100% {
                height: 15px;
            }
        }
    </style>
@endsection

@section('content')

    <h2 class="intro-y text-lg font-medium my-6">Create New Product</h2>
        <div class="intro-y box m-auto py-5 px-5 grid col-span-12">
            <div class="col-span-12">
                    <label class="form-label">Upload Image</label>
                    <div id="dropBox" class="border-2 border-dashed dark:border-darkmode-400 rounded-md p-2">
                        <div class="flex flex-wrap px-4">
                            <div id="imgs" class="flex">
                                <!-- rasmla shettan chqadi -->
                            </div>
                            <form id="" enctype="multipart/form-data">
                                @csrf
                                <div class="avatar-wrapper w-24 h-24 image-fit zoom-in">
                                    <img id="" class="img_category profile-pic w-24 h-24" src="{{asset('add.png')}}"/>
                                    <div class="upload-button flex items-center justify-center rounded">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             style="transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round"
                                             class="w-24 h-24 fa-arrow-circle-up lucide lucide-upload">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                            <polyline points="17 8 12 3 7 8"/>
                                            <line x1="12" x2="12" y1="3" y2="15"/>
                                        </svg>
                                    </div>
                                    <input name="images[]" class="file-upload hidden" type="file" multiple accept="image/*"
                                           data-action="{{$next}}"/>
                                    <input name="id" class="hidden" value="{{ $next }}"/>
                                    <div class="hidden load-wrap w-full h-full flex justify-center items-center">
                                        <div class="load-1" style="z-index: 3">
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
                    <label for="Title" class="form-label">Title</label>
                    <input id="Title" name="title" required type="text" class="form-control" placeholder="Table Lamp">
                </div>
                <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
                    <label for="Price" class="form-label"><b class="text-danger">* </b>Price</label>
                    <input id="Price" required name="price" type="number" class="form-control"
                           placeholder="Enter a price...">
                </div>
                <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
                    <label for="Discount-price" class="form-label">Discount Price</label>
                    <input id="Discount-price" name="discount_price" type="number" class="form-control"
                           placeholder="Enter a discount price... (optional)">
                </div>
                <div class="col-span-4 mx-2 sm:col-span-5 mt-3">
                    <label for="category" class="form-label"><b class="text-danger">* </b>Category</label>
                    <select id="category" required name="category_id" class="form-select">
                        <option value="" disabled selected>Not selected</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2 mx-3 sm:col-span-2 mt-3">
                    <label for="visible" class="form-label">Visible</label>
                    <div class="form-check form-switch p-0">
                        <input id="visible" class="form-check-input"
                               name="status" type="checkbox" value="1" checked>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-12 mt-3">
                    <label for="short-description" class="form-label">Info</label>
                    <textarea id="short-description" class="form-control h-[110px]" name="short_description"
                              placeholder="Short Description"></textarea>
                </div>
                <div class="col-span-12 sm:col-span-12 mt-3">
                    <label for="modal-form-3" class="form-label">Long Description</label>
                    <textarea id="modal-form-3" class="tinyeditor form-control h-[110px]" name="long_description"
                              placeholder="Long Description">

                    </textarea>
                </div>

                <div class="col-span-12 sm:col-span-12 mt-3">
                    <label for="additional" class="form-label">Tech specs</label>
                    <textarea id="additional" class="tinyeditor form-control h-[110px]" name="additional"
                              placeholder="Additional">
                        <table class="table table-striped" style="height: 181px; width: 93.0348%;">
    <tbody>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Вес внутреннего блока</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Блока</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Охлаждение</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Инвертор</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Длина упаковки</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    <tr>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 50.5487%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Страна производителя</span></td>
    <td class="ck-editor__editable ck-editor__nested-editable" style="width: 49.4838%;" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">&nbsp;</span></td>
    </tr>
    </tbody>
    </table>
                    </textarea>
                </div>

                <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
                    <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Similar
                        products</label>
                    <select data-placeholder="Select tags" class="tom-select w-full tomselected"
                            id="post-form-3" name="tags[]" required
                            multiple="multiple" tabindex="-1" hidden="hidden">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->title }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
                    <label for="seoTitle" class="form-label" id="post-form-3-ts-label">SEO</label>
                    <input id="seoTitle" name="seo_title" type="text" class="form-control"
                           placeholder="SEO Title">
                </div>
                <div class="col-span-6 mx-2 sm:col-span-6 mt-3 h-[110px]">
                    <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Additional
                        products</label>
                    <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                            id="post-form-3" name="additional_products[]"
                            multiple="multiple" required tabindex="-1" hidden="hidden">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->title }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
                    <label for="seoDescription" class="form-label">SEO Description</label>
                    <textarea id="seoDescription" class="form-control h-[215px]" name="seo_description"
                              placeholder="SEO Description" rows="3"></textarea>
                </div>

                <div class="text-right mt-5 col-span-12">
                    <a href="{{ URL::previous() }}" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </form>
        </div>
@endsection

@section('script')
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinyeditor',
            plugins: 'code table powerpaste casechange searchreplace autolink directionality advcode visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave',
            language: 'ru',
            promotion: false,
            branding: false
        });

        var id;
        let input, form, formdata, id_parent;

        $(document).ready(function () {
            $('#Title').on('input', function () {
                $('#seoTitle').val($(this).val());
            });

            $('#short-description').on('input', function () {
                $('#seoDescription').val($(this).val());
            });

            $(".file-upload").on('change', function () {
                $('.load-wrap').removeClass('hidden');
                input = this;
                form = $(this).parents('form');
                formData = new FormData(form[0]);

                id_parent = $(this).parents('.intro-x').data('action');
                // Handle the 'create' case separately
                if ($(this).data('selectable') !== 'create') {
                    ajax('image', formData, $(this).data('action'), 'POST');
                }
                // Function to handle file preview
            });

            function previewFiles(id) {
                if (input.files && input.files.length > 0) {
                    for (let i = 0; i < input.files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            let fileurl = e.target.result;
                            $('#imgs').append(`<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                        <img class="rounded-md" src="` + fileurl + `">
                        <button data-action="${id[i]}" class="deleteImage w-5 h-5 flex items-center justify-center absolute text-center rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                            ✘
                        </button>
                    </div>`);
                        };
                        reader.readAsDataURL(input.files[i]);
                        $('.load-wrap').addClass('hidden');
                    }
                }
            }

            $(".upload-button").on('click', function () {
                $(this).siblings('.file-upload').click();
            });

            $(document).on('click', '.deleteImage', function () {
                $(this).parents('.image-fit').addClass('hidden');
                let imageId = $(this).data('action');
                ajax('imageDelete', '', imageId, 'Delete');
            });

            function ajax(field, newValue, ID, method) {
                let apiUrl;
                switch (field) {
                    case 'image':
                        apiUrl = '{{ route('products.upload') }}';
                        break;
                    case 'imageDelete':
                        apiUrl = '{{ route('image.delete') }}';
                        break;
                    default:
                        apiUrl = 'products/' + ID;
                        break;
                }
                const requestData = field === 'image' ? newValue : {
                    field,
                    value: newValue,
                    ID,
                    _token: "{{ csrf_token() }}"
                };

                $.ajax({
                    url: apiUrl,
                    type: method,
                    dataType: "json",
                    encode: true,
                    processData: field !== 'image',
                    contentType: field === 'image' ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
                    data: requestData,
                    success: function (response) {
                        $("#message").fadeIn(500).fadeOut(2000);
                        console.log(response);
                        if (field === 'image') {
                            id = response.id;
                            console.log(id);
                            previewFiles(id);
                        }
                    },
                    error: function (error) {
                        console.error('Update failed:', error);
                    }
                });
            }
        })

    </script>
@endsection
