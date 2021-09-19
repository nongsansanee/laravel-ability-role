@extends('app')

@section('title', 'Triage')

@section('heading', 'Triage')

@section('content')
<div class="mt-2">
    <p>Date Visit: {{ $opdcard->date_visit }}</p>
    <p>HN: {{ $opdcard->hn }} {{ $opdcard->patient_name }} {{ $opdcard->gender }} {{ $opdcard->age_at_visit }} Yo</p>
</div>
<hr>
<form action="{{ url('/triage/' . $opdcard->id) }}" method="POST" class="mt-2">
    @csrf
    @method('patch')

    <div class="mt-2">
        <label for="triage">Triage :</label>
        <select id="triage" name="triage" required>
            <option hidden checked value="">please select</option>
            <option value="1">วิกฤต</option>
            <option value="2">ฉุกเฉิน</option>
            <option value="3">รีบด่วน</option>
            <option value="4">กึ่งรีบด่วน</option>
            <option value="5">ไม่รีบด่วน</option>
        </select>
    </div>

    <div class="mt-2">
        <label for="weight">Weight (kg) :</label>
        <input type="text" id="weight" name="weight" /> <br>
    </div>

    <div class="mt-2">
        <label for="height">Height (cm) :</label>
        <input type="text" id="height" name="height" /> <br>
    </div>

    <div class="mt-2">
        <label for="bp">BP :</label>
        <input type="text" id="bp" name="bp" /> <br>
    </div>

    <div class="mt-2">
        <label for="body_temperature">Body Temp (℃) :</label>
        <input type="text" id="body_temperature" name="body_temperature" /> <br>
    </div>

    <div class="mt-2">
        <label for="note">Note :</label>
        <textarea id="note" name="note"></textarea>
    </div>

    <input class="mt-2" type="submit" value="Confirm" />
</form>
@endsection