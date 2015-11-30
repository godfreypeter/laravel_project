<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
	protected $fillable = [
		'name'
	];
	public function article()
	{
		return $this->belongsToMany('App\Articles');
	}
	public static function getTagId($tags)
	{
	    $tag_id=DB::table('tags')->where('name', $tags)->pluck('id');
		return $tag_id;
	}
}
