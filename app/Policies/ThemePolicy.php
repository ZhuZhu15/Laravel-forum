<?php

namespace App\Policies;

use App\User;
use app\Theme;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThemePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Theme $theme)
    {
        return $theme->user->id === $user->id;
    }
}
