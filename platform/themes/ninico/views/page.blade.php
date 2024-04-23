@php
    Theme::set('layout', $page->template);
    Theme::set('pageTitle', $page->name);

    $page->loadMissing('metadata');

    $bannerImage = $page->getMetaData('banner_image', true);

    if ($bannerImage) {
        Theme::set('breadcrumbBannerImage', RvMedia::getImageUrl($bannerImage));
    }

    if ($page->getMetaData('customize_footer', true) === 'custom') {
        if ($footerBackgroundColor = $page->getMetaData('footer_background_color', true)) {
            Theme::set('footerBackgroundColor', $footerBackgroundColor);
        }
        if ($footerBorderColor = $page->getMetaData('footer_border_color', true)) {
            Theme::set('footerBorderColor', $footerBorderColor);
        }
        if ($footerTextColor = $page->getMetaData('footer_text_color', true)) {
            Theme::set('footerTextColor', $footerTextColor);
        }
        if ($footerTextMutedColor = $page->getMetaData('footer_text_muted_color', true)) {
            Theme::set('footerTextMutedColor', $footerTextMutedColor);
        }
        if ($footerLogo = $page->getMetaData('footer_logo', true)) {
            Theme::set('footerLogo', $footerLogo);
        }
        if ($footerBottomBackgroundColor = $page->getMetaData('footer_bottom_background_color', true)) {
            Theme::set('footerBottomBackgroundColor', $footerBottomBackgroundColor);
        }
    }
@endphp

{!! apply_filters(
    PAGE_FILTER_FRONT_PAGE_CONTENT,
    Html::tag('div', BaseHelper::clean($page->content), ['class' => 'ck-content'])->toHtml(),
    $page
) !!}
