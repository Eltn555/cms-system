@push('styles')
    <style>
        .flash-message{
            top: 100px;
            right: 10px;
            opacity: 1;
            transition: 0.2s;
            position: fixed !important;
        }
        .hiddenmsg{
            right: -500px;
            opacity: 0;
            transition: 1s;
            position: fixed;
        }
        .file-input{
            display: inline-block;
            padding-top: 50px !important;
            padding-bottom: 0 !important;
            -webkit-box-sizing: border-box !important;
            -moz-box-sizing: border-box !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
            height: 50px !important;
        }
        .file-text{
            left: 20px;
            top: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #757575;
        }
        .icon-input {
            top: 0;
            right: 0;
            padding: 12px 15px;
        }
    </style>
@endpush
<div class="container bg-light">
    <div class="row">
        <div class="col-lg-7 col-md-12 p-3 p-md-5 pe-1">
            <div class="pt-5 ps-1 ps-md-5">
                <div class="d-flex position-relative">
                    <h5  class="shadow-text-1 font-cormorant fw-bold form-headline">Не можете найти нужную люстру?</h5>
                    <h5  class="shadow-text-2 font-cormorant fw-bold form-headline">Не можете найти нужную люстру?</h5>
                </div>
            </div>
            <div class="p-1 p-md-5 pt-2">
                <p class="font-kyiv fs-5 form-info">
                    Загрузите изображение понравившейся люстры и введите свои данные и мы обязательно с вами свяжемся.
                </p>
            </div>

        </div>
        <div class="col-lg-5 col-md-12">
            <div class="w-100">
                <div class="myaccount-content font-kyiv border-0">
                    <div class="account-details-form">
                        <form action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-input-item">
                                        <label for="first-name" class="required">Имя</label>
                                        <div class="position-relative">
                                            <input name="name" type="text" id="first-name" wire:model="name" placeholder="Ваше имя" required/>
                                            <div class="position-absolute icon-input">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1334_4361)">
                                                        <circle cx="10" cy="7.5" r="2.5" stroke="#8C8C8C"
                                                                stroke-width="1.5"/>
                                                        <circle cx="9.99935" cy="9.99996" r="8.33333"
                                                                stroke="#8C8C8C" stroke-width="1.5"/>
                                                        <path
                                                            d="M14.974 16.6667C14.8414 14.2571 14.1037 12.5 9.99971 12.5C5.89576 12.5 5.15801 14.2571 5.02539 16.6667"
                                                            stroke="#8C8C8C" stroke-width="1.5"
                                                            stroke-linecap="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1334_4361">
                                                            <rect width="20" height="20" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-item">
                                        <label for="display-name" class="required">Номер телефона</label>
                                        <div class="position-relative">
                                            <input name="phone" wire:model="phone" type="phone" id="display-name" placeholder="+998 555 005 444" required/>
                                            <div class="position-absolute icon-input">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.834 2.5C10.834 2.5 12.6673 2.66667 15.0007 5C17.334 7.33333 17.5007 9.16667 17.5007 9.16667"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                    <path
                                                        d="M11.0059 5.44641C11.0059 5.44641 11.8308 5.68211 13.0683 6.91955C14.3057 8.15699 14.5414 8.98194 14.5414 8.98194"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                    <path
                                                        d="M7.53132 5.26344L8.07217 6.23254C8.56025 7.10711 8.36432 8.25439 7.59559 9.02312C7.59559 9.02313 7.59559 9.02313 7.59559 9.02313C7.59548 9.02324 6.66325 9.95568 8.35376 11.6462C10.0436 13.3361 10.976 12.4052 10.9768 12.4044C10.9769 12.4043 10.9768 12.4044 10.9769 12.4043C11.7456 11.6356 12.8929 11.4397 13.7674 11.9278L14.7365 12.4686C16.0571 13.2056 16.2131 15.0577 15.0523 16.2185C14.3548 16.916 13.5003 17.4587 12.5558 17.4945C10.9656 17.5548 8.26523 17.1524 5.55642 14.4435C2.84761 11.7347 2.44518 9.03431 2.50546 7.4442C2.54127 6.49963 3.084 5.64516 3.7815 4.94765C4.9423 3.78686 6.79431 3.94282 7.53132 5.26344Z"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-item">
                                        <label for="msg" class="">Ваш комментарий </label>
                                        <div class="position-relative">
                                            <input name="msg" wire:model="msg" type="text" id="msg" placeholder="Ваш комментарий..."/>
                                            <div class="position-absolute icon-input">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.834 2.5C10.834 2.5 12.6673 2.66667 15.0007 5C17.334 7.33333 17.5007 9.16667 17.5007 9.16667"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                    <path
                                                        d="M11.0059 5.44641C11.0059 5.44641 11.8308 5.68211 13.0683 6.91955C14.3057 8.15699 14.5414 8.98194 14.5414 8.98194"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                    <path
                                                        d="M7.53132 5.26344L8.07217 6.23254C8.56025 7.10711 8.36432 8.25439 7.59559 9.02312C7.59559 9.02313 7.59559 9.02313 7.59559 9.02313C7.59548 9.02324 6.66325 9.95568 8.35376 11.6462C10.0436 13.3361 10.976 12.4052 10.9768 12.4044C10.9769 12.4043 10.9768 12.4044 10.9769 12.4043C11.7456 11.6356 12.8929 11.4397 13.7674 11.9278L14.7365 12.4686C16.0571 13.2056 16.2131 15.0577 15.0523 16.2185C14.3548 16.916 13.5003 17.4587 12.5558 17.4945C10.9656 17.5548 8.26523 17.1524 5.55642 14.4435C2.84761 11.7347 2.44518 9.03431 2.50546 7.4442C2.54127 6.49963 3.084 5.64516 3.7815 4.94765C4.9423 3.78686 6.79431 3.94282 7.53132 5.26344Z"
                                                        stroke="#8C8C8C" stroke-width="1.5"
                                                        stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-item" wire:ignore>
                                        <label for="file" class="required">Загрузите изображение</label>
                                        <div class="position-relative">
                                            <input name="images" class="file-input" onchange="updateFileText(this)" multiple type="file" id="file" placeholder="png, jpg, webp" accept="image/*"/>
                                            <input class="d-none" type="hidden" id="image-ids" wire:model="imageIds"/>
                                            <span class="file-text position-absolute">png, jpg, webp</span>
                                            <div class="position-absolute icon-input">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.2787 13.6755L14.9307 8.12869C14.1355 6.24688 12.6726 6.171 11.6899 7.96176L10.2721 10.5493C9.55193 11.862 8.20913 11.9758 7.27892 10.7997L7.11388 10.5872C6.14616 9.35794 4.78085 9.5097 4.08319 10.9135L2.79289 13.5313C1.88518 15.3524 3.19798 17.4998 5.20844 17.4998H14.7806C16.7311 17.4998 18.0439 15.489 17.2787 13.6755Z" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.24984 6.66667C7.40043 6.66667 8.33317 5.73393 8.33317 4.58333C8.33317 3.43274 7.40043 2.5 6.24984 2.5C5.09924 2.5 4.1665 3.43274 4.1665 4.58333C4.1665 5.73393 5.09924 6.66667 6.24984 6.66667Z" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item btn-hover w-100">
                                <button type="button" wire:click="submitForm()" class="py-3 check-btn sqr-btn w-100 fw-bolder">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hiddenmsg bg-success flash-message position-absolute text-white px-4 py-2 rounded shadow fs-4">
                    {{ $flashMessage }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function updateFileText(input) {
            const fileInput = input;
            const fileTextSpan = document.querySelector('.file-text');
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
                                        uploadFiles(resizedFiles); // Your custom upload function
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

        function uploadFiles(files) {
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
                    const hiddenInput = document.querySelector('#image-ids');
                    const imageIds = data.image_ids.join(',');
                    hiddenInput.value = imageIds;
                    Livewire.emit('updateImageIds', imageIds);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
