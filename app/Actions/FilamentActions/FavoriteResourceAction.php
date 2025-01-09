<?php

namespace App\Actions\FilamentActions;

use App\Models\FavoriteResource;
use Filament\Actions\Action;

class FavoriteResourceAction extends Action
{

    protected string $class;

    public static function getDefaultName(): ?string
    {
        return 'favorite_resource';
    }

    public function className(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getClassName(): string
    {
        return $this->class;
    }

    protected function setUp(): void
    {

        parent::setUp();

        $this->hiddenLabel()
            ->tooltip('Clique aqui para adicionar ou remover dos favoritos')
            ->outlined()
            ->color('warning')
            ->icon(fn() => FavoriteResource::isFavorite($this->getClassName()) ? 'heroicon-s-star' : 'heroicon-o-star')
            ->action(function ($livewire) {
                FavoriteResource::toggleFavorite($this->getClassName());
                $livewire->js('window.location.reload();');
            });
    }
}
