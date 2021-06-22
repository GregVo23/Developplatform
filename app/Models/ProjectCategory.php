<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectCategory extends Pivot
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'category_id',
        'sub_category_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects_categories';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}