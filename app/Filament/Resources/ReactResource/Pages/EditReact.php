<?php

namespace App\Filament\Resources\ReactResource\Pages;

use App\Filament\Resources\ReactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReact extends EditRecord
{
    protected static string $resource = ReactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
