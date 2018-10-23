<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompteVente extends Model
{
  public $table = "uuniik_user";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'vente_id', 'vente_type'
  ];
}
