<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\MaquilaController;
use App\Http\Controllers\Web\QualityController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\QuoteController;
use App\Http\Controllers\Web\SectorController;
use App\Http\Controllers\Web\ChannelController;
use App\Http\Controllers\Web\LegalController;
use App\Http\Controllers\Web\SitemapController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Rutas bilingües ES (sin prefijo) + EN (prefijo /en)
|--------------------------------------------------------------------------
*/

$publicRoutes = function (): void {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/servicios/{slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/maquila-y-marca-propia', MaquilaController::class)->name('maquila');
    Route::get('/certificaciones-y-calidad', QualityController::class)->name('quality');
    Route::get('/sectores', SectorController::class)->name('sectors');
    Route::get('/canales/{slug}', ChannelController::class)->name('channels.show');
    Route::get('/nosotros', AboutController::class)->name('about');
    Route::get('/contacto', [ContactController::class, 'show'])->name('contact');
    Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/cotizar', QuoteController::class)->name('quote');
};

$publicRoutesEn = function (): void {
    Route::get('/', HomeController::class)->name('en.home');
    Route::get('/services', [ServiceController::class, 'index'])->name('en.services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('en.services.show');
    Route::get('/private-label', MaquilaController::class)->name('en.maquila');
    Route::get('/certifications', QualityController::class)->name('en.quality');
    Route::get('/sectors', SectorController::class)->name('en.sectors');
    Route::get('/channels/{slug}', ChannelController::class)->name('en.channels.show');
    Route::get('/about', AboutController::class)->name('en.about');
    Route::get('/contact', [ContactController::class, 'show'])->name('en.contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('en.contact.store');
    Route::get('/quote', QuoteController::class)->name('en.quote');
};

// Rutas ES — sin prefijo
Route::group([], $publicRoutes);

// Rutas EN — prefijo /en
Route::prefix('en')->group($publicRoutesEn);

// ──────────────────────────────────────────
// Legal — sin localización (ES único)
// ──────────────────────────────────────────
Route::get('/aviso-de-privacidad',       [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terminos-y-condiciones',    [LegalController::class, 'terms'])->name('legal.terms');
Route::get('/politica-de-cookies',       [LegalController::class, 'cookies'])->name('legal.cookies');

// ──────────────────────────────────────────
// SEO — sin localización
// ──────────────────────────────────────────
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /portal',
        'Disallow: /livewire',
        '',
        'Sitemap: ' . url('/sitemap.xml'),
    ];

    return Response::make(implode("\n", $lines), 200, ['Content-Type' => 'text/plain']);
})->name('robots');
