<form wire:submit="submit" enctype="multipart/form-data">
    <div class="flex flex-col-reverse xl:flex-row flex-col">
        <div class="flex-1 mt-6 xl:mt-0">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 2xl:col-span-6">
                    <div>
                        <label for="subtitle" class="form-label">Sub Title</label>
                        <input id="subtitle" type="text" name="subtitle" class="form-control"
                               placeholder="New SubTitle" wire:model.defer="slider.subtitle">
                        <div class="validation-message">
                            {{ $errors->first('slider.subtitle') }}
                        </div>
                    </div>
                </div>
                <div class="col-span-12 2xl:col-span-6">
                    <div class="form-group invalid">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" type="text" class="form-control"
                               placeholder="New Title" wire:model.defer="slider.title">
                        <div class="validation-message">
                            {{ $errors->first('slider.title') }}
                        </div>
                    </div>
                </div>
                <div class="col-span-12 2xl:col-span-6 mt-4">
                    <div>
                        <label for="href" class="form-label">Href</label>
                        <input id="href" name="href" type="text" class="form-control"
                               placeholder="Redirect Link" wire:model.defer="slider.href">
                        <div class="validation-message">
                            {{ $errors->first('slider.href') }}
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
        </div>
        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
            <div
                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    <img class="rounded-md" alt="Midone - HTML Admin Template"
                         src="{{asset('dist/images/profile-10.jpg')}}" id="profile">
                    <div
                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                        <i data-lucide="x"></i>
                    </div>
                </div>
                <div class="mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                    <input type="file" wire:model="image" name="image" class="w-full h-full  top-0 left-0 absolute opacity-0"
                           id="input-file">
                </div>
            </div>
        </div>
    </div>
</form>
