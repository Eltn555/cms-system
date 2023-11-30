@if(count($clients) !== 0 || count($contracts) !== 0 || count($payments) !== 0)

    <div class="search-result__content">

        @if(count($clients) !== 0)
            <div class="search-result__content__title">Клиенты</div>
            <div class="mb-5">
                @foreach($clients as $client)
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('dist/images/profile-15.jpg') }}">
                        </div>
                        <div
                            class="ml-3">{{ $client->firstname }} {{ $client->name }} {{ $client->fathersname ?? '' }}</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">{{ $client->phone }}</div>
                    </a>
                @endforeach
            </div>
        @endif

        @if(count($contracts) !== 0)

            <div id="search-results-clients">
                <div class="search-result__content__title">Договоры</div>
                <div class="mb-5">

                    @foreach($contracts as $contract)
                        <a href="" class="flex items-center">
                                <i class="w-4 h-4" data-lucide="file-text"></i>
                            <div class="ml-3">№ {{ $contract['id'] }}</div>
                        </a>
                    @endforeach

                </div>
            </div>
        @endif

    </div>

@else
    <div class="search-result__content hidden"></div>
@endif
