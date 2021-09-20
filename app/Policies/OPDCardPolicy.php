<?php

namespace App\Policies;

use App\Models\OPDCard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OPDCardPolicy
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

    public function exam(User $user, OPDCard $opdcard)
    {
        return $opdcard->triage;
    }
}
