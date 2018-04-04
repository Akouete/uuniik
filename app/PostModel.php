<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public $table = "uuniik_posts";
  protected $fillable = [
    'post_type', 'post_userid', 'post_title', 'post_content', 'post_link', 'post_embededlink', 'post_filename', 'post_location', 'post_file', 'post_videominiature'
  ];
}
