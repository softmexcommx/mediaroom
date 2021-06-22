<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'cat_categories';

    /**
     * The primary key for the model.
     *
     * @var string
     */

    protected $primaryKey = 'idCategory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'idCategory', 'nameCategory', 'description', 'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function areas()
    {
        return $this->hasMany('App\Models\Area', 'category_idCategory', 'idCategory');
    }

}
