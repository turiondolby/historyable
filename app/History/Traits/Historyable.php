<?php

namespace App\History\Traits;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;

trait Historyable
{
    public static function bootHistoryable()
    {
        static::updated(function (Model $model) {
            dd($model);
        });
    }

    public function history()
    {
        return $this->morphMany(History::class, 'historyable')->latest();
    }
}
