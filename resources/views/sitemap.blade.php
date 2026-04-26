<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

    {{-- HOME --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ url('/') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/') }}"/>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- SERVICIOS (índice) --}}
    <url>
        <loc>{{ route('services.index') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('services.index') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.services.index') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('services.index') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    {{-- SERVICIOS (detalle) --}}
    @foreach($slugs as $slug)
    <url>
        <loc>{{ route('services.show', $slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('services.show', $slug) }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.services.show', $slug) }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('services.show', $slug) }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- MAQUILA --}}
    <url>
        <loc>{{ route('maquila') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('maquila') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.maquila') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('maquila') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.85</priority>
    </url>

    {{-- CALIDAD --}}
    <url>
        <loc>{{ route('quality') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('quality') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.quality') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('quality') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    {{-- NOSOTROS --}}
    <url>
        <loc>{{ route('about') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('about') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.about') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('about') }}"/>
        <changefreq>yearly</changefreq>
        <priority>0.7</priority>
    </url>

    {{-- CONTACTO --}}
    <url>
        <loc>{{ route('contact') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('contact') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.contact') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('contact') }}"/>
        <changefreq>yearly</changefreq>
        <priority>0.8</priority>
    </url>

    {{-- COTIZACIÓN --}}
    <url>
        <loc>{{ route('quote') }}</loc>
        <xhtml:link rel="alternate" hreflang="es" href="{{ route('quote') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ route('en.quote') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('quote') }}"/>
        <changefreq>yearly</changefreq>
        <priority>0.75</priority>
    </url>

</urlset>
