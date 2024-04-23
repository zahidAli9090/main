@php(Theme::set('pageTitle', $post->name))

<div class="postbox-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                <div class="postbox__wrapper pr-20">
                    <article class="postbox__item format-image mb-50 transition-3">
                        <div class="postbox__thumb w-img mb-30">
                            <img src="{{ RvMedia::getImageUrl($post->image, default: RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                        </div>
                        <div class="postbox__content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="postbox__content postbox__content-area mb-55">
                                        <div class="postbox__meta mb-15">
                                            <span><i class="fal fa-user-alt"></i> {{ $post->author->name }}</span>
                                            <span><i class="fal fa-clock"></i> {{ $post->created_at->translatedFormat('M d, Y') }}</span>
                                            <span><i class="fal fa-eye"></i> {{ number_format($post->views) }}</span>
                                        </div>
                                        <h4 class="mb-35">
                                            {{ $post->name }}
                                        </h4>
                                        <div>
                                            <div class="ck-content">{!! BaseHelper::clean($post->content) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="postbox__tag-border">
                                <div class="row align-items-center">
                                    <div class="col-xl-7 col-md-12">
                                        @if ($post->tags->count())
                                            <div class="postbox__tag">
                                                <div class="postbox__tag-list tagcloud">
                                                    <span>{{ __('Tags') }}</span>
                                                    @foreach ($post->tags as $tag)
                                                        <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-5 col-md-12">
                                        <div class="postbox__social-tag">
                                            <span>{{ __('Share') }}</span>
                                            <a class="blog-d-lnkd" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&summary={{ rawurldecode($post->description) }}&source=Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                            <a class="blog-d-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&title={{ $post->description }}"><i class="fab fa-facebook-f"></i></a>
                                            <a class="blog-d-tweet" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ $post->description }}"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    @if (theme_option('facebook_comment_enabled_in_post') === 'yes')
                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comment')) !!}
                    @endif

                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                <div class="sidebar__wrapper pl-25 pb-50">
                    {!! dynamic_sidebar('blog_sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</div>
