<?php

namespace App\History\Traits;

use App\Models\History;

trait Historyable
{
    public function history()
    {
        return $this->morphMany(History::class, 'historyable')->latest();
    }
}
