<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function deletePhoto()
    {
        if($this->photo){
            $fileName = $this->photo;
            unlink(public_path().$fileName);
            $this->photo = null;
            $this->save();
        }
    }

    const SORT = [
        'asc_price' => 'Kaina nuo žemiausios',
        'desc_price' => 'Kaina nuo didžiausios',
    ];
}

?>