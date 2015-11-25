<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id' // TEMOPORARY........
    ];

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tag', 'article_id')->withTimestamps();
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
