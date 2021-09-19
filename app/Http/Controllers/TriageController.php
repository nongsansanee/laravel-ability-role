<?php

namespace App\Http\Controllers;

use App\Models\OPDCard;

class TriageController extends Controller
{
    public function edit(OPDCard $opdcard)
    {
        return view('triage.edit', ['opdcard' => $opdcard]);
    }

    public function update(OPDCard $opdcard)
    {
        $opdcard->triage = request()->triage;
        $opdcard->bp = request()->bp;
        $opdcard->weight = request()->weight;
        $opdcard->height = request()->height;
        $opdcard->body_temperature = request()->body_temperature;
        $opdcard->note = request()->note;
        $opdcard->save();

        return redirect('/')->with('message', 'Triage Updated');
    }
}
