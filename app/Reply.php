<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
   protected $guarded = [];

   protected $appends = ['likesCount','isLiked'];
   protected $with = ['owner'];



   public function owner()
   {
   		return $this->belongsTo(User::class, 'user_id');
   }

   public function event()
   {
      return $this->belongsTo(Event::class);
   }

   public function isLiked()
   {
     return $this->favorites()->where('user_id', auth()->id())->exists();
   }
   
   public function favorites()
   {
   		return $this->morphMany(Favorite::class,'favorited');
   }

   public function getLikesCountAttribute()
   {
       return $this->favorites->count();
   }

    public function getisLikedAttribute()
    {
        return $this->isLiked();
    }


}
