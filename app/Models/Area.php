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
     
        $_photo = \Storage::disk('photos')->exists('images/'. $this->category->slug . '/' .$this->slug .'/thumbnail.jpg');
       
       return $_photo == true ? env('APP_PHOTO') . '/images/'.  $this->category->slug . '/' . $this->slug .'/thumbnail.jpg' : env('APP_PHOTO') . '/logo.png' ;
    }

    public  function getimagesAttribute()
    {
        $_photos = array();
        $items = \Storage::disk('photos')->files('/images/'.$this->category->slug . '/' . $this->slug .'/thumbnail');
     
        foreach ($items as $item) {

            $ext = pathinfo(\Storage::disk('photos')->path('images' . $this->category->slug . '/' . $this->slug .'/thumbnail/' . basename($item)), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'JPG' || $ext === 'jpeg' || $ext === 'JPEG' || $ext === 'png' || $ext === 'PNG') {
                $_photos[] = array('name' => basename($item),
                                    'thumbnail' => env('APP_PHOTO') . '/images/'. $this->category->slug . '/' . $this->slug . '/thumbnail/'. basename($item),
                                    'low' => env('APP_PHOTO') . '/images/'. $this->category->slug . '/' . $this->slug . '/low/'. basename($item),
                                    'high' => env('APP_PHOTO') . '/images/'. $this->category->slug . '/' . $this->slug . '/high/'. basename($item));                                
            }
        }
        return $_photos;

    }


    public function getdocumentsAttribute()
    {
        $_documents = array();
        $items = \Storage::disk('photos')->files('documents/'.$this->category->slug . '/' . $this->slug);
     
        foreach ($items as $item) {            
            $ext = pathinfo(\Storage::disk('photos')->path('documents/' . $this->category->slug . '/' . $this->slug .'/' . basename($item)), PATHINFO_EXTENSION);
            $icono = '';
            if ($ext === 'pdf' || $ext === 'PDF') {
                $icono = "fa fa-file-pdf-o  fa-4x";
            } else  if ($ext === 'docx' || $ext === 'DOCX') {
                $icono = "fa fa-file-word-o  fa-4x";
            } 
            if($icono != ''){
                 $_documents[] = array('name' => basename($item),
                                        'ext' => $ext,
                                        'icono' => $icono,
                                            'url' => env('APP_PHOTO') . '/documents/' . $this->category->slug . '/' . $this->slug . '/'. basename($item));                 

            }
        }
        return $_documents;
    }


    public function getvideosAttribute()
    {
        $_documents = array();
        $items = \Storage::disk('photos')->files( '/videos/' .$this->category->slug . '/' . $this->slug);
     
        foreach ($items as $item) {            
            $ext = pathinfo(\Storage::disk('photos')->path('videos/' .$this->category->slug . '/' . $this->slug .'/'. basename($item)), PATHINFO_EXTENSION);            
            if ($ext === 'mp4' || $ext === 'MP4' || $ext === 'mpg' || $ext === 'MPG' ) {               
                 $_documents[] = array('name' => basename($item),
                                        'ext' => $ext,                                        
                                        'url' => env('APP_PHOTO') . '/videos/' . $this->category->slug . '/' . $this->slug . '/'. basename($item));                 

            }
        }
        return $_documents;
    }

}
