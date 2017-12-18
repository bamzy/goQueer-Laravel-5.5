<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    protected $table = 'hint';
    public $fillable = ['content','set_id'];

}
