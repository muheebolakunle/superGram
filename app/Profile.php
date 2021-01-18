<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = []; 

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $image = $this->image ? $this->image :
            "profile/cZ8BxCaswICtFkzwCGQMegH38KbZ2j632qoJmoLV.jpg";
        return "/storage/{$image}";
    }

    public function followers () {
        return $this->belongsToMany(User::class);
    }
}
