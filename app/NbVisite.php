<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NbVisite extends Model
{
  public $table = "user_nbvisite";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nbvisite'
  ];
}
