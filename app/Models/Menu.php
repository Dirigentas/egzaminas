<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function tablesConnection()
    {
        return $this->hasMany(Dish::class, 'menu', 'name');
    }
}

?>