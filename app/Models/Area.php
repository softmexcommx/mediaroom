<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'cat_areas';

    /**
     * The primary key for the model.
     *
     * @var string
     */

    protected $primaryKey = 'idArea';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'idArea', 'nameArea', 'status', 'category_idCategory'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_idCategory', 'idCategory');
    }

    public static function thumbnail($slug)
    {
        $_photo = '';
        $items = \Storage::disk('photos')->files($slug.'/images');
     
        foreach ($items as $item) {
            if (basename($item) == 'thumbnail.jpg' || basename($item) == 'thumbnail.jpeg') {
                $_photo  = env('APP_PHOTO') . '/' . $item;
                break;
            }
        }
        return $_photo;
    }

    public static function photosHigh($slug)
    {
        $_photos = array();
        $items = \Storage::disk('photos')->files($slug .'/images/high');
     
        foreach ($items as $item) {
            //if (basename($item) != 'thumbnail.jpg' || basename($item) != 'thumbnail.jpeg') {
                $_photos[] = env('APP_PHOTO') . '/' . $item;
            //}
        }
        return $_photos;

    }

}