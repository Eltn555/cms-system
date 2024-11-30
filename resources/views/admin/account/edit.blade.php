@extends('admin')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Profile
        </h2>
    </div>
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Display Information
                </h2>
            </div>
            <div class="p-5">
                <div class="flex flex-col-reverse xl:flex-row flex-col">
                    <form method="POST" class="form-control" action="{{ route('admin.account.update', $account->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="flex-1 mt-6 col xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-5 2xl:col-span-5">
                                        <div>
                                            <label for="name" class="form-label">Name</label>
                                            <input id="name" type="text" class="form-control" placeholder="Kevin" name="name" value="{{ $account->name }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="email" class="form-label">E-Mail</label>
                                            <input id="email" type="email" class="form-control" placeholder="username@lumenlux.uz" name="email" value="{{ $account->email }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="city" class="form-label">City</label>
                                            <input id="city" class="form-control" name="city" value="{{ $account->city }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input id="address" class="form-control" name="address" value="{{ $account->address }}">
                                        </div>
                                        <div class="mt-3"><label>Role</label>
                                            <div class="mt-2">
                                                <select name="role" data-placeholder="Select a role for user" class="tom-select w-full">
                                                    <option value="2" {{($account->role != 1) ? 'selected':''}}>User</option>
                                                    <option value="1" {{($account->role == 1) ? 'selected':''}}>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-5 2xl:col-span-5">
                                        <div class="mt-3 2xl:mt-0">
                                            <label for="lastname" class="form-label">Lastname</label>
                                            <input id="lastname" type="text" class="form-control" placeholder="Spacey" name="lastname" value="{{ $account->lastname }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input id="phone" type="text" class="form-control" placeholder="+998 (__) ___-__-__" name="phone" value="{{ $account->phone }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="state" class="form-label">State</label>
                                            <input id="state" type="text" class="form-control" name="state" value="{{ $account->state }}">
                                        </div>
                                        <div class="mt-3">
                                            <label for="home" class="form-label">House</label>
                                            <input id="home" type="text" class="form-control" name="home" value="{{ $account->home }}">
                                        </div>
                                    </div>
                                    <div class="mx-auto xl:mr-0 col-span-2 xl:ml-6">
                                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img id="file-image" class="rounded-md" alt="Profile picture"
                                                     src="{{ $account->image === 'no_photo.jpg' ? asset($account->image) : asset('storage/' . $account->image) }}">
                                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round" icon-name="x"
                                                         data-lucide="x" class="lucide lucide-x w-4 h-4">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                                <input id="file-upload" name="image" type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <a href="{{ route('admin.account.index') }}" type="button"
                                       class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                                    <button type="submit" class="btn btn-primary w-24">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let profile = document.getElementById("file-image");
        let inputFile = document.getElementById("file-upload");

        inputFile.onchange = function () {
            profile.src = URL.createObjectURL(inputFile.files[0]);
        }
    </script>
@endsection
