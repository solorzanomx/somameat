<?php declare(strict_types=1);
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ContactController extends Controller
{
    public function show(): View { return view('pages.contact'); }
    public function store(Request $request): RedirectResponse { return back(); }
}
