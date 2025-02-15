<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Portfolios
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button onclick="updateValue('create')" data-tw-toggle="modal" data-tw-target="#create-modal" class="create-btn btn btn-primary shadow-md mr-2">Add New Portfolio</button>
        </div>
    </div>

    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->

        @foreach($portfolios as $portfolio)
            <div id="{{$portfolio->id}}" data-field="{{$portfolio->id}}" class="intro-y col-span-12 md:col-span-6 box">
                <div
                    class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                    <img alt="" class="rounded-t-md" src="{{ asset('storage/' . $portfolio->image) }}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="w-10 h-10 flex-none image-fit">
                            {{--<img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">--}}
                        </div>
                        <div class="ml-3 text-white mr-auto">
                            <div class="text-xs mt-0.5">{{ $portfolio->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"><p class="bg-white/20 px-2 py-1 rounded">{{ $portfolio->category->title }}</p>
                        <p class="block font-medium text-xl mt-3">{{ $portfolio->title }}</p></div>
                </div>
                <div class="p-5 text-slate-600 dark:text-slate-500">
                    {{ $portfolio->description }}
                </div>
                <div class="mb-auto flex items-center justify-around border-t border-slate-200/60 dark:border-darkmode-400">
                    <a href="javascript:;" onclick="updateValue({{$portfolio->id}})" data-tw-toggle="modal" data-tw-target="#create-modal" class="flex p-3 w-1/2 justify-center items-center editPortfolio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" icon-name="edit-2"
                             data-lucide="edit-2" class="lucide lucide-edit-2 w-4 h-4 mr-2">
                            <path d="M17 3a2.828 2.828 0 114 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                        Edit Post </a>
                    <a href="javascript:;" data-tw-toggle="modal"
                       data-tw-target="#delete-confirmation" class="deletion flex justify-center items-center p-3 w-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" icon-name="trash"
                             data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path
                                d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                        </svg>
                        Delete Post </a>
                </div>
            </div>
        @endforeach
        <!-- END: Blog Layout -->

{{--        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center grid grid-cols-12">--}}
{{--            <div class="" style="grid-column: span 8 / span 8;">--}}
{{--                {{ $news->links('vendor.pagination.bootstrap-5') }}--}}
{{--            </div>--}}
{{--            <div class="pagination-count col-span-4 flex justify-end">--}}
{{--                <form action="{{ route('admin.blog.index') }}" method="get">--}}
{{--                    @csrf--}}
{{--                    <label for="perPage">Items per page:</label>--}}
{{--                    <select name="perPage" id="perPage" onchange="this.form.submit()">--}}
{{--                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>--}}
{{--                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>--}}
{{--                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>--}}
{{--                        <!-- Add more options as needed -->--}}
{{--                    </select>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div id="create-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div>
                @livewire('admin.portfolio.create-portfolio')
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

        function updateValue(val){
            Livewire.emit('setToUpdate', val);
        }

        function removeDuplicateModals() {
            let modals = document.querySelectorAll("#delete-confirmation-modal");

            if (modals.length > 1) {
                for (let i = 1; i < modals.length; i++) {
                    modals[i].remove();
                }
            }
        }

        document.querySelectorAll('.deletion').forEach(button => {
            button.addEventListener('click', () => {
                removeDuplicateModals(); // Remove duplicates before showing modal
            });
        });

        $('#updateBtn').on('click', function () {
            tinymce.remove('#text-content');

            tinymce.init({
                selector: '#text-content',
                plugins: 'code table searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount ' +
                    'help charmap emoticons autosave',
                language: 'ru',
                promotion: false,
                branding: false,
                setup: function (editor) {
                    editor.on('keyup change', function () {
                        let content = editor.getContent(); // Get content from TinyMCE
                        Livewire.emit('updateTextContent', content); // Emit to Livewire
                    });
                }
            });
        });

        window.addEventListener('flash-message', event => {
            showFlashMessage(event.detail.type, event.detail.message);
        });

        window.addEventListener('delayed-redirect', function () {
            if (window.onbeforeunload) {
                window.onbeforeunload = null;
            }

            setTimeout(() => {
                window.location.href = "/admin/portfolio"; // Redirect after 1 second
            }, 1000);
        });



        function showFlashMessage(type, message) {
            const container = document.getElementById("flash-message-container");

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
        let id;
        $(document).on('click', '.deletion', function () {
            id = $(this).parents('.intro-y').data('field');
        });
        $(document).on('click', '#delete', function () {
            Livewire.emit('deleted', id);
        });
    </script>
@endpush
