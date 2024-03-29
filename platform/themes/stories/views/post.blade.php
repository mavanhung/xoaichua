@php Theme::layout('no-breadcrumbs') @endphp

<main class="bg-grey pb-30">
    <div class="container single-content">
        <div class="entry-header entry-header-style-1 mb-50 pt-50 mw-100">
            <h1 class="entry-title mb-50 font-weight-900">
                {{ $post->name }}
            </h1>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                        <p class="mb-5">
                            <span class="author-avatar"><img class="img-circle" src="{{ $post->author->avatar_url }}"
                                    alt="{{ $post->author->getFullName() }}" loading="lazy"></span>
                            <span class="author-name font-weight-bold">{{ $post->author->getFullName() }}</span>
                        </p>
                        {{-- <span class="mr-10"> {{ $post->created_at->format('M d, Y') }}</span> --}}
                        <span class="mr-10"> {{ $post->created_at->format('d/m/Y') }}</span>
                        {{-- <span class="has-dot"> {{ number_format(strlen($post->content) / 200) }} {{ __('mins read') }}</span> --}}
                        <span class="post-by has-dot">{{ number_format($post->views) }} {{ __('views') }}</span>
                    </div>
                </div>
                <div class="col-md-6 text-right d-none d-md-inline">
                    <ul class="header-social-network header-social-network-custom list-inline mr-15">
                        <li class="list-inline-item text-muted"><span>{{ __('Share this') }}: </span></li>
                        {{-- zalo --}}
                        <li class="list-inline-item">
                            <a class="zalo-share-button social-icon zalo text-xs-center" title="Share Zalo"
                                rel="nofollow" data-href="{{ $post->url }}" data-oaid="2194457286054493180"
                                data-customize="true">
                                <img src="{{ Theme::asset()->url('images/icon/share_zalo.svg') }}" alt="shareZalo" loading="lazy">
                            </a>
                        </li>
                        {{-- facebook --}}
                        <li class="list-inline-item">
                            <a class="fb-share-button social-icon fb text-xs-center" title="Share Facebook"
                                target="_blank" rel="nofollow"
                                data-href="{{ $post->url }}"
                                data-title="{{ $post->description }}">
                                <img src="{{ Theme::asset()->url('images/icon/share_facebook.svg') }}"
                                    alt="shareFacebook" loading="lazy">
                            </a>
                        </li>
                        {{-- messenger --}}
                        <li class="list-inline-item">
                            <a class="fb-mess-share-button social-icon mess text-xs-center" title="Share Messenger" target="_blank"
                                rel="nofollow"
                                data-href="{{ $post->url }}"
                                data-title="{{ $post->description }}">
                                <img src="{{ Theme::asset()->url('images/icon/share_messenger.svg') }}"
                                    alt="shareMessenger" loading="lazy">
                            </a>
                        </li>
                        {{-- twitter --}}
                        <li class="list-inline-item">
                            <a class="twitter-share-button social-icon tw text-xs-center" title="Share Twitter" target="_blank"
                                rel="nofollow"
                                data-href="{{ $post->url }}"
                                data-title="{{ $post->description }}">
                                <img src="{{ Theme::asset()->url('images/icon/share_twitter.svg') }}"
                                    alt="shareTwitter" loading="lazy">
                            </a>
                        </li>
                        {{-- copy --}}
                        <li class="list-inline-item">
                            <a class="social-icon copy text-xs-center btn-copy" title="Share Copy Link" rel="nofollow"
                                href="javascript:void(0);" data-href="{{ $post->url }}">
                                <img src="{{ Theme::asset()->url('images/icon/share_copy.svg') }}" alt="shareCopy" loading="lazy">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!--end single header-->
                {{-- @if ($post->image)
                    <figure class="image mb-30 m-auto text-center border-radius-10">
                        <img class="border-radius-10" src="{{ RvMedia::getImageUrl($post->image) }}" alt="post-title">
                    </figure>
                @endif --}}
                <!--figure-->
                <article class="entry-wraper mb-50">
                    <div class="post-content-wrapper">
                        @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty(($galleries = gallery_meta_data($post))))
                            {!! render_object_gallery(
                                $galleries,
                                $post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'),
                            ) !!}
                        @endif
                        {{-- {!! clean($post->content, 'youtube') !!} --}}
                        {!! $post->content !!}
                    </div>
                    @if (!$post->tags->isEmpty())
                        <div class="entry-bottom mt-50 mb-30"
                            style="visibility: visible; animation-name: fadeIn;">
                            <div class="tags">
                                <span>{{ __('Tags') }}: </span>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ $tag->url }}" rel="tag">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="single-social-share clearfix"
                        style="visibility: visible; animation-name: fadeIn;">
                        <ul class="header-social-network header-social-network-custom list-inline mr-15">
                            <li class="list-inline-item text-muted"><span>{{ __('Share this') }}: </span></li>
                            {{-- zalo --}}
                            <li class="list-inline-item">
                                <a class="zalo-share-button social-icon zalo text-xs-center" href="javascript:void(0);" title="Share Zalo"
                                    rel="nofollow" data-href="{{ $post->url }}" data-oaid="2194457286054493180"
                                    data-customize="true">
                                    <img src="{{ Theme::asset()->url('images/icon/share_zalo.svg') }}" alt="shareZalo" loading="lazy">
                                </a>
                            </li>
                            {{-- facebook --}}
                            <li class="list-inline-item">
                                <a class="fb-share-button social-icon fb text-xs-center" href="javascript:void(0);" title="Share Facebook"
                                    target="_blank" rel="nofollow"
                                    data-href="{{ $post->url }}"
                                    data-title="{{ $post->description }}">
                                    <img src="{{ Theme::asset()->url('images/icon/share_facebook.svg') }}"
                                        alt="shareFacebook" loading="lazy">
                                </a>
                            </li>
                            {{-- messenger --}}
                            <li class="list-inline-item">
                                <a class="fb-mess-share-button social-icon mess text-xs-center" href="javascript:void(0);" title="Share Messenger" target="_blank"
                                    rel="nofollow"
                                    data-href="{{ $post->url }}"
                                    data-title="{{ $post->description }}">
                                    <img src="{{ Theme::asset()->url('images/icon/share_messenger.svg') }}"
                                        alt="shareMessenger" loading="lazy">
                                </a>
                            </li>
                            {{-- twitter --}}
                            <li class="list-inline-item">
                                <a class="twitter-share-button social-icon tw text-xs-center" href="javascript:void(0);" title="Share Twitter" target="_blank"
                                    rel="nofollow"
                                    data-href="{{ $post->url }}"
                                    data-title="{{ $post->description }}">
                                    <img src="{{ Theme::asset()->url('images/icon/share_twitter.svg') }}"
                                        alt="shareTwitter" loading="lazy">
                                </a>
                            </li>
                            {{-- copy --}}
                            <li class="list-inline-item">
                                <a class="social-icon copy text-xs-center btn-copy" href="javascript:void(0);" title="Share Copy Link" rel="nofollow"
                                    href="javascript:void(0);" data-href="{{ $post->url }}">
                                    <img src="{{ Theme::asset()->url('images/icon/share_copy.svg') }}" alt="shareCopy" loading="lazy">
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if ($post->author->id)
                        <!--author box-->
                        <div class="author-bio p-30 mt-50 border-radius-10 bg-white"
                            style="visibility: visible; animation-name: fadeIn;">
                            <div class="author-image mb-30">
                                <img class="avatar" src="{{ $post->author->avatar_url }}"
                                    alt="{{ $post->author->getFullName() }}" loading="lazy">
                            </div>
                            <div class="author-info">
                                <h4 class="font-weight-bold mb-20">
                                    <span class="vcard author"><span
                                            class="fn">{{ $post->author->getFullName() }}</span></span>
                                </h4>
                                <p>{{ MetaBox::getMetaData($post->author, 'bio', true) }}</p>
                            </div>
                        </div>
                    @endif

                    <!--related posts-->
                    @php $relatedPosts = get_related_posts($post->id, 4); @endphp
                    @if ($relatedPosts->count() > 0)
                        <div class="related-posts">
                            <div class="post-module-3">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">{{ __('Related posts') }}</h5>
                                </div>
                                <div class="loop-list loop-list-style-1">
                                    @foreach ($relatedPosts->take(2) as $relatedItem)
                                        <article class="hover-up-2 transition-normal"
                                            style="visibility: visible;">
                                            <div class="row mb-40 list-style-2">
                                                <div class="col-md-4">
                                                    <div class="post-thumb position-relative border-radius-5">
                                                        <div class="img-hover-slide border-radius-5 position-relative lazy-background"
                                                            data-bg_url="{{ RvMedia::getImageUrl($relatedItem->image) }}">
                                                            {{-- style="background-image: url({{ RvMedia::getImageUrl($relatedItem->image) }})"> --}}
                                                            <a class="img-link" href="{{ $relatedItem->url }}"></a>
                                                        </div>
                                                        @includeIf('theme.stories::partials.components.social-share', ['post' => $relatedItem])
                                                    </div>
                                                </div>
                                                <div class="col-md-8 align-self-center">
                                                    <div class="post-content">
                                                        <div class="entry-meta meta-0 font-small mb-10">
                                                            @foreach ($relatedItem->categories as $category)
                                                                <a href="{{ $category->url }}"><span
                                                                        class="post-cat text-{{ ['warning', 'primary', 'info', 'success'][array_rand(['warning', 'primary', 'info', 'success'])] }}">{{ $category->name }}</span></a>
                                                            @endforeach
                                                        </div>
                                                        <h5 class="post-title font-weight-900 mb-20">
                                                            <a
                                                                href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a>
                                                            <span class="post-format-icon"><i
                                                                    class="elegant-icon icon_star_alt"></i></span>
                                                        </h5>
                                                        <div class="entry-meta meta-1 float-left font-small">
                                                            <span
                                                                class="post-on">{{ $relatedItem->created_at->format('d/m/Y') }}</span>
                                                            {{-- <span class="time-reading has-dot">{{ number_format(strlen($relatedItem->content) / 200) }} {{ __('mins read') }}</span> --}}
                                                            <span
                                                                class="post-by has-dot">{{ number_format($relatedItem->views) }}
                                                                {{ __('views') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {!! apply_filters(
                        BASE_FILTER_PUBLIC_COMMENT_AREA,
                        Theme::partial('comments', ['post' => $post, 'commentsCount' => $commentsCount]),
                    ) !!}

                    @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes')
                        <br />
                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments-facebook')) !!}
                    @endif

                    <!--More posts-->
                    @if ($relatedPosts->count() > 2)
                        <div class="single-more-articles border-radius-5">
                            <div class="widget-header-2 position-relative mb-30">
                                <h5 class="mt-5 mb-30">{{ __('You might be interested in') }}</h5>
                                <button class="single-more-articles-close"><i
                                        class="elegant-icon icon_close"></i></button>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                <ul class="list-post">
                                    @foreach ($relatedPosts->skip(2) as $relatedItem)
                                        <li class="mb-30">
                                            <div class="d-flex hover-up-2 transition-normal">
                                                <div
                                                    class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="{{ $relatedItem->url }}">
                                                        <img src="{{ RvMedia::getImageUrl($relatedItem->image) }}"
                                                            onerror="this.src='{{ Theme::asset()->url('images/default-placeholder.webp') }}'"
                                                            alt="{{ $relatedItem->name }}" loading="lazy">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-3-row font-medium font-weight-600"><a
                                                            href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a>
                                                    </h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small">
                                                        <span
                                                            class="post-on">{{ $relatedItem->created_at->format('d/m/Y') }}</span>
                                                        <span
                                                            class="post-by has-dot">{{ number_format($relatedItem->views) }}
                                                            {{ __('views') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </article>
            </div>
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                {!! AdsManager::display('top-sidebar-ads', ['class' => 'mb-30']) !!}
                {!! dynamic_sidebar('primary_sidebar') !!}
                {!! AdsManager::display('bottom-sidebar-ads', ['class' => 'mt-30 mb-30']) !!}
                <br>
                <br>
            </div>
        </div>
    </div>
    <!--container-->
</main>
