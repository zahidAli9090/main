<div class="header-search-bar">
    <form action="{{ route('public.products') }}" class="position-relative form--quick-search" data-url="{{ route('public.ajax.search-products') }}" method="GET">
        <div class="search-info p-relative">
            <button class="header-search-icon">
                <i class="fal fa-search"></i>
            </button>
            <input type="text" name="q" class="input-search-product" placeholder="{{ __('Search products...') }}" value="{{ BaseHelper::stringify(request()->query('q')) }}" autocomplete="off">
        </div>
        <div class="panel--search-result"></div>
    </form>
</div>
