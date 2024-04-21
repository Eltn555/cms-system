@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Создать новую категорию блога
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form action="{{ route('admin.blog.categories.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="crud-form-1" class="form-label">Название категория</label>
                        <input id="crud-form-1" type="text" name="title" class="form-control w-full"
                               placeholder="New category">
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1">Назад</button>
                        <button type="submit" class="btn btn-primary w-24">Сохранить</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
