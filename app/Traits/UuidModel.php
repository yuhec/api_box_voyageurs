<?php

namespace api;

use Ramsey\Uuid\Uuid;

trait Uuids
{

  /**
   * Boot function from laravel.
   */
  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
    });
  }
}