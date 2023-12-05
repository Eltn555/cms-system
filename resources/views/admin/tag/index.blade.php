@extends('admin')

@section('content')
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Тэги
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-order-modal" class="btn btn-primary shadow-md mr-2">New Order</a>
                <div class="pos-dropdown dropdown ml-auto sm:ml-0" style="position: relative;">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" class="lucide lucide-chevron-down w-4 h-4" data-lucide="chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </span>
                    </button>
                    <div class="pos-dropdown__dropdown-menu dropdown-menu" id="_7juwrhmgc" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 37.6px, 0px);">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> <span class="truncate">INV-0206020 - Angelina Jolie</span> </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> <span class="truncate">INV-0206022 - Al Pacino</span> </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> <span class="truncate">INV-0206021 - Johnny Depp</span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Item List -->
            <div class="intro-y col-span-12">
                <div class="lg:flex intro-y">
                    <div class="relative">
                        <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="Search item...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <select class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option>Sort By</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                        <option>Lowest Price</option>
                        <option>Highest Price</option>
                    </select>
                </div>
                <div class="grid grid-cols-12 gap-5 mt-5">
                    <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                        <div class="font-medium text-base">Soup</div>
                        <div class="text-slate-500">5 Items</div>
                    </div>
                    <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box bg-primary p-5 cursor-pointer zoom-in">
                        <div class="font-medium text-base text-white">Pancake &amp; Toast</div>
                        <div class="text-white text-opacity-80 dark:text-slate-500">8 Items</div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-2.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Milkshake</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-14.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Virginia Cheese Wedges</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-6.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Ultimate Burger</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-17.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Fried Calamari</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-1.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Vanilla Latte</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-17.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Fried Calamari</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-6.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Ultimate Burger</div>
                        </div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="dist/images/food-beverage-18.jpg">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">Chicken Wings</div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END: Item List -->
        <!-- BEGIN: Add Item Modal -->
        <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            Milkshake
                        </h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-4" class="form-label">Quantity</label>
                            <div class="flex mt-2 flex-1">
                                <button type="button" class="btn w-12 border-slate-200 bg-slate-100 dark:bg-darkmode-700 dark:border-darkmode-500 text-slate-500 mr-1">-</button>
                                <input id="pos-form-4" type="text" class="form-control w-24 text-center" placeholder="Item quantity" value="2">
                                <button type="button" class="btn w-12 border-slate-200 bg-slate-100 dark:bg-darkmode-700 dark:border-darkmode-500 text-slate-500 ml-1">+</button>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-5" class="form-label">Notes</label>
                            <textarea id="pos-form-5" class="form-control w-full mt-2" placeholder="Item notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-primary w-24">Add Item</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Add Item Modal -->
@endsection
