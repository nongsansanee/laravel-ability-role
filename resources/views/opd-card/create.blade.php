@extends('app')

@section('title', 'Register Patient')

@section('heading', 'Registration')

@section('content')
<form action="{{ url('/') }}" method="POST" class="mt-2">
    @csrf
    <div class="mt-2">
        <label for="date_visit">Date visit :</label>
        <input required type="date" id="date_visit" name="date_visit" />
    </div>

    <div class="mt-2">
        <label for="hn">HN :</label>
        <input required type="text" id="hn" name="hn" /> <br>
    </div>

    <div class="mt-2">
        <label for="patient_name">Name :</label>
        <input required type="text" id="patient_name" name="patient_name" /> <br>
    </div>

    <div class="mt-2">
        <label for="gender">Gender :</label>
        <label for="gender_male"><input required type="radio" value="male" id="gender_male" name="gender" /> Male</label>
        <label for="gender_female"><input required type="radio" value="female" id="gender_female" name="gender" /> Female</label>
    </div>

    <div class="mt-2">
        <label for="dob">DOB :</label>
        <input required type="date" id="dob" name="dob" />
    </div>

    <input class="mt-2" type="submit" value="Register" />
</form>
@endsection