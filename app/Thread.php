<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

	protected $fillable = ['title', 'body', 'user_id', 'category', 'image_path'];

	public function comments(){
		return $this->hasMany('App\Comment');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

    public function path(){
    	return "/threads/{$this->id}";
    }
}
