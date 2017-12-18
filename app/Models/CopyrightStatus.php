<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CopyrightStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'copyright_status';
    public $fillable = ['status','id'];
}