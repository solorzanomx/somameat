<?php
declare(strict_types=1);
namespace App\Filament\Admin\Resources\PlantSection\Pages;

use App\Filament\Admin\Resources\PlantSection\PlantSectionResource;
use App\Models\PlantSection;
use Filament\Resources\Pages\EditRecord;

class EditPlantSection extends EditRecord
{
    protected static string $resource = PlantSectionResource::class;

    // Always edit the singleton record
    public function mount(int|string $record = null): void
    {
        $singleton = PlantSection::singleton();
        parent::mount($singleton->id);
    }

    protected function getHeaderActions(): array { return []; }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Sección actualizada';
    }
}
