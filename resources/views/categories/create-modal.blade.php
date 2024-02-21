<!-- BEGIN: Modal Content -->
<div id="create-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> <!-- BEGIN: Modal Header -->
            <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="col-span-12 p-2 flex items-center">
                    <label for="icon" class="form-label font-bold font">Icon</label>
                        <div class="avatar-wrapper w-24 h-24 image-fit zoom-in tooltip" title="Click to upload">
                            <img id="" class="img_category profile-pic w-24 h-24" alt="" src="{{asset('no_photo.jpg')}}"/>
                            <div class="upload-button flex items-center justify-center">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="border-radius: 15%; transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round" class="w-20 h-20 fa-arrow-circle-up lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            </div>
                            <input id="icon" name="icon" class="file-upload" type="file" accept="image/*" data-selectable="create"/>
                        </div>
                    <label for="background" class="form-label font-bold font ml-8">Background</label>
                        <div class="avatar-wrapper w-24 h-24 image-fit zoom-in tooltip" title="Click to upload">
                            <img id="" class="img_category profile-pic w-24 h-24" alt="" src="{{asset('no_photo.jpg')}}"/>
                            <div class="upload-button flex items-center justify-center">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="border-radius: 15%; transform: translateX(-50%) translateY(-50%); top:50%; left: 50%;" stroke-linejoin="round" class="w-20 h-20 fa-arrow-circle-up lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            </div>
                            <input id="background" name="background" class="file-upload" type="file" accept="image/*" data-selectable="create"/>
                        </div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Category title">
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-2" class="form-label">Parent category</label>
                    <div class="w-full xl:mt-0 flex-1">
                        <select id="modal-form-2" name="parent_category_id" class="form-select" data-field="parent_category_id">
                            @foreach($categories as $lilcat)
                                    <option value="{{$lilcat->id}}">{{$lilcat->title}}</option>
                            @endforeach
                            <option value="5" selected>Not Selected</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-12">
                    <label for="description" class="form-label">Description</label>
                   <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label for="seo_title" class="form-label">SEO title</label>
                    <input name="seo_title" id="seo_title" type="text" class="form-control" placeholder="SEO title">
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label for="seo_description" class="form-label">SEO description</label>
                    <input name="seo_description" id="seo_description" type="text" class="form-control" placeholder="SEO description">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="modal-form-1" class="form-label">Activated</label>
                    <div class="form-check form-switch p-0">
                        <input class="form-check-input" name="is_active" type="checkbox" checked>
                    </div>
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
                <button type="submit" class="btn btn-primary w-20">Create</button>
            </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div> <!-- END: Modal Content -->

