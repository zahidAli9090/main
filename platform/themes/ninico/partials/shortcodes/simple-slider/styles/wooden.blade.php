<div class="container">
    <div class="row justify-content-xl-end">
        <div @class(['col-xl-9 col-xxl-7 col-lg-9' => $hasAds, 'col-xl-12 col-xxl-10 col-lg-12' => ! $hasAds])>
            <div class="tp-slider-area p-relative">
                <div class="swiper-container slider-active">
                    <div class="swiper-wrapper">
                        @foreach($sliders as $slider)
                            <div class="swiper-slide">
                                <div class="tp-slide-item">
                                    <div class="tp-slide-item__content">
                                        <h4 class="tp-slide-item__sub-title">{!! BaseHelper::clean($slider->description) !!}</h4>
                                        <h3 class="tp-slide-item__title mb-25">{!! BaseHelper::clean($slider->title) !!}</h3>
                                        <a class="tp-slide-item__slide-btn tp-btn" href="{{ $slider->link }}">
                                            {{ __('Shop Now') }} <i class="fal fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <div class="tp-slide-item__img">
                                        <img src="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $slider->title }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-pagination"></div>
            </div>
        </div>
        @if(is_plugin_active('ads') && $hasAds)
            <div class="col-xl-3 col-xxl-3 col-lg-3">
                <div class="row">
                    @foreach(range(1, 2) as $i)
                        @php($ads = AdsManager::getAds($shortcode->{'ads_' . $i}))
                        @if($ads)
                            <div class="col-lg-12 col-md-6">
                                <div @class(['tpslider-banner', 'tp-slider-sm-banner mb-30' => $loop->first])>
                                    <a href="{{ $ads->url }}">
                                        <div class="tpslider-banner__img">
                                            <img src="{{ RvMedia::getImageUrl($ads->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $ads->name }}">
                                            <div class="tpslider-banner__content">
                                                <span class="tpslider-banner__sub-title">{{ __('Popular') }}</span>
                                                <h4 class="tpslider-banner__title">{!! BaseHelper::clean($ads->name) !!}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
