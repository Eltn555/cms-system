@push('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/upload.css') }}"/>
@endpush

<div>
    <div class="modal-content p-5"> <!-- BEGIN: Modal Header -->
        <h2 wire:click="fux" class="text-lg font-medium mr-auto">
            Portfolios {{$tests}}
        </h2>
        <div class="">
            <label for="file">
                Image <b class="text-danger">*</b>
                <div wire:key="image-container" class="border-opacity-10 border mt-3 flex items-center justify-start" style="border-radius: 10px;">
                    @if($image == null)
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             style="bottom:0; left: 0;" stroke-linejoin="round" class="w-10 h-10 fa-arrow-circle-up lucide lucide-upload">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" x2="12" y1="3" y2="15"></line>
                        </svg>
                        <b class="imageLabel">Select image for portfolio</b>
                    @else
                        <div class="w-32 h-32 overflow-hidden relative" style="border-radius: 10px">
                            <img class="w-full h-full" style="object-fit: cover" src="{{asset('storage/'.$image['image'])}}" alt="">
                            <button class="absolute bg-danger rounded-full w-6 h-6 flex justify-center align-center">✘</button>
                        </div>
                    @endif
                </div>
            </label>
            <input name="images" multiple class="file-input h-0" data-action="#image-id" data-var="image" data-selectable=".imageLabel" onchange="updateFileText(this)" type="file" id="file" placeholder="png, jpg, webp" accept="image/*" required/>
            <input class="d-none" type="hidden" id="image-id"/>
        </div>
        <div>
            <label for="crud-form-1" class="form-label">Title <b class="text-danger">*</b></label>
            <input id="crud-form-1" wire:model="title" type="text" name="title" class="form-control w-full" required placeholder="Title">
        </div>
        <div class="mt-3">
            <label for="crud-form-1" class="form-label">Description <b class="text-danger">*</b></label>
            <input id="crud-form-1" wire:model="description" type="text" name="description" class="form-control w-full" required
                   placeholder="Description">
        </div>
        <!-- BEGIN: Basic Select -->
        <div class="col-span-6 mx-2 sm:col-span-6 mt-3 h-[110px]" wire:ignore>
            <label for="post-form-3-tomselected" class="form-label" id="post-form-3-ts-label">Category
                <b class="text-danger">*</b></label>
            <select data-placeholder="Select categories" class="tom-select w-full tomselected"
                    id="post-form-3" name="category[]"
                    tabindex="-1" hidden="hidden" wire:model="category" required>
                <option value="{{ null }}"></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3" wire:ignore>
            <label for="text-content" class="form-label">Long Description</label>
            <textarea wire:model="text" id="text-content" class="tinyeditor form-control h-[110px]" name="text"
                      placeholder="Text">

                        </textarea>
        </div>
        <div class="text-right mt-5">
            <a class="btn btn-outline-secondary w-24 mr-1" onClick="document.getElementById('create-modal').click();">Cancel</a>
            <button wire:click="submit()" class="btn btn-primary w-24">Save</button>
        </div>
    </div>
</div>

@push('scripts')
{{--    <script type="text/javascript" src="{{ asset('dist/js/upload.js') }}"></script>--}}
    <script type="text/javascript">
        $('.create-btn').on('click', function () {
            tinymce.remove('#text-content');

            tinymce.init({
                selector: '#text-content',
                plugins: 'code table searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount ' +
                    'help charmap emoticons autosave',
                language: 'ru',
                promotion: false,
                branding: false
            });
        });


        function updateFileText(input) {
            const fileInput = input;
            const fileText = input.dataset.selectable;
            const varName = input.dataset.var;
            const fileTextSpan = document.querySelector(fileText);
            const files = fileInput.files;
            const resizedFiles = [];

            if (files && files.length > 0) {
                Array.from(files).forEach((file) => {
                    if (file.type.startsWith('image/')) {
                        // Declare reader within the loop to ensure it's scoped properly
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = new Image();
                            img.onload = function () {
                                const canvas = document.createElement('canvas');
                                const ctx = canvas.getContext('2d');

                                const maxSize = 1000;
                                let width = img.width;
                                let height = img.height;

                                if (width > height) {
                                    if (width > maxSize) {
                                        height *= maxSize / width;
                                        width = maxSize;
                                    }
                                } else {
                                    if (height > maxSize) {
                                        width *= maxSize / height;
                                        height = maxSize;
                                    }
                                }

                                canvas.width = width;
                                canvas.height = height;
                                ctx.drawImage(img, 0, 0, width, height);

                                // Convert canvas to WebP
                                canvas.toBlob((blob) => {
                                    const resizedFile = new File([blob], file.name.replace(/\.[^/.]+$/, ".webp"), { type: 'image/webp' });
                                    resizedFiles.push(resizedFile);

                                    // Once all files are resized, you can send them to the backend
                                    if (resizedFiles.length === files.length) {
                                        uploadFiles(resizedFiles, varName); // Your custom upload function
                                    }
                                    fileTextSpan.textContent = `${files.length} file(s) ready (compressed)`;
                                }, 'image/webp', 0.5); // Adjust quality as needed
                            };
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file); // Start reading the file
                    }
                });
            }
        }

        function uploadFiles(files, varName) {
            const formData = new FormData();
            files.forEach(file => formData.append('images[]', file));

            fetch('/upload-images', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Uploaded image IDs:', data.image_ids);
                    // Save IDs to a hidden input field or Livewire component
                    const imageIds = data.image_ids.join(',');
                    Livewire.emit('updValues', imageIds, varName);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
