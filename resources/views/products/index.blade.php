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
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>
    <!-- BEGIN: Top Navigation -->
    {{--    <div class="grid grid-cols-12 gap-6 mt-5">--}}
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary shadow-md mr-2">Add New Product</a>
        <div class="md:block mx-auto text-slate-500">Showing {{ $products->count() }}
            of {{ $overall }} entries
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form action="{{ url()->current() }}" method="GET" class="flex">
                <div class="w-56 relative text-slate-500">
                    <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Поиск...">
                    <button type="submit" class="w-6 h-6 absolute my-auto inset-y-0 mr-3 right-0">
                        <i class="fa-solid fa-magnifying-glass text-primary"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END: Top Navigation -->

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto ">
        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="whitespace-nowrap">Изображение</th>
                <th class="whitespace-nowrap text-center">Название</th>
                <th class="text-center whitespace-nowrap">Описание</th>
                <th class="text-center whitespace-nowrap">Цена</th>
                <th class="text-center whitespace-nowrap">Цена скидка</th>
                <th class="text-center whitespace-nowrap">Наличие</th>
                <th class="text-center whitespace-nowrap">Каетегория товар</th>
                <th class="text-center whitespace-nowrap">Статус</th>
                <th class="text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>


            @foreach ($products as $product)

                <tr id="{{$product->id}}" class="intro-x" data-action="{{$product->id}}">
                    <td class="w-40" style="padding: 5px;">
                        <div class="flex">
                            @php $imageCount = 0 @endphp

                            @foreach($product->images as $image)
                                @if ($imageCount < 3)
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="{{ $image->alt }}" title="{{ $image->alt }}" class="tooltip rounded-full"
                                             src="{{ asset('storage/' . $image->image) }}">
                                    </div>
                                    @php $imageCount++ @endphp
                                @else
                                    @break
                                @endif
                            @endforeach
                        </div>
                        {{--<div class="flex">
                            @if(0 !== 0 )
                                @for($i = 0; $i < 3; $i++)
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="" class="tooltip rounded-full"
                                             src="{{ $product->images()[$i]->image }}">
                                    </div>
                                @endfor
                            @endif
                        </div>--}}
                    </td>
                    <td class="editable" data-field="title" data-action="read" data-selectable="text">
                        <a class="font-medium">{{ $product->title }}</a>
                    </td>
                    <td class="text-center tooltip" title="{{$product->short_description}}">
                        <div class="editable" data-field="title" data-action="read" data-selectable="text">{{ substr($product->short_description, 0, 35) }}</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ substr($product->long_description, 0, 40) }}</div>
                    </td>
                    <td class="editable text-center" data-field="price" data-action="read" data-selectable="number">
                        <div class="">{{$product->price}}</div>
                    </td>
                    <td class="editable text-center" data-field="discount_price" data-action="read" data-selectable="number">
                        <div class="">{{$product->discount_price}}</div>
                    </td>
                    <td class="editable text-center" data-field="amount" data-action="read" data-selectable="number">
                        <div class="">{{$product->amount}}</div>
                    </td>
                    <td>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            @foreach($product->categories as $category)
                                 {{$category->title.", "}}
                            @endforeach
                        </div>
                    </td>
                    <td class="">
                        <div class="form-check form-switch w-full h-full flex justify-center">
                            <input class="form-check-input activation" data-field="status" type="checkbox" {{($product->status) ? 'checked' : ''}}>
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{route('admin.products.edit', [$product->id, 'page' => $currentPageNumber]) }}">
                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                Edit </a>
                            <a class="flex items-center text-danger deletion" href="javascript:;" data-tw-toggle="modal"
                               data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                                                               class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center grid grid-cols-12">
        <div class="" style="grid-column: span 8 / span 8;">
            {{ $products->appends(['perPage' => $perPage, 'search' => request()->input('search')])->links('vendor.pagination.bootstrap-5') }}
        </div>
        <div class="pagination-count col-span-4 flex justify-end">
            <form action="{{ route('admin.products.index') }}" method="get">
                @csrf
                <label for="perPage">Items per page:</label>
                <select name="perPage" id="perPage" onchange="this.form.submit()">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    <!-- Add more options as needed -->
                </select>
            </form>
        </div>
    </div>
    <!-- END: Pagination -->
    {{--    </div>--}}

    <div id="message" class="m-0 fixed alert border-success bg-white show px-3 py-2 rounded absolute flex items-center text-success font-bold" style=" left:50%; transform: translateX(-50%); z-index: 9999; top: 100px; display: none" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>  Updated</div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i class="fa-solid fa-xmark text-danger"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                            Cancel
                        </button>
                        <button id="delete" data-tw-dismiss="modal" type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                ajax($editable.data('field'), $(this).val(), $editable.parents('.intro-x').data('action'), 'POST');
                $editable.html(newValue).css('width', 'unset').css('max-width', '150px');
            });
            $('.edition, .activation').on('change', function () {
                var value = $(this).hasClass('activation') ? this.checked ? 1 : 0 : $(this).val();
                ajax($(this).data('field'), value, $(this).parents('.intro-x').data('action'), 'POST');
            });
            $(document).on('click', '.deletion', function () {
                id = $(this).parents('.intro-x').data('action');
            });
            $(document).on('click', '#delete', function () {
                $('#'+id).addClass('hidden');
                ajax('delete', '', id, 'POST');
            });

            function ajax(field, newValue, productID, method) {
                $.ajax({
                    url: '{{ route('products.update') }}',
                    type: method,
                    dataType: "json",
                    encode: true,
                    processData: true,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    data: {
                        field,
                        value: newValue,
                        productID,
                        _token: "{{ csrf_token() }}"
                    },
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
