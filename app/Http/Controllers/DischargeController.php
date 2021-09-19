<?php

namespace App\Http\Controllers;

use App\Models\OPDCard;

class DischargeController extends Controller
{
    public function update(OPDCard $opdcard)
    {
        $opdcard->discharged_at = now();
        $opdcard->save();

        return redirect('/')->with('message', 'Case discharged');
    }
}
