<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_id',
        'report',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}