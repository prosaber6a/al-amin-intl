<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilgrim extends Model
{
    use HasFactory;
    protected $table = 'pilgrims';
    protected $fillable = [
        'agent_id',
        'group_id',
        'package_id',
        'type',
        'given_name',
        'sure_name',
        'dob',
        'sex',
        'place_of_birth',
        'passport_no',
        'p_issue_date',
        'p_expiry_date',
        'mobile',
        'email',
        'address',
        'files',
        'pre_registration_no',
        'mofa_no',
        'registration_status',
        'registration_date',
        'mahrem_name',
        'mahrem_relation',
        'is_first_time',
        'medical_certificate_no',
        'remarks',
    ];

    // Relationships
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }


    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
