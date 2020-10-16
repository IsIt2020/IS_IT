<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MemberTable extends Authenticatable
{
    use Notifiable;
    // IDを指定
    protected $primaryKey = 'MEMBER_ID';
    // タイムスタンプOFF
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MEMBER_ID','MAIL_ADDRESS','PASSWORD','AUTHORITY_FLAG','USER_NAME',
        'USER_SEX','USER_BIRTHDATE','USER_COMPANY','IS_DELETE','INSERT_DATE'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'USER_BIRTHDATE' => 'date',
        'INSERT_DATE' => 'datetime',
    ];
}
