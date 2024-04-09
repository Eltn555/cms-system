    <button wire:click="toggleWishlist" class=" border-0 product-action-btn-1 bg-transparent" title="Wishlist">
        <div class="rounded-circle border-0 prod-action d-flex justify-content-center align-items-center {{ $isInWishlist ? 'back-color-primary' : '' }}">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.66699 7.79349C1.66699 11.8459 5.01651 14.0054 7.46844 15.9383C8.33366 16.6204 9.16699 17.2626 10.0003 17.2626C10.8337 17.2626 11.667 16.6204 12.5322 15.9383C14.9841 14.0054 18.3337 11.8459 18.3337 7.79349C18.3337 3.74104 13.7502 0.867124 10.0003 4.7631C6.25046 0.867124 1.66699 3.74104 1.66699 7.79349Z" fill="#CBCBCB"/>
            </svg>
        </div>
    </button>
