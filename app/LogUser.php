<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'logged_in',
        'logout'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'logged_in' => 'datetime',
        'logout' => 'datetime'
    ];

    /**
     * \Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
