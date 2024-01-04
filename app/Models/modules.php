<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class modules extends Model
{
    use HasFactory;

    protected $table= "modules";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Module_name',
        'Description',
        'Project_id',
        'dept',
        'user_id',
        'Module_status',
        'Assigned',
        'Submission'
    ];

}
