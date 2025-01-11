<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'milestone_name', 
        'grant_id',              
        'deliverable',        
        'target_completion_date',
        'status',
        'remark',
        'updated_at',
    ];

    public function grant()
    {
        return $this->belongsTo(Grant::class);
    }
}
