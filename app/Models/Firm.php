<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function tablesConnection()
    {
        return $this->hasMany(Menu::class, 'firm', 'name');
    }
}

?>