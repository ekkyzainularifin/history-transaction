<?php

namespace Eza\HistoryTransaction;

use App\Models\HistoryDataTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait HistoryTransaction
{
     /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootHistoryTransaction()
    {
        static::created(function($model) {
            $history = new HistoryDataTransaction();
            $history->transactionable_id   = $model->id;
            $history->transactionable_type = $model;
            $history->field = 'Create new data';
            $history->user_id = Auth::user()->id;
            $history->original_value = '';
            $history->new_value = '';
            $history->ip = request()->ip();
            $history->save();
        });
        static::updated(function($model) {
            foreach ($model->getDirty() as $key => $value) {
                if ($key != 'updated_at') {
                    $history = new HistoryDataTransaction();
                    $history->transactionable_id   = $model->id;
                    $history->transactionable_type = $model;
                    $history->field = $key;
                    $history->user_id = Auth::user()->id;
                    $history->original_value = $model->getOriginal($key);
                    $history->new_value = $value;
                    $history->ip = request()->ip();
                    $history->save();
                }
            }
        });
    }
}
