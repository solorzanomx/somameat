@props([
    'title'       => config('app.name'),
    'description' => null,
    'image'       => null,
    'canonical'   => null,
    'noindex'     => false,
])

@php
    use Illuminate\Support\Facades\Route;

    $currentLocale  = app()->getLocale();
    $canonical      = $canonical ?? request()->url();
    $ogImage        = $image ?? asset('img/og-default.jpg');
    $siteName       = config('app.name');
    $fullTitle      = ($title && $title !== $siteName) ? "{$title}" : $siteName;
    $metaDesc       = $description ?? __('home.meta_description');

    // Auto-compute alternate hreflang URL desde el nombre de ruta actual
    $routeName   = Route::currentRouteName() ?? '';
    $routeParams = Route::current()?->parameters() ?? [];

    if (str_starts_with($routeName, 'en.')) {
        $altRouteName = substr($routeName, 3);   // quitar prefijo 'en.'
        $altLocale    = 'es';
    } else {
        $altRouteName = 'en.' . $routeName;
        $altLocale    = 'en';
    }

    try {
        $alternateUrl = Route::has($altRouteName) ? route($altRouteName, $routeParams) : null;
    } catch (\Throwable) {
        $alternateUrl = null;
    }

    // x-default apunta siempre a la versión ES
    $xDefault = ($currentLocale === 'es') ? $canonical : ($alternateUrl ?? $canonical);
@endphp

{{-- Título y meta básicos --}}
<title>{{ $fullTitle }}</title>
<meta name="description" content="{{ $metaDesc }}">

@if($noindex)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif

{{-- Canonical --}}
<link rel="canonical" href="{{ $canonical }}">

{{-- Hreflang (auto-calculado desde nombre de ruta) --}}
<link rel="alternate" hreflang="{{ $currentLocale }}" href="{{ $canonical }}">
@if($alternateUrl)
    <link rel="alternate" hreflang="{{ $altLocale }}" href="{{ $alternateUrl }}">
@endif
<link rel="alternate" hreflang="x-default" href="{{ $xDefault }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ $metaDesc }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:locale" content="{{ $currentLocale === 'es' ? 'es_MX' : 'en_US' }}">
@if($alternateUrl)
    <meta property="og:locale:alternate" content="{{ $altLocale === 'en' ? 'en_US' : 'es_MX' }}">
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ $metaDesc }}">
<meta name="twitter:image" content="{{ $ogImage }}">
