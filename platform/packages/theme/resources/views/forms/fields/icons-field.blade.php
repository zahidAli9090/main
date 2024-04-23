@php
    Arr::set($attributes, 'class', Arr::get($attributes, 'class') . ' icon-select');
    Arr::set($attributes, 'data-empty-value', __('-- None --'));
    Arr::set($attributes, 'data-check-initialized', true);
@endphp

{!! Form::customSelect($name, [$value => $value], $value, $attributes) !!}

@once
    @if (request()->ajax())
        <script>
            window.themeIcons = window.themeIcons || {!! json_encode(apply_filters('theme_icon_list_icons', [])) !!}
        </script>
        {!! apply_filters('theme_icon_js_code', null) !!}
        <script src="{{ asset('vendor/core/packages/theme/js/icons-field.js') }}?v=1.0.0"></script>
    @else
        <script>
            window.themeIcons = window.themeIcons || {!! json_encode(apply_filters('theme_icon_list_icons', [])) !!}
        </script>

        {!! apply_filters('theme_icon_js_code', null) !!}

        <script src="{{ asset('vendor/core/packages/theme/js/icons-field.js') }}?v=1.0.0"></script>
    @endif
@endonce
