<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model implements Sluggable
{
    use HasFactory;
    use Sluggable;

    public function Sluggable():array{
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

}
