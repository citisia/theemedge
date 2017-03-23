<?php

namespace App;
use Webpatser\Uuid\Uuid;

trait BaseModel
{
     /**
     * Boot function from laravel.
     */
    protected static function bootBaseModel()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }

    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->relations)) {
            return parent::getAttribute($key);
        } else {
            return parent::getAttribute(snake_case($key));
        }
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(snake_case($key), $value);
    }


}
