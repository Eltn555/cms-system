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
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 stroke="currentColor" stroke-width="2"
                                                                                 stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 icon-name="plus"
                                                                                 class="lucide lucide-plus w-4 h-4"
                                                                                 data-lucide="plus"><line x1="12" y1="5"
                                                                                                          x2="12"
                                                                                                          y2="19"></line><line
                                x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="printer" data-lucide="printer"
                                 class="lucide lucide-printer w-4 h-4 mr-2">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path
                                    d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                 class="lucide lucide-file-text w-4 h-4 mr-2">
                                <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <line x1="10" y1="9" x2="8" y2="9"></line>
                            </svg>
                            Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                 class="lucide lucide-file-text w-4 h-4 mr-2">
                                <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <line x1="10" y1="9" x2="8" y2="9"></line>
                            </svg>
                            Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500">Showing {{ $products->count() }}
            of {{ $products->count() }} entries
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                     data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    </div>
    <!-- END: Top Navigation -->

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto ">
        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="whitespace-nowrap">Изображение</th>
                <th class="whitespace-nowrap">Название</th>
                <th class="text-center whitespace-nowrap">Описание</th>
                <th class="text-center whitespace-nowrap">Цена</th>
                <th class="text-center whitespace-nowrap">Каетегория</th>
                <th class="text-center whitespace-nowrap">Тэги</th>
                <th class="text-center whitespace-nowrap">Рейтинг</th>
                <th class="text-center whitespace-nowrap">Статус</th>
                <th class="text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>


            @foreach ($products as $product)

                <tr class="intro-x">
                    <td class="w-40">
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
                    <td class="">
                        <a href="" class="font-medium">{{ $product->title }}</a>
                    </td>
                    <td class="text-center tooltip" title="{{$product->short_description}}" data-tw-toggle="modal"
                        data-tw-target="#short_description_{{ $product->id }}">
                        {{ substr($product->short_description, 0, 35) }}
                        <!-- BEGIN: Super Large Modal Content -->
                        <div id="short_description_{{ $product->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content py-10 px-10 ">
                                    {!! substr($product->short_description, 0, 35) !!}
                                </div>
                            </div>
                        </div> <!-- END: Super Large Modal Content -->
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ substr($product->long_description, 0, 40) }}</div>
                    </td>
                    <td class="text-center">{{ $product->price }}</td>
                    <td class="text-center"> {{ $product->category->title ?? '' }}</td>
                    <td class="text-center">{{ $product->rate }}</td>
                    <td class="text-center">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="star" data-lucide="star"
                                     class="lucide lucide-star text-pending fill-pending/30 w-4 h-4 mr-1">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="star" data-lucide="star"
                                     class="lucide lucide-star text-pending fill-pending/30 w-4 h-4 mr-1">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="star" data-lucide="star"
                                     class="lucide lucide-star text-pending fill-pending/30 w-4 h-4 mr-1">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="star" data-lucide="star"
                                     class="lucide lucide-star text-pending fill-pending/30 w-4 h-4 mr-1">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="star" data-lucide="star"
                                     class="lucide lucide-star text-slate-400 fill-slate/30 w-4 h-4 mr-1">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            </div>
                            <div class="text-xs text-slate-500 ml-1">(4.5+)</div>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex items-center justify-center text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                 class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg>
                            Inactive
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{route('admin.products.edit', $product->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                     class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg>
                                Edit </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                               data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2"
                                     class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                Delete </a>
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
            {{ $products->links('vendor.pagination.bootstrap-5') }}
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


    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="x-circle" data-lucide="x-circle"
                             class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
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
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
