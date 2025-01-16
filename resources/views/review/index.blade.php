@extends('admin')
@section('styles')
    <style>
        .select-search{
            top: 100%;
            background-color: white;
            border-radius: 10px;
            border: solid lightgray 1px;

        }
        .select-search button{
            padding: 5px;
        }
    </style>
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Reviews
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button id="createRev" data-tw-toggle="modal" class="btn btn-primary shadow-md mr-2">Add New Review</button>
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
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to {{count($reviews)}}</div>
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
                    <th class="whitespace-nowrap">USER</th>
                    <th class="whitespace-nowrap">RATE</th>
                    <th class="whitespace-nowrap">TEXT</th>
                    <th class="whitespace-nowrap text-center">DATE</th>
                    <th class="text-center whitespace-nowrap">PRODUCT</th>
                    <th class="text-center whitespace-nowrap">DELETE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <livewire:admin.review.review :review="$review" :key="$review->id" />
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center grid grid-cols-12">
        <div class="" style="grid-column: span 8 / span 8;">
            {{ $reviews->appends(['perPage' => $perPage, 'search' => request()->input('search')])->links('vendor.pagination.bootstrap-5') }}
        </div>
        <div class="pagination-count col-span-4 flex justify-end">
            <form action="{{ route('admin.reviews.index') }}" method="get">
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

    <div id="message" class="m-0 fixed alert border-success bg-white show px-3 py-2 rounded absolute flex items-center text-success font-bold" style=" left:50%; transform: translateX(-50%); z-index: 9999; top: 100px; display: none" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>  Updated</div>
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
                        <button id="delete" data-tw-dismiss="modal" type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @include('categories.create-modal')--}}
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
        $(document).ready(function () {
            $('.editable').on('dblclick', function () {
                if ($(this).data('action') === 'read') {
                    var $input = $('<input type="' + $(this).data('selectable') + '" class="form-control" value="' + $.trim($(this).text()) + '" />');
                    $(this).html($input).data('action', 'write');
                    $input.focus();
                }
            });
            $('.editablee').on('dblclick', function () {
                if ($(this).data('action') === 'read') {
                    $(this).children('a').addClass('hidden');
                    $(this).children('.relative').removeClass('hidden');
                    $(this).children('input').focus();
                }
            });
            $('.close-s').on('click', function () {
                    $('.text-div').addClass('hidden');
                    $('.text-inform').removeClass('hidden');
            });
            $(document).on('blur', '.editable input', function () {
                var $editable = $(this).parent('.editable');
                $editable.data('action', 'read');
                var newValue = '<div class="font-medium whitespace-nowrap">' + $(this).val() + '</div>';
                $editable.html(newValue);
                // Livewire.emit('updateR', $editable.parents('.intro-x').data('action'), $(this).val(), $editable.data('field'));
            });
            $(document).on('click', '.deletion', function () {
                id = $(this).parents('.intro-x').data('action');
            });
            $(document).on('click', '#delete', function () {
                $('#'+id).addClass('hidden');
                confirmDelete(id);
            });
            $(document).on('click', '#createRev', function () {
                Livewire.emit('createReview');
            });
            function confirmDelete(reviewId) {
                Livewire.emit('deleteReview', reviewId);
            }
        });
    </script>
@endsection
