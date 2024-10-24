<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_employe';
    protected $fillable = [
        "nom",
        "prenom",
        "mail_employe",
        "id_service",
    ];

    protected $guarded = [
        "id_employe",
        
        
    ]; 
    public function service(){
        return $this->belongsTo(Service::class, 'id_service');
    }
}
