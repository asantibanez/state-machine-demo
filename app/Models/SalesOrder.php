<?php

namespace App\Models;

use App\Models\Traits\HasStateHistory;
use App\Status\SalesOrders\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Spatie\ModelStates\Events\StateChanged;
use Spatie\ModelStates\HasStates;

class SalesOrder extends Model
{
    use HasStates;
    use HasStateHistory;
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected static function booted()
    {
        Event::listen(StateChanged::class, function (StateChanged $stateChanged) {
            dd(
                method_exists($stateChanged->finalState, 'meta'),
                method_exists($stateChanged->model, 'saveTransition'),
                $stateChanged->finalState->meta()
            );
        });
    }
}
