<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-xl font-medium mr-auto">
            Настройки калькулятора
        </h2>
    </div>
    <h3 class="text-lg font-medium mb-0 mt-5">
        Типы комнат
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="newRoomType.title" type="text" class="form-control" placeholder="Название">
                    @error('newRoomType.title') <p class="text-sm text-danger">{{ $message }}dwdw</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="newRoomType.description" type="text" class="form-control" placeholder="Описание">
                    @error('newRoomType.description') <p class="text-sm text-danger">{{ $message }}dwd</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="newRoomType.setting_value" type="text" class="form-control" placeholder="Настройки">
                    @error('newRoomType.setting_value') <p class="text-sm text-danger">{{ $message }}dwd</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="newRoomType.media" type="text" class="form-control" placeholder="Иконка (fa-stairs)">
                    @error('newRoomType.media') <p class="text-sm text-danger">{{ $message }}dwd</p> @enderror
                </div>
                <button wire:click.prevent="createNew('newRoomType')" type="button" class="btn btn-primary">Добавить</button>
            </div>
        </div>
        <h5 class="m-0 mt-2 p-0 text-sm text-gray-500 col-span-12 text-lg font-bold"><span class="font-bold text-danger">*</span>
             Добавьте типы комнат, которые будут использоваться в калькуляторе. Иконки можно найти 
             <a href="https://fontawesome.com/icons" class="text-blue-500 text-decoration-underline font-bold text-lg bg-blue-800 text-white p-1 rounded-md" target="_blank">здесь</a>.
        </h5>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 md:col-span-6 box">
            <div class="p-2 text-slate-600 dark:text-slate-500">
                <div class="flex items-center">
                    <div class="w-10 h-10 flex-none image-fit mr-5">
                        <i class="fa-solid fa-stairs text-5xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">20 - Люкс</h3>
                        <span class="text-sm text-gray-500">Лестница, падвал</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
