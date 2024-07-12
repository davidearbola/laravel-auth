<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'description',
        'release_year',
        'site_url',
        'thumb_path',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
