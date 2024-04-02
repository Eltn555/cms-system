<div class="me-2 header-action-style header-search-1">
    <a class="search-toggle {{($search == "") ? "" : "open"}}" href="#">
        <svg class="s-open white-icon d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11.5" cy="11.5" r="9.5" stroke="white" stroke-width="1.5"/>
            <path d="M18.5 18.5L22 22" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <svg class="s-open dark-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11.5" cy="11.5" r="9.5" stroke="#232323" stroke-width="1.5"/>
            <path d="M18.5 18.5L22 22" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <i class="pe-7s-close s-close"></i>
    </a>
    <div class="search-wrap-1 {{($search == "") ? "" : "open"}}">
        <form action="#">
            <input placeholder="Search products…" type="text" wire:model="search">
            <button class="button-search d-flex justify-content-center align-items-center"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11.5" cy="11.5" r="9.5" stroke="#232323" stroke-width="1.5"/>
                    <path d="M18.5 18.5L22 22" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
        </form>
        <div class="position-fixed width row shadow" style="width: 70vw; z-index: 99; right: -15vw; top: 65px">
                    @if($search != "")
            @foreach ($results as $result)
                <a href="" class="bg-white col-sm-6 col-lg-6 p-3 flex-column" style="font-size: 1rem;"><div class="p-1 w-100 fw-semibold">{{ $result->title }}</div><div class="p-1 w-100 fw-semibold text-end pr-5 text-muted">{{ $result->price }} sum</div></a>
            @endforeach
                    @endif
        </div>
    </div>


</div>
