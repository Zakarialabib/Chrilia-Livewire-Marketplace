<?php

namespace App\Traits;

use App\Models\UserAlert;
use Illuminate\Database\Eloquent\Model;

trait Alertable
{
    public static function bootAlertable()
    {
        static::created(function (Model $model) {
            self::alert('query:created', $model);
        });

        static::updated(function (Model $model) {
            $model->attributes = array_merge($model->getChanges(), ['id' => $model->id]);

            self::alert('query:updated', $model);
        });

        static::deleted(function (Model $model) {
            self::alert('query:deleted', $model);
        });
    }

    protected static function alert($description, $model)
    {
        UserAlert::create([
            'message'  => $description,
            'link'   => $model ?? null,
            'user_id'      => auth()->id() ?? null,
            'host'         => request()->ip() ?? null,
        ]);
    }
}
