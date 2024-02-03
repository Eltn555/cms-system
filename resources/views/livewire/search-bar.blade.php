<div class="header-action-style header-search-1">
    <a class="search-toggle {{($search == "") ? "" : "open"}}" href="#">
        <i class="pe-7s-search s-open"></i>
        <i class="pe-7s-close s-close"></i>
    </a>
    <div class="search-wrap-1 {{($search == "") ? "" : "open"}}">
        <form action="#">
            <input placeholder="Search products…" type="text" wire:model="search">
            <button class="button-search"><i class="pe-7s-search"></i></button>
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
