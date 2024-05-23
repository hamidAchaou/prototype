<?php

namespace App\Models\pkg_rh;

use App\Models\pkg_notifications\Notification;
use App\Models\pkg_projets\Tache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    // TODO : relation non valide
    public function notification()
    {
        return $this->hasMany(Notification::class, 'apprenant_id');
    }

    public function Tache(){
        return $this->hasMany(Tache::class);
    }
}