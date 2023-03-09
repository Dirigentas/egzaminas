<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tevas extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function tablesConnection()
    {
        return $this->hasMany(Vaikas::class, 'restaurant', 'name');
    }
}

?>