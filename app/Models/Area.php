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
    protected $appends = array('thumbnail');

    protected $primaryKey = 'idArea';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'idArea',  'nameArea', 'slug', 'status', 'category_idCategory'
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

    public  function getthumbnailAttribute()
    {
     
        $_photo = \Storage::disk('photos')->exists($this->slug .'/images/thumbnail.jpg');
        
       return $_photo == true ? env('APP_PHOTO') . $this->slug .'/images/thumbnail.jpg' : env('APP_PHOTO') . '/logo.png' ;
    }

    public  function photosHigh()
    {
        $_photos = array();
        $items = \Storage::disk('photos')->files($this->slug .'/images/high');
     
        foreach ($items as $item) {
            //if (basename($item) != 'thumbnail.jpg' || basename($item) != 'thumbnail.jpeg') {
                $_photos[] = env('APP_PHOTO') . '/' . $this->slug . '/images/high/'. $item;
            //}
        }
        return $_photos;

    }

}
