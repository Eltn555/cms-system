@extends('front.master')
@section('content')
    <div>
        @livewire('category')
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        // Changing Title

        function changeTitle(id) {
            console.log(id)
            $.ajax({
                url: '{{ route('front.category.search') }}',
                method: 'GET',
                encode: true,
                data: {
                    id: id,
                },
                success: function (response) {
                    $('#main-title').html(response.title)
                    $('#product-list').html(response.productsList)
                    console.log(response.productsList);
                },
                error: function (error) {
                    console.error('Update failed:', error);
                }
            });

        }

    </script>

@endsection
