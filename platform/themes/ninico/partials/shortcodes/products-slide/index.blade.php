<section class="white-product-area grey-bg-2 pt-65 pb-70 fix p-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                @if($title = $shortcode->title)
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">{!! BaseHelper::clean($title) !!}</h4>
                    </div>
                @endif
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="tpproductarrow d-flex align-items-center">
                    <div class="tpproductarrow__prv"><i class="far fa-long-arrow-left"></i>{{ __('Prev') }}</div>
                    <div class="tpproductarrow__nxt">{{ __('Next') }}<i class="far fa-long-arrow-right"></i></div>
                </div>
            </div>
        </div>
        <div class="swiper-container product-active">
            <div class="swiper-wrapper">
                @foreach($products as $product)
                    <div class="swiper-slide">
                        <div class="whiteproduct">
                            <div class="whiteproduct__thumb">
                                <a href="{{ $product->url }}">
                                    <img src="{{ RvMedia::getImageUrl($product->image, 'small', default: RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="mt-3 whiteproduct__content d-flex justify-content-between align-items-center">
                                <div class="whiteproduct__text text-truncate">
                                    <h5 class="whiteproduct__title">
                                        <a href="{{ $product->url }}">{{ $product->name }}</a>
                                    </h5>
                                    <span>{{ format_price($product->front_sale_price_with_taxes) }}</span>
                                    @if($product->isOnSale())
                                        <span class="tpproduct__priceinfo-list-oldprice">{{ format_price($product->price_with_taxes) }}</span>
                                    @endif
                                </div>
                                @if (EcommerceHelper::isReviewEnabled())
                                    <div class="tpproduct-details__rating">
                                        <div class="product-rating-wrapper">
                                            <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%"></div>
                                        </div>
                                    </div>
                                    <a class="tpproduct-details__reviewers">({{ $product->reviews_count }})</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
