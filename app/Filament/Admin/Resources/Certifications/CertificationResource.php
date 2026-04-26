<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Certifications;

use App\Filament\Admin\Resources\Certifications\Pages\CreateCertification;
use App\Filament\Admin\Resources\Certifications\Pages\EditCertification;
use App\Filament\Admin\Resources\Certifications\Pages\ListCertifications;
use App\Filament\Admin\Resources\Certifications\Schemas\CertificationForm;
use App\Filament\Admin\Resources\Certifications\Tables\CertificationsTable;
use App\Models\Certification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificationResource extends Resource
{
    protected static ?string $model = Certification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static string|\UnitEnum|null $navigationGroup = 'Calidad';

    protected static ?string $navigationLabel = 'Certificaciones';

    protected static ?string $modelLabel = 'Certificación';

    protected static ?string $pluralModelLabel = 'Certificaciones';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return CertificationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CertificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListCertifications::route('/'),
            'create' => CreateCertification::route('/create'),
            'edit'   => EditCertification::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
