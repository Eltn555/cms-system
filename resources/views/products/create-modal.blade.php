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
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                   class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, WEBP, JPEG or GIF
                                        (MAX.
                                        800x400px)</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">(MAX. SIZE 5mb)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="image" class="hidden"/>
                            </label>
                        </div>

                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-1" class="form-label">Title</label>
                        <input id="modal-form-1" name="title" type="text" class="form-control" placeholder="Table Lamp">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Description</label>
                        <input id="modal-form-2" name="short_description" type="text" class="form-control"
                               placeholder="Short Description">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Price</label>
                        <input id="modal-form-2" name="price" type="number" class="form-control"
                               placeholder="Price write...">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-2" class="form-label">Status</label>
                        <input id="modal-form-2" name="status" type="number" class="form-control"
                               placeholder="Status write...">
                    </div>
                    <div class="col-span-12">
                        <label for="modal-form-3" class="form-label">Long Description</label>
                        <textarea id="modal-form-3" class="" name="long_description"
                                  placeholder="Long Description"></textarea>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-6" class="form-label">Category</label>
                        <select id="modal-form-6" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Tags</label>
                        <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                                id="post-form-3"
                                multiple="multiple" tabindex="-1" hidden="hidden">
                            <option value="1" selected="true">Horror</option>
                            <option value="3" selected="true">Action</option>
                            <option value="5" selected="true">Comedy</option>
                            <option value="4" selected="true">Drama</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6 mt-3">
                        <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">SEO</label>
                        <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                                id="post-form-3"
                                multiple="multiple" name="seo_title" tabindex="-1" hidden="hidden">
                        </select>
                    </div>
                    <div class="col-span-6 mt-3">
                        <label for="modal-form-4" class="form-label">Long Description</label>
                        <textarea id="modal-form-4" class="form-control" name="seo_description"
                                  placeholder="Seo Description" rows="3"></textarea>
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

        $("#modal-form-3").each(function () {
            const el = this;
            ClassicEditor.create(el).catch((error) => {
                console.error(error);
            });
        });
    </script>
@endsection
