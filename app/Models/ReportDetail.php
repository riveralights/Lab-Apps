<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'name', 'quantity', 'condition_before', 'condition_after', 'description'];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
