<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-xl font-medium mr-auto">
            Настройки калькулятора
        </h2>
    </div>
    
    <h3 class="text-lg font-medium mb-0 mt-5">
        Добавить тип комнаты
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="currentRoomType.title" type="text" class="form-control" placeholder="Название">
                    @error('currentRoomType.title') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentRoomType.description" type="text" class="form-control" placeholder="Описание">
                    @error('currentRoomType.description') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentRoomType.setting_value" type="number" class="form-control" placeholder="Пример: 20">
                    @error('currentRoomType.setting_value') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentRoomType.media" type="text" class="form-control" placeholder="Иконка (fa-stairs)">
                    @error('currentRoomType.media') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <button wire:click.prevent="createNew('currentRoomType')" type="button" class="{{$updating!=0 ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentRoomType')" type="button" class="{{$updating==0 ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
            </div>
        </div>
        <h5 class="m-0 mt-2 p-0 text-sm text-gray-500 col-span-12 text-lg font-bold"><span class="font-bold text-danger">*</span>
             Добавьте типы комнат, которые будут использоваться в калькуляторе. Иконки можно найти 
             <a href="https://fontawesome.com/icons" class="text-blue-500 text-decoration-underline font-bold text-lg bg-blue-800 text-white p-1 rounded-md" target="_blank">здесь</a>.
        </h5>
    </div>
    <h3 class="text-lg font-medium mb-0 mt-5">
        Типы комнат
    </h3>
    <div class="intro-y grid grid-cols-12 gap-3 mt-5">
        @foreach($roomTypes as $roomType)
            <div class="col-span-12 md:col-span-6 box">
                <div class="p-2 text-slate-600 dark:text-slate-500">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 flex-none image-fit mr-5">
                            <i class="fa-solid {{ $roomType->media }} text-5xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium">{{ $roomType->title }}</h3>
                            <span class="text-sm text-gray-500">{{ $roomType->description }}</span>
                        </div>
                        <div>
                            <button wire:click.prevent="edit({{ $roomType->id }})" type="button" class="btn btn-primary text-white">Редактировать</button>
                            <button wire:click.prevent="deleteRoomType({{ $roomType->id }})" type="button" class="btn btn-danger text-white">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
