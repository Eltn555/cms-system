<!-- BEGIN: Modal Content -->
<div id="create-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Adding New Product</h2>
                    <button class="btn btn-outline-secondary hidden sm:flex">
                        <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                        Download Docs
                    </button>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                           data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li><a href="javascript:;" class="dropdown-item">
                                        <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                                        Download Docs
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <div class="col-span-12">
                <div  class="mt-3">
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
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round" class="w-24 h-24 fa-arrow-circle-up lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    </div>
{{--                                    <input name="image[]" class="file-upload hidden" type="file" multiple accept="image/*" data-action="{{$next}}"/>--}}
{{--                                    <input name="id" class="hidden" value="{{ $next }}"/>--}}
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
            </div>
            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Title</label>
                            <input id="modal-form-1" name="title" type="text" class="form-control" placeholder="Table Lamp">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">Description</label>
                            <textarea id="modal-form-2" class="form-control h-[110px]" name="short_description"
                                      placeholder="Short Description"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="modal-form-3" class="form-label">Long Description</label>
                            <textarea id="modal-form-3" class="" name="long_description"
                                      placeholder="Long Description"></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-4" class="form-label"><b class="text-">* </b>Price</label>
                            <input id="modal-form-4" name="price" type="number" class="form-control"
                                   placeholder="Price write...">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-7" class="form-label">Discount Price</label>
                            <input id="modal-form-7" name="discount_price" type="number" class="form-control"
                                   placeholder="Price write...">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label"><b class="text-">* </b>Category</label>
                            <select id="modal-form-6" name="category_id" class="form-select">
                                <option value="" disabled selected>Not selected</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Visible</label>
                            <div class="form-check form-switch p-0">
                                <input id="modal-form-5" class="form-check-input" name="status" type="checkbox" value="1"
                                       checked>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Similar
                                products</label>
                            <select data-placeholder="Select tags" class="tom-select w-full tomselected"
                                    id="post-form-3" name="tags[]"
                                    multiple="multiple" tabindex="-1" hidden="hidden">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->title }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Additional
                                products</label>
                            <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                                    id="post-form-3" name="additional_products[]"
                                    multiple="multiple" tabindex="-1" hidden="hidden">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->title }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12 mt-3">
                            <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">SEO</label>
                            <input id="modal-form-1" name="seo_title" type="text" class="form-control"
                                   placeholder="SEO Title">
                        </div>
                        <div class="col-span-12 sm:col-span-12 mt-3">
                            <label for="modal-form-4" class="form-label">SEO Description</label>
                            <textarea id="modal-form-4" class="form-control" name="seo_description"
                                      placeholder="SEO Description" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary w-20">Send</button>
                        </div> <!-- END: Modal Footer -->
                </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
            </form>
        </div>
    </div>
</div> <!-- END: Modal Content -->

@section('script')
    <script type="text/javascript">
        var id;
        let input, form, formdata, id_parent;
        $("#modal-form-2").each(function () {
            const el = this;
            ClassicEditor.create(el).catch((error) => {
                console.error(error);
            });
        });
        $("#modal-form-3").each(function () {
            const el1 = this;
            ClassicEditor.create(el1).catch((error) => {
                console.error(error);
            });
        });

        $(document).ready(function () {
            $(".file-upload").on('change', function() {
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
                        reader.onload = function(e) {
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

            $(".upload-button").on('click',function(){
                $(this).siblings('.file-upload').click();
            });

            $(document).on('click', '.deleteImage', function () {
                $(this).parents('.image-fit').addClass('hidden');
                ajax('', '', id, 'Delete');
            });

            function ajax(field, newValue, ID, method) {
                let apiUrl;
                switch (field) {
                    case 'image':
                        apiUrl = '{{ route('products.upload') }}';
                        break;
                    case 'imageDelete':
                        apiUrl = 'images/' + ID;
                        break;
                    default:
                        apiUrl = 'products/' + ID;
                        break;
                }
                // const apiUrl = field === 'image' ?  : 'products/' + ID;
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
                        if (field === 'image'){
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
