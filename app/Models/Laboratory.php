<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'author'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
