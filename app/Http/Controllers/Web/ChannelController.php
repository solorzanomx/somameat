<?php
declare(strict_types=1);
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\View\View;

class ChannelController extends Controller {
    public function __invoke(string $slug): View {
        $locale = app()->getLocale();
        $channel = Channel::where('is_active', true)
            ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.\"{$locale}\"')) = ?", [$slug])
            ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.es')) = ?", [$slug])
            ->with('media')
            ->firstOrFail();

        $channels = Channel::where('is_active', true)->orderBy('sort_order')->with('media')->get();

        return view('pages.channels.show', compact('channel', 'channels'));
    }
}
