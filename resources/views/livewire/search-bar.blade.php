<div class=" header-action-style header-search-1">
    <a href="#InputSearch" class="search-toggle searchFocuser {{($search == "") ? "" : "open"}}">
        <svg wire:ignore class="s-open white-icon d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11.5" cy="11.5" r="9.5" stroke="white" stroke-width="1.5"/>
            <path d="M18.5 18.5L22 22" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <svg wire:ignore class="s-open dark-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11.5" cy="11.5" r="9.5" stroke="#232323" stroke-width="1.5"/>
            <path d="M18.5 18.5L22 22" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <i class="pe-7s-close s-close"></i>
    </a>
    <div class="search-wrap-1 {{($search == "") ? "" : "open"}}">
        <form>
            <input class="inputSearcher" placeholder="Search products…" id="InputSearch" type="text" wire:model="search">
            <div class="button-search d-flex justify-content-center align-items-center">
                <a id="searchBtN" href="/category?search={{$search}}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="#232323" stroke-width="1.5"/>
                        <path d="M18.5 18.5L22 22" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </form>
        <div class="position-fixed width row shadow bg-white p-0" style="width: 70vw; z-index: 99; right: 0; top: 65px">
                    @if($search != "")
            @foreach ($results as $result)
                <a href="{{route('front.product.show', ['slug' => $result->slug])}}" class="m-0 rounded-1 border border-bottom border-end col-12 col-md-6 p-2 fs-6 row">
                    <div class="col-3" style="height: 70px">
                        <img class="h-100" src="{{asset(($result->images()->first()) ? 'storage/'.$result->images()->first()->image : 'no_photo.jpg')}}" alt="">
                    </div>
                    <div class="col-9 d-flex justify-content-center flex-column">
                        <div class="p-1 fw-semibold text-black text-end">{{ $result->title }}</div>
                        <div class="p-1 fw-semibold pr-5 text-muted font-kyiv text-end">
                            <span class="p-1 {{($result->discount_price == "") ? 'visually-hidden hidden' : 'new-price-card'}}">{{$result->discount_price}}  {{$result->discount_price > 999 ? 'сум' : '$'}}<br></span>
                            <span class="p-1 {{($result->discount_price == "") ? 'new-price-card' : 'old-price-card'}}">{{$result->price}} {{$result->price > 999 ? 'сум' : '$'}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
                    @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(".searchFocuser").on('click', function() {
            setTimeout(function() {
                $('.inputSearcher').focus();
                setTimeout(() => $('.inputSearcher').focus(), 100);
            }, 100);
        });
        $('#InputSearch').keypress(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var searchUrl = $('#searchBtN').attr('href'); // Get the URL from the anchor tag
                window.location.href = searchUrl; // Navigate to the URL
            }
        });
    </script>
@endpush
