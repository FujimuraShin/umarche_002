<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Shop;
use App\Models\Image;


class Owner extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function shop(){
        return $this->hasOne(Shop::class);
    }

    public function image(){
        return $this->hasManyOne(Image::class);
    }
}
