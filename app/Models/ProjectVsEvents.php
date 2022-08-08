<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectVsEvents extends Model
{
    protected $table = 'project_vs_events';
    use HasFactory;
    protected $fillable = ['title'];
}
