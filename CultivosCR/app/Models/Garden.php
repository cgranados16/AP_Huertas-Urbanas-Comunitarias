<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    public function manager()
    {
        return $this->belongsTo(User::class, 'IdManager');
    }

    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'collaborators_per_garden', 'IdGarden', 'IdCollaborator');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'IdGarden', 'id');
    }



    public function harvests()
    {
        return $this->hasMany(Harvest::class,'Garden');
    }

    public function photos()
    {
        return $this->hasMany(PhotosPerGarden::class,'IdGarden');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'IdGarden');
    }

    public function gardenScore()
    {
        $reviews = $this->hasMany(Review::class,'IdGarden');
        if ($reviews->count() > 0){
            return number_format($reviews->sum('Score')/$reviews->count(), 1) ;
        }else{
            return number_format(5, 1) ;
        }

    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_gardens', 'IdGarden', 'IdClient');
    }

}
