<?php

namespace tsc;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Notify extends Model implements SluggableInterface {
  use SluggableTrait;
      protected $sluggable = array(
      'build_from' => 'name',
      'save_to'   => 'slug',
      );

}
