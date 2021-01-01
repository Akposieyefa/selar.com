<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use Notifiable;

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_WEBHOOK_URL');
    }

    protected  $fillable =[
        'wallet_id','request_amount','account_number', 'status'
    ];


    public function wallet()
    {
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }
}
