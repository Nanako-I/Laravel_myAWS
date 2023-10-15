<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toilet extends Model
{
    use HasFactory;
    protected $table = 'toilets';
    protected $fillable = ['people_id','urine_one','urine_two','urine_three','ben_one','ben_one','ben_two','ben_three','ben_amount','bentsuu','filename','bikou'];
    
    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}