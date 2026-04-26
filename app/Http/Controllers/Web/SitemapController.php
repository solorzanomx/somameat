<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $slugs = ['rastro-tif', 'corte-premium', 'maquila', 'empaque', 'congelacion'];

        return response()
            ->view('sitemap', compact('slugs'))
            ->header('Content-Type', 'application/xml');
    }
}
