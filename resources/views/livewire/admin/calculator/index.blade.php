@push('styles')
    <style>
        button.bg-white{
            width: 40px;
            height: 40px;
            transition: all 0.6s ease;
        }
        button.text-primary:hover{
            background-color: #001641 !important;
            color: #fff !important;
        }
        button.text-danger:hover{
            background-color: #c51e00 !important;
            color: #fff !important;
        }
        .delete-modal{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .delete{
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .delete-modal.hidden{
            display: none;
        }
        div:has(input[type="file"]){
            align-self: flex-start;
        }
        input[type="file"]{
            padding: 8.5px;
            box-shadow: 0 0 0 1px #e0e0e0;
        }
        input[type="file"]::-webkit-file-upload-button{
            display: none;
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
                                <button wire:click.prevent="edit({{ $roomType->id }}, 'currentRoomType')" type="button" class="btn bg-white shadow-lg rounded-full text-primary py-3 px-4">{{ $updating['id']==$roomType->id ? 'Отменить ' : '' }}<i class="fa-solid fa-{{ $updating['id']==$roomType->id ? 'x' : 'pencil' }}"></i></button>
                                <button wire:click.prevent="delete({{ $roomType->id }})" type="button" class="btn bg-white shadow-lg rounded-full text-danger py-3 px-4"><i class="fa-solid fa-trash"></i></button>
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
    <!-- Add parent spot category to show all spots -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию спотов по умолчанию
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allSpotCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allSpotCategory.setting_value" wire:change="updateCategories('allSpotCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allSpotCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию спотов, которые будут использоваться в калькуляторе по умолчанию. Если тип спота не выбран, будут показаны все споты.</p>
    </div>

    <!-- line -->
    <hr class="my-5">

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
                                    <span class="text-sm text-gray-500">Категория: {{ $categories->find($spotLocation->setting_value)->title ?? 'Удалено' }}</span>
                                </div>
                                <div>
                                    <button wire:click.prevent="edit({{ $spotLocation->id }}, 'currentSpotLocation')" type="button" class="btn bg-white shadow-lg rounded-full text-primary py-3 px-4">{{ $updating['id']==$spotLocation->id ? 'Отменить ' : '' }}<i class="fa-solid fa-{{ $updating['id']==$spotLocation->id ? 'x' : 'pencil' }}"></i></button>
                                    <button wire:click.prevent="delete({{ $spotLocation->id }})" type="button" class="btn bg-white shadow-lg rounded-full text-danger py-3 px-4"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr class="my-5">
    <!-- Add parent led category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию ленты по умолчанию
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allLedCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allLedCategory.setting_value" wire:change="updateCategories('allLedCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allLedCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию лент, которые будут использоваться в калькуляторе по умолчанию. Если тип ленты не выбран, будут показаны все ленты.</p>
    </div>

    <!-- Add parent power block category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию блока питания по умолчанию для лент
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allPowerBlockCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allPowerBlockCategory.setting_value" wire:change="updateCategories('allPowerBlockCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allPowerBlockCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию блоков питания, которые будут использоваться в калькуляторе по умолчанию. Если тип блока питания не выбран, будут показаны все блоки питания.</p>
    </div>

    <!-- Add parent led accessory category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию аксессуаров ленты по умолчанию для лент
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allLedAccessoryCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allLedAccessoryCategory.setting_value" wire:change="updateCategories('allLedAccessoryCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allLedAccessoryCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию аксессуаров ленты, которые будут использоваться в калькуляторе по умолчанию. Если тип аксессуара не выбран, будут показаны все аксессуары.</p>
    </div>

    <!-- line -->
    <hr class="my-5">

    <!-- Led kelvin and room type -->
    <h3 class="text-lg font-medium mb-0 mt-5">
        Добавить тип комнаты и температуру
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="currentLedRoom.title" type="text" class="form-control" placeholder="Название">
                    @error('currentLedRoom.title') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentLedRoom.description" type="text" class="form-control" placeholder="Описание">
                    @error('currentLedRoom.description') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentLedRoom.setting_value" type="number" class="form-control" placeholder="Пример: 20">
                    @error('currentLedRoom.setting_value') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentLedRoom.media" type="file" accept="image/*" class="form-control bg-white h-full">
                    @error('currentLedRoom.media') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <button wire:click.prevent="createNew('currentLedRoom')" type="button" class="{{$updating['var']=='currentLedRoom' ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentLedRoom')" type="button" class="{{$updating['var']!='currentLedRoom' ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
                <button wire:click.prevent="edit({{ $updating['id'] }}, 'currentLedRoom')" type="button" class="btn btn-danger text-white {{ $updating['var']!='currentLedRoom' ? 'hidden' : '' }}" style="align-self: flex-start;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
        <div class="col-span-12">
            <h3 class="text-lg font-medium mb-0 mt-5">
                Типы комнат и температуры
            </h3>
            <div class="intro-y grid grid-cols-12 gap-3 mt-5">
            @foreach($ledRooms as $ledRoom)
                <div class="col-span-12 md:col-span-6 box">
                    <div class="p-2 text-slate-600 dark:text-slate-500">
                        <div class="flex items-center justify-between">
                            <div class="w-20 h-20 flex-none image-fit mr-5">
                                <img src="{{ asset('storage/'.$ledRoom->media) }}" alt="{{ $ledRoom->title }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-lg font-medium">{{ $ledRoom->title }}</h3>
                                <span class="text-sm text-gray-500">{{ $ledRoom->description." - ".$ledRoom->setting_value." K" }}</span>
                            </div>
                            <div>
                                <button wire:click.prevent="edit({{ $ledRoom->id }}, 'currentLedRoom')" type="button" class="btn bg-white shadow-lg rounded-full text-primary py-3 px-4">{{ $updating['id']==$ledRoom->id ? 'Отменить ' : '' }}<i class="fa-solid fa-{{ $updating['id']==$ledRoom->id ? 'x' : 'pencil' }}"></i></button>
                                <button wire:click.prevent="delete({{ $ledRoom->id }})" type="button" class="btn bg-white shadow-lg rounded-full text-danger py-3 px-4"><i class="fa-solid fa-trash"></i></button>
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

    <!-- Add parent magnet reel category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию магнитных роликов по умолчанию
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allMagnetReelCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allMagnetReelCategory.setting_value" wire:change="updateCategories('allMagnetReelCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allMagnetReelCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию магнитных роликов, которые будут использоваться в калькуляторе по умолчанию. Если тип магнитного ролика не выбран, будут показаны все магнитные ролики.</p>
    </div>

    <!-- Add parent reel power block category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию блока питания по умолчанию для магнитных роликов
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allReelPowerBlockCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allReelPowerBlockCategory.setting_value" wire:change="updateCategories('allReelPowerBlockCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allReelPowerBlockCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию блоков питания, которые будут использоваться в калькуляторе по умолчанию. Если тип блока питания не выбран, будут показаны все блоки питания.</p>
    </div>

    <!-- Add parent reel accessory category to show all -->
    <h3 class="text-lg font-medium mb-3 mt-5">
        Добавить категорию аксессуаров по умолчанию для магнитных роликов
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 box p-3 flex-row gap-2">
            <h3 class="text-lg font-medium mb-2">{{ $allReelAccessoryCategory->title ?? 'Не выбрана категория' }}</h3>
            <div class="flex flex-col">
                <select wire:model="allReelAccessoryCategory.setting_value" wire:change="updateCategories('allReelAccessoryCategory')" class="form-control" placeholder="категория">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ optional($allReelAccessoryCategory)->setting_value == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="text-sm text-gray-500 col-span-12 pt-2">Выберите категорию аксессуаров, которые будут использоваться в калькуляторе по умолчанию. Если тип аксессуара не выбран, будут показаны все аксессуары.</p>
    </div>

        <!-- line -->
    <hr class="my-5">

    <!-- Led kelvin and room type -->
    <h3 class="text-lg font-medium mb-0 mt-5">
        Добавить тип магнитного ролика
    </h3>
    <div class="intro-y grid grid-cols-12">
        <div class="col-span-12 flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <input wire:model="currentReelType.title" type="text" class="form-control" placeholder="Название">
                    @error('currentReelType.title') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <select wire:model="currentReelType.setting_value" class="form-control" placeholder="категория">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('currentReelType.setting_value') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="flex flex-col">
                    <input wire:model="currentReelType.media" type="file" accept="image/*" class="form-control bg-white h-full">
                    @error('currentReelType.media') <p class="text-sm text-danger">{{ $message }}</p> @enderror
                </div>
                <button wire:click.prevent="createNew('currentReelType')" type="button" class="{{$updating['var']=='currentReelType' ? 'hidden' : ''}} btn btn-success text-white" style="align-self: flex-start;">Добавить</button>
                <button wire:click.prevent="update('currentReelType')" type="button" class="{{$updating['var']!='currentReelType' ? 'hidden' : ''}} btn btn-primary text-white" style="align-self: flex-start;">Обновить</button>
                <button wire:click.prevent="edit({{ $updating['id'] }}, 'currentReelType')" type="button" class="btn btn-danger text-white {{ $updating['var']!='currentReelType' ? 'hidden' : '' }}" style="align-self: flex-start;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
        <div class="col-span-12">
            <h3 class="text-lg font-medium mb-0 mt-5">
                Типы магнитных роликов
            </h3>
            <div class="intro-y grid grid-cols-12 gap-3 mt-5">
            @foreach($reelTypes as $reelType)
                <div class="col-span-12 md:col-span-6 box">
                    <div class="p-2 text-slate-600 dark:text-slate-500">
                        <div class="flex items-center justify-between">
                            <div class="w-10 h-10 flex-none image-fit mr-5">
                                <img src="{{ asset('storage/'.$reelType->media) }}" alt="{{ $reelType->title }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-lg font-medium">{{ $reelType->title }}</h3>
                                <span class="text-sm text-gray-500">Категория: {{ $categories->find($reelType->setting_value)->title }}</span>
                            </div>
                            <div>
                                <button wire:click.prevent="edit({{ $reelType->id }}, 'currentReelType')" type="button" class="btn bg-white shadow-lg rounded-full text-primary py-3 px-4">{{ $updating['id']==$reelType->id ? 'Отменить ' : '' }}<i class="fa-solid fa-{{ $updating['id']==$reelType->id ? 'x' : 'pencil' }}"></i></button>
                                <button wire:click.prevent="delete({{ $reelType->id }})" type="button" class="btn bg-white shadow-lg rounded-full text-danger py-3 px-4"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="delete-modal {{ $delete ? '' : 'hidden' }}">
        <div class="delete rounded-1 p-2 shadow-sm">
            <p class="font-kyiv fs-5 fw-bold mb-0 text-center">Вы уверены, что хотите удалить этот элемент?</p>
            <div class="flex flex-row justify-end gap-2">
                <button wire:click.prevent="cancelDelete" class="btn btn-primary">Отменить</button>
                <button wire:click.prevent="confirmDelete" class="btn btn-danger">Удалить</button>
            </div>
        </div>
    </div>


</div>
