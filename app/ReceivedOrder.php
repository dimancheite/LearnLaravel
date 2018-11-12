<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedOrder extends Model
{

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'from'
    ];

    /**
     * \Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function order()
    {
        $this->belongsTo('App\Order');
    }
}
