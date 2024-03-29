<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MinorCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'minor_category_name',
        'is_active',
        // 'urgency_level',
        // 'personally_assign',
        // 'evaluate_in_every_movement'
    ];
    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'

    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function majorCategory()
    {
        return $this->belongsTo(MajorCategory::class, 'major_category_id', 'id');
    }
}
