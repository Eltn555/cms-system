@push('styles')
    <style>
        .btn-danger {
            background: linear-gradient(to right, hsl(0, 100%, 67%), #c51e00) !important;
            transition: background 0.5s ease;
        }
        .btn-danger:hover {
            background: linear-gradient(to right, #c51e00, #c51e00) !important;
        }
        .btn-primary {
            background: linear-gradient(to right, hsl(210, 69%, 30%), #001641) !important;
            transition: background 0.5s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, hsl(210, 100%, 22%), hsl(210, 100%, 22%)) !important;
        }
    </style>
@endpush

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
                <button wire:click.prevent="createNew('currentRoomType')" type="button" class="{{$updating['var']=='currentRoomType' ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentRoomType')" type="button" class="{{$updating['var']!='currentRoomType' ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
                <button wire:click.prevent="edit({{ $updating['id'] }}, 'currentRoomType')" type="button" class="btn btn-danger text-white {{ $updating['var']!='currentRoomType' ? 'hidden' : '' }}" style="align-self: flex-start;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
        <h5 class="m-0 mt-2 p-0 text-sm text-gray-500 col-span-12 text-lg font-bold"><span class="font-bold text-danger">*</span>
             Добавьте типы комнат, которые будут использоваться в калькуляторе. Иконки можно найти 
             <a href="https://fontawesome.com/icons" class="text-blue-500 text-decoration-underline font-bold text-lg bg-blue-800 text-white p-1 rounded-md" target="_blank">здесь</a>.
        </h5>
        <div class="col-span-12">
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
                                <span class="text-sm text-gray-500">{{ $roomType->description." = ".$roomType->setting_value." lux" }}</span>
                            </div>
                            <div>
                                <button wire:click.prevent="edit({{ $roomType->id }}, 'currentRoomType')" type="button" class="btn btn-primary text-white">{{ $updating['id']==$roomType->id ? 'Отменить ' : '' }}<i class="ml-2 fa-solid fa-{{ $updating['id']==$roomType->id ? 'x' : 'pencil' }}"></i></button>
                                <button wire:click.prevent="deleteRoomType({{ $roomType->id }})" type="button" class="btn btn-danger text-white"><i class="ml-2 fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- line -->
    <hr class="my-5">
    
    <!-- Spot types -->
    <h3 class="text-lg font-medium mb-0 mt-5">
        Добавить тип спота
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="currentSpotType.title" type="text" class="form-control" placeholder="Название">
                    @error('currentSpotType.title') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <select wire:model="currentSpotType.setting_value" class="form-control" placeholder="категория">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('currentSpotType.setting_value') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col justify-center items-center">
                    <input id="currentSpotType.media" wire:model="currentSpotType.media" type="file" accept="image/*" class="form-control bg-white h-full">
                    @error('currentSpotType.media') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <button wire:click.prevent="createNew('currentSpotType')" type="button" class="{{$updating['var']=='currentSpotType' ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentSpotType')" type="button" class="{{$updating['var']!='currentSpotType' ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
                <button wire:click.prevent="edit({{ $updating['id'] }}, 'currentSpotType')" type="button" class="btn btn-danger text-white {{ $updating['var']!='currentSpotType' ? 'hidden' : '' }}" style="align-self: flex-start;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
        <h5 class="m-0 mt-2 p-0 text-sm text-gray-500 col-span-12 text-lg font-bold"><span class="font-bold text-danger">*</span>
             Добавьте типы спотов, которые будут использоваться в калькуляторе.
        </h5>
        <div class="col-span-12">
            <h3 class="text-lg font-medium mb-0 mt-5">
                Типы спотов
            </h3>
            <div class="intro-y grid grid-cols-12 gap-3 mt-5">
                @foreach($spotTypes as $spotType)
                    <div class="col-span-12 md:col-span-6 box">
                        <div class="p-2 text-slate-600 dark:text-slate-500">
                            <div class="flex items-center justify-between">
                                <div style="margin: -10px 0" class="h-20 w-20 flex-none image-fit mr-5">
                                    <img src="{{ asset('storage/'.$spotType->media) }}" alt="{{ $spotType->title }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium">{{ $spotType->title }}</h3>
                                    <span class="text-sm text-gray-500">Категория: {{ $categories->find($spotType->setting_value)->title }}</span>
                                </div>
                                <div>
                                    <button wire:click.prevent="edit({{ $spotType->id }}, 'currentSpotType')" type="button" class="btn btn-primary text-white">{{ $updating['id']==$spotType->id ? 'Отменить ' : '' }}<i class="ml-2 fa-solid fa-{{ $updating['id']==$spotType->id ? 'x' : 'pencil' }}"></i></button>
                                    <button wire:click.prevent="deleteSpotType({{ $spotType->id }})" type="button" class="btn btn-danger text-white"><i class="ml-2 fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Spot locations -->
    <hr class="my-5">
    <h3 class="text-lg font-medium mb-0 mt-5">
        Добавить тип расположения спота
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="currentSpotLocation.title" type="text" class="form-control" placeholder="Название">
                    @error('currentSpotLocation.title') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <select wire:model="currentSpotLocation.setting_value" class="form-control" placeholder="категория">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('currentSpotLocation.setting_value') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col justify-center items-center">
                    <input id="currentSpotLocation.media" wire:model="currentSpotLocation.media" type="file" accept="image/*" class="form-control bg-white h-full">
                    @error('currentSpotLocation.media') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <button wire:click.prevent="createNew('currentSpotLocation')" type="button" class="{{$updating['var']=='currentSpotLocation' ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentSpotLocation')" type="button" class="{{$updating['var']!='currentSpotLocation' ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
                <button wire:click.prevent="edit({{ $updating['id'] }}, 'currentSpotLocation')" type="button" class="btn btn-danger text-white {{ $updating['var']!='currentSpotLocation' ? 'hidden' : '' }}" style="align-self: flex-start;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
        <h5 class="m-0 mt-2 p-0 text-sm text-gray-500 col-span-12 text-lg font-bold"><span class="font-bold text-danger">*</span>
             Добавьте типы расположения спотов, которые будут использоваться в калькуляторе.
        </h5>
        <div class="col-span-12">
            <h3 class="text-lg font-medium mb-0 mt-5">
                Типы расположения спотов
            </h3>
            <div class="intro-y grid grid-cols-12 gap-3 mt-5">
                @foreach($spotLocations as $spotLocation)
                    <div class="col-span-12 md:col-span-6 box">
                        <div class="p-2 text-slate-600 dark:text-slate-500">
                            <div class="flex items-center justify-between">
                                <div style="margin: -10px 0" class="h-20 w-20 flex-none image-fit mr-5">
                                    <img src="{{ asset('storage/'.$spotLocation->media) }}" alt="{{ $spotLocation->title }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium">{{ $spotLocation->title }}</h3>
                                    <span class="text-sm text-gray-500">Категория: {{ $categories->find($spotLocation->setting_value)->title }}</span>
                                </div>
                                <div>
                                    <button wire:click.prevent="edit({{ $spotLocation->id }}, 'currentSpotLocation')" type="button" class="btn btn-primary text-white">{{ $updating['id']==$spotLocation->id ? 'Отменить ' : '' }}<i class="ml-2 fa-solid fa-{{ $updating['id']==$spotLocation->id ? 'x' : 'pencil' }}"></i></button>
                                    <button wire:click.prevent="deleteSpotLocation({{ $spotLocation->id }})" type="button" class="btn btn-danger text-white"><i class="ml-2 fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
