<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $fillable = [
        'name', 'email', 'position','staff_number','college','department'
    ];
    public $timestamps = false;
    public function grants()
    {
        return $this->hasMany(Grant::class, 'project_leader_id');
    }

    public function grantsMember()
    {
        return $this->belongsToMany(Grant::class, 'project_members');
    }
}
