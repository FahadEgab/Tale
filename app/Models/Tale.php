<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tale extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contents',
        'active',
        'background_color',
        'font_color',
        'user_id',
        'created_at',
        'updated_at'
    ];



    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','categories_id');
    }

    public function comments(){
        return $this -> hasMany('App\Models\Comment','tale_id');
    }

}
