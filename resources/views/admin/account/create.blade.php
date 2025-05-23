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
                        <form method="POST" class="form-control" action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="flex-1 mt-6 col xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-5 2xl:col-span-5">
                                        <div>
                                            <label for="update-profile-form-1" class="form-label">Name</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                   placeholder="Kevin" name="name">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-1" class="form-label">E-Mail</label>
                                            <input id="update-profile-form-1" type="email" class="form-control"
                                                   placeholder="username@lumenlux.uz" name="email">
                                        </div>
                                        <div class="mt-3"> <label>City</label>
                                            <div class="mt-2">
                                                <select data-placeholder="Select your city" class="tom-select w-full" name="city">
                                                    <option value="tashkent">Ташкент</option>
                                                    <option value="tashkentobl">Ташкентская область</option>
                                                    <option value="samarkand">Самарканд</option>
                                                    <option value="nukus">Нукус</option>
                                                    <option value="andijon">Андижон</option>
                                                    <option value="namangan">Наманган</option>
                                                    <option value="fergana">Фергана</option>
                                                    <option value="karshi">Карши</option>
                                                    <option value="termez">Термез</option>
                                                    <option value="bukhoro">Бухара</option>
                                                    <option value="jizzax">Джизак</option>
                                                    <option value="navoi">Навои</option>
                                                    <option value="urganch">Ургенч</option>
                                                    <option value="guliston">Гулистан</option>
                                                    <option value="nurafshon">Нурафшон</option>
                                                    <option value="syrdarya">Сырдарьинская область</option>
                                                </select> </div>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Address</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                   placeholder="12 kvartal" name="address">
                                        </div>
                                    </div>
                                    <div class="col-span-5 2xl:col-span-5">
                                        <div class="mt-3 2xl:mt-0">
                                            <label for="update-profile-form-1" class="form-label">Lastname</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                   placeholder="Spacey" name="lastname">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                   placeholder="+998 (__) ___-__-__" name="phone">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">State</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                   placeholder="Yunusobod" name="state">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Home</label>
                                            <input id="update-profile-form-4" type="text" class="form-control"
                                                   placeholder="40" name="home">
                                        </div>
                                    </div>
                                    <div class="mx-auto xl:mr-0 col-span-2 xl:ml-6">
                                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img id="file-image" class="rounded-md" alt="Profile picture" src="">
                                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                                <input id="file-upload" name="image" type="file"
                                                       class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Display Information -->
            <!-- BEGIN: Personal Information -->
            {{--<div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Personal Information
                    </h2>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label for="update-profile-form-6" class="form-label">Email</label>
                                <input id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" value="kevinspacey@left4code.com" disabled="">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-7" class="form-label">Name</label>
                                <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" value="Kevin Spacey" disabled="">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-8" class="form-label">ID Type</label>
                                <select id="update-profile-form-8" class="form-select">
                                    <option>IC</option>
                                    <option>FIN</option>
                                    <option>Passport</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-9" class="form-label">ID Number</label>
                                <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" value="357821204950001">
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-6">
                            <div class="mt-3 xl:mt-0">
                                <label for="update-profile-form-10" class="form-label">Phone Number</label>
                                <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" value="65570828">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-11" class="form-label">Address</label>
                                <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-12-tomselected" class="form-label" id="update-profile-form-12-ts-label">Bank Name</label>
                                <select id="update-profile-form-12" data-search="true" class="tom-select w-full tomselected" tabindex="-1" hidden="hidden"><option value="1" selected="true">SBI - STATE BANK OF INDIA</option>

                                    <option value="1">CITI BANK - CITI BANK</option>
                                </select><div class="ts-control tom-select w-full single plugin-dropdown_input" tabindex="0"><div class="items ts-input full has-items"><div data-value="1" class="item">SBI - STATE BANK OF INDIA</div></div><div class="ts-dropdown single tom-select w-full plugin-dropdown_input" style="display: none;"><div class="dropdown-input-wrap"><input type="select-one" autocomplete="off" class="dropdown-input" role="combobox" haspopup="listbox" aria-expanded="false" aria-controls="update-profile-form-12-ts-dropdown" id="update-profile-form-12-tomselected"></div><div role="listbox" id="update-profile-form-12-ts-dropdown" tabindex="-1" class="ts-dropdown-content" aria-labelledby="update-profile-form-12-ts-label"></div></div></div>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-13" class="form-label">Bank Account</label>
                                <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" value="DBS Current 011-903573-0">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                        <a href="" class="text-danger flex items-center"> <i class="fa-solid fa-trash-can"></i> Delete Account </a>
                    </div>
                </div>
            </div>--}}
            <!-- END: Personal Information -->
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
