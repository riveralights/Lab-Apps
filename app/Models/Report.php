<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lesson', 'laboratory_id', 'starting_date', 'end_date', 'description'];
    protected $dates = ['starting_date', 'end_date'];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function report_details()
    {
        return $this->hasMany(ReportDetail::class);
    }
}
