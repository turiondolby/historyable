<?php

namespace App\History\Traits;

use App\Models\History;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

trait Historyable
{
    public static function bootHistoryable()
    {
        static::updated(function (Model $model) {
            dd($model->getChangedColumns($model));
        });
    }

    protected function getChangedColumns(Model $model)
    {
        return collect(
            array_diff(
                $model->getChanges(),
                $original = $model->getOriginal()
            )
        )->map(function ($change, $column) use ($original) {
            return [
                'column' => $column,
                'from' => Arr::get($original, $column),
                'to' => $change
            ];
        });
    }

    public function history()
    {
        return $this->morphMany(History::class, 'historyable')->latest();
    }
}
