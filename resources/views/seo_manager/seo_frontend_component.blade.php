@yield('preset_seo')
@php
    $full_url = request()->fullUrl();
    $site_name = env('APP_NAME');
@endphp

<meta name="title" itemprop='description' content="{{$seo->title ?? $custom_title ?? ''}}" />
<meta name="description" content="{{$seo->description ?? $custom_description ?? ''}}" />
<meta name="url" content="{{$seo->url ?? $full_url}}" />
<meta name="keywords" content="{{$seo->keywords ?? $custom_keywords ?? ''}}" />
<meta property="og:title" content="{{$seo->og_title ?? $custom_title ?? ''}}" />
<meta property="og:url" content="{{$seo->og_url ?? $full_url}}" />
<meta property="og:type" content="{{$seo->og_type ?? 'website'}}" />
<meta property="og:description" content="{{$seo->og_description ?? $custom_description ?? ''}}"/>
<meta property="og:image" content="{{$seo->og_image ?? $custom_og_image ?? ''}}" />
<meta property="og:site_name" content="{{$seo->og_site_name ?? $site_name}}" />
<meta property="twitter:card" content="{{$seo->tw_card ??  ''}}" />
<meta property="twitter:title" content="{{$seo->tw_title ?? $custom_title ?? ''}}" />
<meta property="twitter:description" content="{{$seo->tw_description ?? $custom_description ?? ''}}" />
<meta property="twitter:image" content="{{$seo->tw_image ?? $custom_og_image ?? ''}}" />
<meta property="twitter:site" content="{{$seo->tw_site_name ?? $site_name}}" />
<meta property="twitter:url" content="{{$seo->tw_url ?? $full_url}}" />

@isset($seo->ld_json)
<script type="application/ld+json">
    {!! $seo->ld_json !!}
</script><!--meta_ants-->
@endisset
