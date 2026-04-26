<?php declare(strict_types=1);
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
class QualityController extends Controller { public function __invoke(): View { return view('pages.quality'); } }
