<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    public $timestamps = false;         
    protected $fillable = ['brand', 'year'];
    protected $primary_key="id";

    public function client()
    {
        return $this->hasOne(Client::class);
    }

}

// $vehicles = Vehicle::orderBy('year', 'desc')->get();
