<?php

namespace App\Http\Controllers;

use App\Models\OPDCard;

class OPDCardsController extends Controller
{
    public function index()
    {
        $opdcards = OPDCard::all();

        return view('opd-card.index', ['opdcards' => $opdcards]);
    }

    public function create()
    {
        return view('opd-card.create');
    }

    public function store()
    {
        OPDCard::create(request()->all());

        return redirect('/')->with('message', 'New case successfully created');
    }

    public function destroy(OPDCard $opdcard)
    {
        $opdcard->delete();

        return redirect('/')->with('message', 'Case canceled');
    }
}
