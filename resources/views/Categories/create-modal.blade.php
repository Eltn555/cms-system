<!-- BEGIN: Modal Content -->
<div id="create-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">New category</h2>
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
                    <form data-single="true" action="/file-upload" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file"/>
                        </div>
                        <div class="dz-message" data-dz-message>
                            <div class="text-lg font-medium">Drop files here or click to upload.</div>
                            <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                    class="font-medium">not</span> actually uploaded.
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">Title</label>
                    <input id="modal-form-1" type="text" class="form-control" placeholder="Category title">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-2" class="form-label">Parent category</label>
                    <div class="w-full xl:mt-0 flex-1">
                        <select class="form-select edition" data-field="parent_category_id">
                            @foreach($categories as $lilcat)
                                    <option value="{{$lilcat->id}}">{{$lilcat->title}}</option>
                            @endforeach
                            <option value="" selected>Not Selected</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-12">
                    <label for="modal-form-3" class="form-label">Long Description</label>
                   <div id="editorfield">
                   </div>
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label for="modal-form-1" class="form-label">SEO title</label>
                    <input name="seo_title" id="modal-form-1" type="text" class="form-control" placeholder="SEO title">
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label for="modal-form-1" class="form-label">SEO description</label>
                    <input name="seo_description" id="modal-form-1" type="text" class="form-control" placeholder="SEO description">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">Activated</label>
                    <input class="form-check-input" name="is_active" type="checkbox" checked>
                </div><div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">Order</label>
                    <input name="order_id" id="modal-form-1" type="number" class="form-control" placeholder="0">
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Select product tags to add</label>
                    <select data-placeholder="Select categories" class="tom-select w-full tomselected" id="post-form-3"
                            multiple="multiple" tabindex="-1" hidden="hidden">
                        <option value="1" selected="true">Lamp</option>
                        <option value="3" selected="true">Luxury</option>
                        <option value="5" selected="true">-10%</option>
                        <option value="4" selected="true">Free delivery</option>
                    </select>
                </div>
            </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
            <div class="modal-footer">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary w-20">Send</button>
            </div> <!-- END: Modal Footer -->
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
