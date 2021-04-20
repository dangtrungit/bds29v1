<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VnPay extends Model
{
    protected $table = 'vnpay_bills';
    protected $fillable = [
        'merchant_bill_id',
        'merchant_bill_code',
        'bank_code',
        'card_type',
        'response_code',
        'order_info',
    ];
    public function merchant_bill()
    {
        return $this->belongTo('App\Models\Bill', 'merchan_bill_id', 'id');
    }
}