<!-- BEGIN: Modal Content -->
<div id="create-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> <!-- BEGIN: Modal Header -->
            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <div  class="mt-3">
                            <label class="form-label">Upload Image</label>
                            <div id="dropBox" class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                <div class="flex flex-wrap px-4">
                                    <div id="gallery" class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="Midone - HTML Admin Template"
                                             src="{{asset('dist/images/preview-5.jpg')}}">
                                        <div title="Remove this image?"
                                             class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                            <i data-lucide="x" class="w-4 h-4"></i></div>
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span>
                                    or drag and drop
                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                           name="image[]" id="imgUpload" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Additional
                            products</label>
                        <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                                id="post-form-3" name="additional_products"
                                multiple="multiple" tabindex="-1" hidden="hidden">
                            <option value="1" selected="true">Horror</option>
                            <option value="3" selected="true">Action</option>
                            <option value="5" selected="true">Comedy</option>
                            <option value="4" selected="true">Drama</option>
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
                </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary w-20">Send</button>
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div> <!-- END: Modal Content -->

@section('script')
    <script type="text/javascript">

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
        const dropBox = document.getElementById('dropBox');
        const gallery = document.getElementById('gallery');

        dropBox.addEventListener('dragover', (e) => {
            e.preventDefault(); // Prevent default behavior
            dropBox.classList.add('highlight');
        });

        dropBox.addEventListener('dragleave', (e) => {
            dropBox.classList.remove('highlight');
        });

        dropBox.addEventListener('drop', (e) => {
            e.preventDefault();
            dropBox.classList.remove('highlight');
            filesManager(e.dataTransfer.files); // Handle dropped files
        });

        const imgUpload = document.getElementById('imgUpload');
        imgUpload.addEventListener('change', (e) => {
            filesManager(e.target.files); // Handle selected files
        });

        function filesManager(files) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.classList.add('preview');
                    img.src = URL.createObjectURL(file);
                    gallery.appendChild(img);

                    // Optional: Add delete button for each preview
                    img.addEventListener('click', () => {
                        gallery.removeChild(img);
                        URL.revokeObjectURL(img.src);
                    });
                }
            }
        }


    </script>
@endsection
