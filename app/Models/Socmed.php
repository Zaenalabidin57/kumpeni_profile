<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socmed extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function icon()
    {
        if($this->icon)
        {
            return asset('storage/' . $this->icon);
        }else{
            return asset('assets/img/stisla.svg');
        }
    }
}
