@extends('admin')

@section('content')

    <h2 class="intro-y text-lg font-medium my-10">Create New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
    <div class="intro-y box m-auto w-2/3 py-5 px-5 grid col-span-12">
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

        <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
            <label for="modal-form-1" class="form-label">Title</label>
            <input id="modal-form-1" name="title" type="text" class="form-control" placeholder="Table Lamp">
        </div>
        <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
            <label for="modal-form-4" class="form-label"><b class="text-danger">* </b>Price</label>
            <input id="modal-form-4" name="price" type="number" class="form-control"
                   placeholder="Price write...">
        </div>
        <div class="col-span-6 mx-2 sm:col-span-5 mt-3">
            <label for="modal-form-7" class="form-label">Discount Price</label>
            <input id="modal-form-7" name="discount_price" type="number" class="form-control"
                   placeholder="Price write...">
        </div>
        <div class="col-span-4 mx-2 sm:col-span-5 mt-3">
            <label for="modal-form-6" class="form-label"><b class="text-danger">* </b>Category</label>
            <select id="modal-form-6" name="category_id" class="form-select">
                <option value="" disabled selected>Not selected</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-2 mx-3 sm:col-span-2 mt-3">
            <label for="modal-form-5" class="form-label">Visible</label>
            <div class="form-check form-switch p-0">
                <input id="modal-form-5" class="form-check-input"
                       name="status" type="checkbox" value="1" checked>
            </div>
        </div>

        <div class="col-span-12 sm:col-span-12 mt-3">
            <label for="short-description" class="form-label">Description</label>
            <textarea id="short-description" class="form-control h-[110px]" name="short_description"
                      placeholder="Short Description"></textarea>
        </div>
        <div class="col-span-12 sm:col-span-12 mt-3">
            <label for="modal-form-3" class="form-label">Long Description</label>
            <textarea id="modal-form-3" class="form-control h-[110px]" name="long_description"
                      placeholder="Long Description"></textarea>
        </div>

        <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
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
        <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
            <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">SEO</label>
            <input id="modal-form-1" name="seo_title" type="text" class="form-control"
                   placeholder="SEO Title">
        </div>
        <div class="col-span-6 mx-2 sm:col-span-6 mt-3 h-[110px]">
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
        <div class="col-span-6 mx-2 sm:col-span-6 mt-3">
            <label for="modal-form-4" class="form-label">SEO Description</label>
            <textarea id="modal-form-4" class="form-control h-[215px]" name="seo_description"
                      placeholder="SEO Description" rows="3"></textarea>
        </div>

        <div class="text-right mt-5 col-span-12">
            <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            <button type="submit" class="btn btn-primary w-24">Save</button>
        </div>

    </div>
    </form>
@endsection
