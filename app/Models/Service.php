<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_service';
    protected $fillable = [
        "libelle_service"
    ];

    protected $guarded = [
        "id_service",
        
    ]; 
    public function employe() {
        return $this->belongsTo(Employe::class, "id_service");
    }
}
