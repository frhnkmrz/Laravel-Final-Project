<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_title', 
        'grant_provider',
        'grant_amount', 
        'start_date',
        'duration_months', 
        'end_date',
        'status',
        'grant_id',
        'updated_at',
        'project_leader_id',  
    ];
    public function projectLeader()
    {
        return $this->belongsTo(Academician::class, 'project_leader_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
    public function members()
    {
        return $this->belongsToMany(Academician::class, 'grant_academician');
    }

}
