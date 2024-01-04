<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $table= "task";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Task_name',
        'Task_status',
        'Description',
        'Projects',
        'module_id',
        'dept',
        'user_id',
        'Assigned',
        'Submission',
        'remarks',
        'media'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
