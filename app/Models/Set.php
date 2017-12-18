<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $table = 'sets';
    public $fillable = ['name','description','parent_set_id'];

}
