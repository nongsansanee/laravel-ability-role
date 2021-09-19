<?php

namespace App\Http\Controllers;

use App\Models\OPDCard;

class ExamController extends Controller
{
    public function edit(OPDCard $opdcard)
    {
        return view('exam.edit', ['opdcard' => $opdcard]);
    }

    public function update(OPDCard $opdcard)
    {
        $opdcard->diagnosis = request()->diagnosis;
        $opdcard->orders = request()->orders;
        $opdcard->procedures = request()->procedures;
        $opdcard->medications = request()->medications;
        $opdcard->note = request()->note;
        $opdcard->exam_completed_at = now();
        $opdcard->save();

        return redirect('/')->with('message', 'Case completed');
    }
}
