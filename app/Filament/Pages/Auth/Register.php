<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Register extends \Filament\Pages\Auth\Register
{
    protected function handleRegistration(array $data): Model
    {
        $user = $this->getUserModel()::create($data);

        $user->assignRole(Role::find(2));

        return $user;
    }
}
