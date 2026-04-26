<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('pages.services.index');
    }

    public function show(string $slug): View
    {
        return view('pages.services.show', compact('slug'));
    }
}
