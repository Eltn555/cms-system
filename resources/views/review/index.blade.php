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
    <livewire:admin.review.reviews/>

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
@endsection

@section('script')
    <script type="text/javascript">
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
            });
            $(document).on('click', '.deletion', function () {
                id = $(this).parents('.intro-x').data('action');
            });
            $(document).on('click', '#delete', function () {
                Livewire.emit('deleteReview', id);
            });
        });
    </script>
@endsection
