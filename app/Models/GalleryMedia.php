<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GalleryMedia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_media';
    public $fillable = ['gallery_id','media_id'];
}