@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Accounts
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
{{--            <a href="{{ route('admin.account.create') }}" class="btn btn-primary shadow-md mr-2">Add New Account</a>--}}
            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $accounts->count() }}
                of {{ $accounts->count() }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="{{url()->current()}}" method="GET" class="flex">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass text-primary absolute my-auto inset-y-0 mr-3 mt-4 right-0"></i>
                    </div>
                </form>
            </div>
        </div>

        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">USER</th>
                    <th class="text-center whitespace-nowrap">PHONE</th>
                    <th class="text-center whitespace-nowrap">ADDRESS</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr class="intro-x">
                        <td class="!py-3.5">
                            <div class="flex items-center">
                                <div class="w-9 h-9 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template"
                                         class="rounded-lg border-white shadow-md tooltip"
                                         src="{{ $account->image === 'no_photo.jpg' ? asset($account->image) : asset('storage/' . $account->image) }}">
                                </div>
                                <div class="ml-4">
                                    <a href="{{ route('admin.account.edit', $account->id) }}"
                                       class="font-medium whitespace-nowrap">{{ $account->lastname }} {{ $account->name }}</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        {{ $account->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><a class="flex items-center justify-center underline decoration-dotted"
                                                   href="tel:{{ $account->phone }}">{{ $account->phone }}</a></td>
                        <td class="text-center capitalize">{{ $account->city }}, {{ $account->state }}, {{ $account->address }} {{ $account->home }}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                     class="lucide lucide-check-square w-4 h-4 mr-2">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg>
                                @if($account->role == 1)
                                    Admin
                                @elseif($account->role == 2)
                                    User
                                @endif
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('admin.account.edit', $account->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                         class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>
                                    Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-modal-preview-{{ $account->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                    Delete </a>
                                <!-- BEGIN: Modal Content -->
                                <div id="delete-modal-preview-{{ $account->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.account.destroy', $account->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center"><i data-lucide="x-circle"
                                                                                    class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                        <div class="text-3xl mt-5">Are you sure?</div>
                                                        <div class="text-slate-500 mt-2">Do you really want to delete "{{ $account->lastname }} {{ $account->name }}"
                                                            <br>This process cannot be undone.
                                                        </div>
                                                    </div>
                                                    <div class="px-5 pb-8 text-center">
                                                        <button type="button" data-tw-dismiss="modal"
                                                                class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- END: Modal Content -->
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center grid grid-cols-12">
            <div class="" style="grid-column: span 8 / span 8;">
                {{ $accounts->appends(['perPage' => $perPage, 'search' => request()->input('search')])->links('vendor.pagination.bootstrap-5') }}
            </div>
            <div class="pagination-count col-span-4 flex justify-end">
                <form action="{{ route('admin.account.index') }}" method="get">
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
    </div>
@endsection
