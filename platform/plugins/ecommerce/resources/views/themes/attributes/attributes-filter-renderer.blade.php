@foreach ($attributeSets as $attributeSet)
    @php($selected = Arr::get($selectedAttrs, $attributeSet->slug, $selectedAttrs))

    <ul class="widget-content widget-sidebar widget-filter-color">
        @if (view()->exists('plugins/ecommerce::themes.attributes._layouts-filter.' . $attributeSet->display_layout))
            @include(
                'plugins/ecommerce::themes.attributes._layouts-filter.' . $attributeSet->display_layout,
                [
                    'set' => $attributeSet,
                    'attributes' => $attributeSet->attributes,
                ]
            )
        @else
            @include('plugins/ecommerce::themes.attributes._layouts.dropdown', [
                'set' => $attributeSet,
                'attributes' => $attributeSet->attributes,
            ])
        @endif
    </ul>
@endforeach
