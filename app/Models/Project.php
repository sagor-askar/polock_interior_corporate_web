<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
        public $table = 'projects';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'project_type_id',
        'client_name',
        'location',
        'site_area',
        'date_of_completion',
        'stage',
        'description',
        'image_one',
        'image_two',
        'youtube_url',
        'facebook_url',
        'linkedin_url',
        'homepage_visibility',
        'visibility_order',
        'status',
        'created_at',
        'updated_at',
    ];
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function projectImage()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }
}
