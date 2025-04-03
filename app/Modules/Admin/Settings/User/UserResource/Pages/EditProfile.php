<?php

namespace App\Modules\Admin\Settings\User\UserResource\Pages;

use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        $this->getNameFormComponent()->disabled(),
                        $this->getEmailFormComponent()->disabled(),
                        $this->getPasswordFormComponent(),
                        //$this->getPasswordConfirmationFormComponent(),
                    ])->columns(2),
            ]);
    }
}
