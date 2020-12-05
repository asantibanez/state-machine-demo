<?php


namespace App\Status\SalesOrders;


use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class OrderStatus extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Registered::class)
            ->allowTransition(Registered::class, Approved::class)
            ->allowTransition(Approved::class, Processed::class)
            ->allowTransition(Processed::class, Delivered::class)
            ->allowTransition(Registered::class, Declined::class)
        ;
    }
}
