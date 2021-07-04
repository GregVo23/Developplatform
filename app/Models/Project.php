<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'document',
        'picture',
        'about',
        'country',
        'street',
        'number',
        'city',
        'zipcode',
        'phone',
        'price',
        'created_at',
        'updated_at',
        'deadline',
        'done',
        'notifications',
        'rules',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, "projects_categories")->withPivot('project_id', 'category_id', 'sub_category_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('user_id', 'project_id', 'price', 'created_at','updated_at', 'accepted');
    }

    public function owner()
    {
        $owner = $this->user_id;

        return $owner;
    }

    public function favorites_projects()
    {
        return $this->hasMany(Favorite::class);
    }

    public function delay($deadline)
    {
        $date1 = strtotime(date('m/d/Y h:i:s', time()));
        $date2 = strtotime($deadline);

        $diff = abs($date2 - $date1);
        $days = floor($diff / (60*60*24));

        return $days;
    }

    public function address()
    {
        $address = $this->country.", ".$this->city;

        return $address;
    }
}
