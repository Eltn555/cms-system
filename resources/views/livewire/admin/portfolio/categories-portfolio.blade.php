<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Portfolio category <br><b class="text-danger">* Udalit qilingan categoriya ichidigi elementlari bilan o'chib ketadi</b>
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Title</th>
                    <th class="whitespace-nowrap">Description</th>
                    <th class="whitespace-nowrap">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="intro-x">
                    <td class="" data-field="title" data-action="read" data-selectable="title" style="min-width: 200px">
                        <input wire:model="title" type="text" name="title" class="form-control w-full" required placeholder="Title">
                    </td>
                    <td class="" data-field="description" data-action="read" data-selectable="description" style="min-width: 300px">
                        <input wire:model="description" type="text" name="title" class="form-control w-full" placeholder="Description">
                    </td>
                    <td class="table-report__action w-32">
                        <a wire:click="create" class="rouned btn btn-success text-white m-2">Create</a>
                    </td>
                </tr>
                @foreach($categories as $category)
                    <tr id="{{$category->id}}" class="intro-x" data-action="{{$category->id}}">
                        <td class="editablee" data-field="title" data-action="read" data-selectable="title" style="min-width: 200px">
                            <a href="javascript:;" class="font-medium whitespace-nowrap">{{ $category->title }}</a>
                            <input type="text" class="form-control relative hidden" value="{{$category->title}}">
                        </td>
                        <td class="editablee" data-field="description" data-action="read" data-selectable="description" style="min-width: 300px">
                            <a href="javascript:;" class="font-medium whitespace-nowrap">{{ $category->description }}</a>
                            <input type="text" class="form-control relative hidden" value="{{$category->description}}">
                        </td>
                        <td class="table-report__action w-32">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-danger deletion" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="flash-message" class="fixed z-100 space-y-2" style="top: 100px; right: 15px"></div>
</div>

@push('scripts')
    <script>
        window.addEventListener('flash-message', event => {
            showFlashMessage(event.detail.type, event.detail.message);
        });

        function showFlashMessage(type, message) {
            const container = document.getElementById("flash-message");

            // Create message div
            const messageDiv = document.createElement("div");
            messageDiv.classList.add(
                "px-6", "py-4", "rounded-lg", "shadow-md", "flex", "items-center", "space-x-3", "opacity-100", "transition-opacity", "duration-500"
            );

            // Add colors based on type
            if (type === "success") {
                messageDiv.classList.add("bg-success", "text-white");
                messageDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
            <span>${message}</span>
            <button onclick="this.parentElement.remove()" class="text-white font-bold ml-4">×</button>
        `;
            } else if (type === "error") {
                messageDiv.classList.add("bg-red-500", "text-white");
                messageDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
            <span>${message}</span>
            <button onclick="this.parentElement.remove()" class="text-white font-bold ml-4">×</button>
        `;
            }

            // Append to container
            container.appendChild(messageDiv);

            // Auto-hide after 4 seconds
            setTimeout(() => {
                messageDiv.classList.add("opacity-0");
                setTimeout(() => messageDiv.remove(), 500);
            }, 3000);
        }

        $('.editablee').on('dblclick', function () {
            if ($(this).data('action') === 'read') {
                $(this).children('a').addClass('hidden');
                $(this).children('.relative').removeClass('hidden');
                $(this).children('input').focus();
                $(this).data('action', 'write');
            }
        });
        $(document).on('blur', '.editablee input', function () {
            var $editable = $(this).parent('.editablee');
            $editable.data('action', 'read');
            var field = $(this).parents('.editablee').data('field');
            var id = $(this).parents('.intro-x').data('action');
            var newValue = $(this).val();
            $(this).parents('.editablee').children('a').removeClass('hidden');
            $(this).parents('.editablee').children('.relative').addClass('hidden');
            Livewire.emit('update', field, id, newValue);
        });
        let id;
        $(document).on('click', '.deletion', function () {
            id = $(this).parents('.intro-x').data('action');
        });
        $(document).on('click', '#delete', function () {
            Livewire.emit('deletee', id);
        });
    </script>
@endpush
