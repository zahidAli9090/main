<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $node)
        @php($hasMegaMenu = $node->has_child && count($node->child) > 10)
        <li @class(['has-dropdown' => $node->has_child, 'has-megamenu' => $hasMegaMenu])>
            <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif @class(['mega-menu-title' => $hasMegaMenu])>
                @if ($imageIcon = $node->getMetadata('icon_image', true))
                    <img src="{{ RvMedia::getImageUrl($imageIcon) }}" alt="{{ $node->title }}" />
                @elseif ($node->icon_font)
                    <i class="{{ trim($node->icon_font) }}"></i>
                @endif
                {{ $node->title }}
            </a>

            @if ($node->has_child)
                {!! Menu::generateMenu([
                    'menu' => $node,
                    'menu_nodes' => $node->child,
                    'view' => 'menu',
                    'options' => ['class' => 'submenu' . ($hasMegaMenu ? ' mega-menu' : '')],
                ]) !!}
            @endif
        </li>
    @endforeach
</ul>
