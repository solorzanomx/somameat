<?php
declare(strict_types=1);
namespace App\Filament\Admin\Resources\Channels;

use App\Filament\Admin\Resources\Channels\Pages\{CreateChannel, EditChannel, ListChannels};
use App\Filament\Admin\Resources\Channels\Schemas\ChannelForm;
use App\Filament\Admin\Resources\Channels\Tables\ChannelsTable;
use App\Models\Channel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChannelResource extends Resource {
    protected static ?string $model = Channel::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;
    protected static string|\UnitEnum|null $navigationGroup = 'Contenido';
    protected static ?string $navigationLabel = 'Canales';
    protected static ?string $modelLabel = 'Canal';
    protected static ?string $pluralModelLabel = 'Canales';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema { return ChannelForm::configure($schema); }
    public static function table(Table $table): Table { return ChannelsTable::configure($table); }
    public static function getPages(): array {
        return ['index'=>ListChannels::route('/'), 'create'=>CreateChannel::route('/create'), 'edit'=>EditChannel::route('/{record}/edit')];
    }
}
