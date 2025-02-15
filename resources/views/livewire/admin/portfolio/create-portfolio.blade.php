@push('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/upload.css') }}"/>
@endpush

<div>
    <div id="modalBody" class="modal-content p-5"> <!-- BEGIN: Modal Header -->
        <div class="">
            <label for="file">
                Image <b class="text-danger">*</b>
                <div class="border-opacity-10 border mt-3 flex items-center justify-start" style="border-radius: 10px;">
                    @if($image == null)
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             style="bottom:0; left: 0;" stroke-linejoin="round" class="w-10 h-10 fa-arrow-circle-up lucide lucide-upload">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" x2="12" y1="3" y2="15"></line>
                        </svg>
                        <b class="imageLabel">Select image for portfolio</b>
                    @else
                        <div class="w-32 h-32 relative">
                            <img class="w-full h-full" style="object-fit: cover; border-radius: 10px;" src="{{asset('storage/'.$image)}}" alt="">
                            <button wire:click="removeImg" class="z-50 absolute bg-danger rounded-full text-white h-6 w-6 flex justify-center align-center" style="top: -5px; right: -5px">✘</button>
                        </div>
                    @endif
                </div>
            </label>
            <input class="file-input h-0" data-action="#image-id" data-var="image" data-selectable=".imageLabel" onchange="updateFileText(this)" type="file" id="file" placeholder="png, jpg, webp" accept="image/*" required/>
            <input class="d-none" type="hidden" id="image-id"/>
        </div>
        <div>
            <label for="crud-form-1" class="form-label">Title <b class="text-danger">*</b></label>
            <input id="crud-form-1" wire:model="title" type="text" class="form-control w-full" required placeholder="Title">
        </div>
        <div class="mt-3">
            <label for="crud-form-1" class="form-label">Description <b class="text-danger">*</b></label>
            <input id="crud-form-1" wire:model="description" type="text" class="form-control w-full" required
                   placeholder="Description">
        </div>
        <!-- BEGIN: Basic Select -->
        <div class="col-span-6 sm:col-span-6 mt-3 h-[80px] select-container ">
            <label for="post-form-3-tom" class="form-label" id="post-form-3-ts-label">Category
                <b class="text-danger">*</b></label><br>
            <select wire:model="categoryId" data-placeholder="Select categories" class="w-1/2 rounded-md"
                    id="post-form-3-tom"
                    tabindex="-1" required>
                <option value="{{ null }}"></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{$category->id == $categoryId ? 'selected' : ''}}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="gallery">
                Gallery
                <div class="border-opacity-10 border flex-wrap flex items-center justify-start" style="border-radius: 10px;">
                    @if($gallery->isEmpty())
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             style="bottom:0; left: 0;" stroke-linejoin="round" class="w-10 h-10 fa-arrow-circle-up lucide lucide-upload">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" x2="12" y1="3" y2="15"></line>
                        </svg>
                        <b class="imageLabels">Select images for Gallery</b>
                    @else
                        @foreach($gallery as $photos)
                            <div class="w-32 h-32 relative p-1">
                                <img class="w-full h-full" style="object-fit: cover; border-radius: 10px;" src="{{asset('storage/'.$photos['image'])}}" alt="">
                                <button wire:click="removeGal({{$photos['id']}})" class="z-50 absolute bg-danger rounded-full text-white h-6 w-6 flex justify-center align-center" style="top: -5px; right: -5px">✘</button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </label>
            <input multiple class="file-input h-0" data-action="#image-ids" data-var="gallery" data-selectable=".imageLabels" onchange="updateFileText(this)" type="file" id="gallery" placeholder="png, jpg, webp" accept="image/*"/>
            <input class="d-none" type="hidden" id="image-ids"/>
        </div>
        <div class="mt-3" wire:ignore>
            <label for="video">
                Video
                <div class="border-opacity-10 border flex-wrap flex items-center justify-start" style="border-radius: 10px;">
                    <div class="videoUpload flex justify-start items-center">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             style="bottom:0; left: 0;" stroke-linejoin="round" class="w-10 h-10 fa-arrow-circle-up lucide lucide-upload">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" x2="12" y1="3" y2="15"></line>
                        </svg>
                        <b class="imageLabels">Select Video to Upload</b>
                    </div>
                    <div class="videoUploading hidden w-full">
                        <div id="videoProgress" class="bg-blue-800 text-xs h-6 p-2 font-medium text-white text-left p-0.5 leading-none rounded-full">
                            Uploading... <b id="uploadingTxt">0</b>%
                        </div>
                    </div>
                    <div class="uploaded text-success hidden w-full relative">
                        Video uploaded successfully! 🎉
                        <button onclick="removeVid()" id="vidRemove" wire:click="vidRemove" class="rouned btn btn-danger m-2 absolute top-0 right-0">Delete</button>
                        <video id="videoPreview" class="hidden" controls width="500"></video>
                    </div>
                </div>
            </label>
            <input id="video" class="h-0" type="file" accept="video/mp4,video/quicktime">
        </div>
        <div class="mt-3" wire:ignore>
            <label for="text-content" class="form-label">Long Description</label>
            <textarea wire:model="text" id="text-content" class="tinyeditor form-control h-[110px]"
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
    <script>
        document.getElementById("video").addEventListener("change", async (event) => {
            await processAndUpload(event.target.files[0]);
        });

        async function processAndUpload(file) {
            const chunkSize = 2 * 1024 * 1024; // 2MB per chunk
            const totalChunks = Math.ceil(file.size / chunkSize);
            const progressBar = document.getElementById("videoProgress");
            const progressText = document.getElementById("uploadingTxt");
            const videoIn = document.getElementById("video");
            const uploadDiv = document.querySelector(".videoUpload");
            const uploadingDiv = document.querySelector(".videoUploading");
            const uploadedDiv = document.querySelector(".uploaded");
            const videoPreview = document.getElementById("videoPreview");

            uploadDiv.classList.add('hidden');
            uploadingDiv.classList.remove('hidden');
            videoIn.setAttribute('disabled', true);

            let videoPath = null;

            for (let i = 0; i < totalChunks; i++) {
                const start = i * chunkSize;
                const end = Math.min(start + chunkSize, file.size);
                const chunk = file.slice(start, end);

                const formData = new FormData();
                formData.append("video", chunk);
                formData.append("chunkIndex", i);
                formData.append("totalChunks", totalChunks);
                formData.append("fileName", file.name);

                const response = await fetch("/upload-video", { method: "POST", body: formData });
                const tempJson = await response.json();

                if (i === totalChunks - 1) {
                    videoPath = tempJson.video_path;
                }

                // Update progress
                let progress = ((i + 1) / totalChunks) * 100;
                progressBar.style.width = progress + "%";
                progressText.textContent = `${Math.round(progress)}%`;
            }

            if (videoPath) {
                uploadingDiv.classList.add("hidden");
                uploadedDiv.classList.remove("hidden");
                videoPreview.src = videoPath;
                videoPreview.classList.remove("hidden");

                Livewire.emit('video', videoPath);
            }
        }

        document.addEventListener('livewire:load', function () {
            Livewire.on('setUpVid', function(variable) {
                if (variable == null){
                    removeVid();
                }else{
                    const videoIn = document.getElementById("video");
                    const uploadDiv = document.querySelector(".videoUpload");
                    const uploadedDiv = document.querySelector(".uploaded");
                    const videoPreview = document.getElementById("videoPreview");
                    const uploadingDiv = document.querySelector(".videoUploading");

                    uploadedDiv.classList.remove('hidden');
                    videoPreview.classList.remove('hidden');
                    videoPreview.src = variable;
                    uploadDiv.classList.add('hidden');
                    uploadingDiv.classList.add('hidden');
                    videoIn.setAttribute('disabled', true);
                }
            });
            Livewire.on('close', function (){
                document.getElementById('create-modal').click();
            });
        });

        function removeVid(){
            const videoIn = document.getElementById("video");
            const uploadDiv = document.querySelector(".videoUpload");
            const uploadedDiv = document.querySelector(".uploaded");
            const videoPreview = document.getElementById("videoPreview");

            uploadedDiv.classList.add("hidden");
            videoPreview.classList.add("hidden");
            videoPreview.src = null;
            uploadDiv.classList.remove('hidden');
            videoIn.removeAttribute('disabled', true);
        };

        // $('.create-btn, .editPortfolio').on('click', function () {
        //     tinymce.remove('#text-content');
        //     setTimeout(() => {
        //         tinymce.init({
        //             selector: '#text-content',
        //             plugins: 'code table searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount ' +
        //                 'help charmap emoticons autosave',
        //             language: 'ru',
        //             promotion: false,
        //             branding: false,
        //             setup: function (editor) {
        //                 editor.on('keyup change', function () {
        //                     let content = editor.getContent(); // Get content from TinyMCE
        //                     Livewire.emit('updateTextContent', content); // Emit to Livewire
        //                 });
        //             }
        //         });
        //     }, 500);
        // });

        $('#modalBody').on('focusout', function () {
            $('#videoPreview')[0].pause(); // Pause the video
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

                                const maxSize = 2000;
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
                                }, 'image/webp', 0.9); // Adjust quality as needed
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
                    const imageIds = data.image_ids.join(',');
                    Livewire.emit('updValues', imageIds, varName);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
