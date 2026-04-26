<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CaseStudies;

use App\Filament\Admin\Resources\CaseStudies\Pages\CreateCaseStudy;
use App\Filament\Admin\Resources\CaseStudies\Pages\EditCaseStudy;
use App\Filament\Admin\Resources\CaseStudies\Pages\ListCaseStudies;
use App\Filament\Admin\Resources\CaseStudies\Schemas\CaseStudyForm;
use App\Filament\Admin\Resources\CaseStudies\Tables\CaseStudiesTable;
use App\Models\CaseStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|\UnitEnum|null $navigationGroup = 'Contenido';

    protected static ?string $navigationLabel = 'Casos de éxito';

    protected static ?string $modelLabel = 'Caso de éxito';

    protected static ?string $pluralModelLabel = 'Casos de éxito';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CaseStudyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseStudiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListCaseStudies::route('/'),
            'create' => CreateCaseStudy::route('/create'),
            'edit'   => EditCaseStudy::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
