<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lexx\ChatMessenger\Traits\Messagable;
use Spatie\Permission\Traits\HasRoles;

class UserAdmin extends Authenticatable
{
    use Notifiable, Messagable, HasRoles;

    protected $table = 'users_admins';

    protected $guard = 'admin';

    protected $appends = array('nameRol', 'photo');

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'guid', 'name', 'email', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getphotoAttribute()
    {

        if ($this->usu_foto != '' && \Storage::disk('public')->exists('/image/photos/' . $this->usu_foto)) {
            return '/store/image/photos/' . $this->usudis_foto;
        } else {
            return '/store/image/photos/profile_small.jpg';
        }
    }

    public function getnameRolAttribute()
    {

        if ($this->roles != null) {
            return $this->roles->pluck('name')->first();
        } else {
            return '';
        }
    }
}
