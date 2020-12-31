<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected  $fillable = [
        'name','user_id', 'currency', 'amount', 'desc'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * user relationship
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public  function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
