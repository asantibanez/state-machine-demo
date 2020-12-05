<?php


namespace App\Status\SalesOrders;


class Approved extends OrderStatus
{
    public static $name = 'approved';

    public function meta()
    {
        return ['dope!'];
    }
}
