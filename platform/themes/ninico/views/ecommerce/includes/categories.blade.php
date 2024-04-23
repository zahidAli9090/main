<div class="product-sidebar__list">
    @foreach($categories as $category)
        <div class="category-filter">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" @checked(in_array($category->id, request()->query('categories', []))) id="category-filter-{{ $category->id }}">
                <label class="form-check-label" for="category-filter-{{ $category->id }}">
                    {{ $category->name }}
                </label>
                @if ($category->activeChildren->count())
                    <button class="f-right"><i class="far fa-angle-down"></i></button>
                @endif
            </div>

            @if ($category->activeChildren->count())
                @include(
                    Theme::getThemeNamespace('views.ecommerce.includes.categories'),
                    ['categories' => $category->activeChildren]
                )
            @endif
        </div>
    @endforeach
</div>
