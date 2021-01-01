<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use Notifiable;

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    protected  $fillable =[
        'wallet_id','request_amount','account_number', 'status'
    ];


    public function wallet()
    {
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }
}
