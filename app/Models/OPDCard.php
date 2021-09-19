<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPDCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_visit',
        'hn',
        'patient_name',
        'gender',
        'dob',
    ];

    protected $casts = [
        'date_visit' => 'date',
        'dob' => 'date',
    ];

    public function getAgeAtVisitAttribute()
    {
        return $this->date_visit->diffInYears($this->dob);
    }

    public function getTriageTextAttribute()
    {
        return [
            '',
            'วิกฤต',
            'ฉุกเฉิน',
            'รีบด่วน',
            'กึ่งรีบด่วน',
            'ไม่รีบด่วน',
        ][$this->triage];
    }
}
