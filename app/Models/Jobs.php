<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable=['job_name','company_name','location','job_type','image','email','emirates',
'till_date','remarks'];
 
}
