@if($categories->isNotEmpty())
    <div class="cat-menu__category p-relative">
        <a class="tp-cat-toggle" href="javascript:" role="button">
            <i class="fal fa-bars"></i> {{ __('Categories') }}
        </a>
        <div class="category-menu category-menu-off">
            <ul class="cat-menu__list">
                @foreach($categories as $category)
                    <li @class(['menu-item-has-children' => $category->activeChildren->isNotEmpty()])>
                        <a href="{{ $category->url }}">
                            @if ($categoryImage = $category->getMetaData('icon_image', true))
                                <img src="{{ RvMedia::getImageUrl($categoryImage) }}" alt="{{ $category->name }}" width="18" height="18">
                            @elseif ($categoryIcon = $category->getMetaData('icon', true))
                                <i class="{{ $categoryIcon }}"></i>
                            @endif
                            {{ $category->name }}
                        </a>
                        @if($category->activeChildren->isNotEmpty())
                            <ul class="submenu">
                                @foreach($category->activeChildren as $childCategory)
                                    <li><a href="{{ $childCategory->url }}">{{ $childCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
