<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TMember extends Authenticatable
{
  use Notifiable;
  // IDを指定
  protected $primaryKey = 'member_id';
  // タイムスタンプOFF
  public $timestamps = false;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'member_id','mail_address','password','authority_flag','user_name',
      'user_sex','user_birthdate','user_company','is_deleted','insert_date'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'user_gender'=> 'integer',
      'user_birthdate' => 'date',
      'insert_date' => 'datetime',
  ];
}
