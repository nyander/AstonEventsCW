<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $appends = ['likesCount','isLiked'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('likesCount', function($builder){
            $builder->withCount('favorites');
        });
    }

    public function path()
    {
        return "/events/{$this->id}";
    }
// event will have only 1 organiser
    public function maker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
// this shows the relationship the event has with photos - shows how many photos an event hase
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
// the event can have lots of replies
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
// allows users to post replies to the event
    public function enterReply($reply)
    {
        return $this->replies()->create($reply);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function favorites()
    {
   		return $this->morphMany(Favorite::class,'favorited');
    }

    public function favorite()
    {
       $attributes = ['user_id' => auth()->id()];

       if(! $this->favorites()->where($attributes)->exists())
       {
    	   return $this->favorites()->create($attributes);
   		 }
    }

    public function unLike()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->favorites()->where($attributes)->delete();
    }

    public function getisLikedAttribute()
    {
        return $this->isLiked();
    }

//shows if something is liked
    public function isLiked()
    {
      return $this->favorites()->where('user_id', auth()->id())->exists();
    }

//this gets the likes count attribute
    public function getLikesCountAttribute()
    {
        return $this->favorites->count();
    }
}
