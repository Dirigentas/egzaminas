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

    const SORT = [
        'asc_name' => 'Pavadinimas A-Z',
        'desc_name' => 'Pavadinimas Z-A',
    ];
}

?>