<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscriUser extends Model
{
  public $table = "uuniik_user";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'user_name', 'user_mail' , 'user_password' , 'user_gender', 'user_locale', 'user_website', 'user_filename'
  ];
}
