<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'car';
    protected $fillable = ['people_id','car'];
    
    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}
