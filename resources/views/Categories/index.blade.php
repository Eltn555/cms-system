@extends('admin')
@section('content')
        <h2 class="intro-y text-lg font-medium mt-10">
            Categories
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-md mr-2">Add New Category</button>
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
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
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
                        <th class="text-center whitespace-nowrap">Desciption</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)

                    <tr class="intro-x" data-action="{{$category->id}}">
                        <td class="">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="{{$category->title}}" class="rounded-lg border-1 border-white shadow-md tooltip" src="dist/images/preview-9.jpg" title="Updated at {{(is_null($category->updated_at) ? $category->created_at : $category->updated_at)}}">
                            </div>
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
                                    <option value="null" {{ is_null($category->parent_category_id) ? 'selected' : '' }}>Not Selected</option>
                                </select>
                            </div>
                        </td>
                        <td class="editable" data-field="order_id" data-action="read" data-selectable="number">
                            <div class="text-center">{{$category->order_id}}</div>
                        </td>
                        <td class="editable" data-field="description" data-action="read" data-selectable="text">
                            <div class="text-center">{{$category->description}}</div>
                        </td>
                        <td class="">
                            <div class="form-check form-switch w-full h-full flex justify-center">
                                <input class="form-check-input activation" data-field="is_active" type="checkbox" {{($category->is_active) ? 'checked' : ''}}>
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                        </li>
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
        </div>
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
                            <button type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.editable').on('dblclick', function () {
                if ($(this).data('action') == 'read'){
                    $(this).html('<input type="'+$(this).data('selectable')+'" class="form-control" value="' + $.trim($(this).text()) + '" />');
                    $(this).find('input').focus();
                    $(this).data('action', 'write');
                }
            });
            $(document).on('blur', '.editable input', function () {
                $(this).parent('.editable').data('action', 'read');
                var newValue = '<div class="text-center">'+$(this).val()+'</div>';
                ajax($(this).closest('.editable').data('field'), $(this).val(), $(this).parents('.intro-x').data('action'));
                $(this).closest('.editable').html(newValue);
            });
            $('.edition, .activation').on('change', function () {
                var value = $(this).hasClass('activation') ? this.checked ? 1 : 0 : $(this).val();
                ajax($(this).data('field'), value, $(this).parents('.intro-x').data('action'));
            });
            function ajax(field, newValue, categoryId) {
                alert('field:'+field+"\n value:"+newValue+"\n ID:"+categoryId);
                $.ajax({
                    url: '/update-category', // Replace with your route for updating the category
                    method: 'POST',
                    data: {
                        field: field,
                        value: newValue,
                        categoryId: categoryId
                    },
                    success: function (response) {
                        // Handle success response if needed
                    },
                    error: function (error) {
                        // Handle error response if needed
                    }
                });
            }
        });
    </script>
@endsection
