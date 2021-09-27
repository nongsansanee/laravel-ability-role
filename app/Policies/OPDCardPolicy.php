<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\OPDCard;

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
    public function triage(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('triage_case')
            && !$opdcard->triage;
    }
    public function exam(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('exam_case')
            && $opdcard->triage
            && !$opdcard->exam_completed_at;
    }
    public function procedure(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('procedure_case')
            && $opdcard->triage
            && !$opdcard->exam_completed_at;
    }
    public function discharge(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('discharge_case')
            && $opdcard->exam_completed_at;
    }
    public function cancel(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('cancel_case')
            && !$opdcard->exam_completed_at;
    }

}
