<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\User;

class BillService
{
    public function __construct()
    {

    }

    public function storeBillFromCustomer($user_id, array $bill_data)
    {
        $new_bill = new Bill;

        $owner = User::with('wallet')->findOrFail($user_id);
        $wallet = $owner->wallet;

        $new_bill->amount_of_money = $bill_data['amount_of_money'] ?? 0;
        $new_bill->owner_name = $bill_data['owner_name'];
        $new_bill->owner_phone = $bill_data['owner_phone'];
        $new_bill->owner_email = $bill_data['owner_email'];

        $new_bill->owner_confirm_message = $bill_data['owner_confirm_message'];
        $new_bill->owner_id = $owner->id;
        $new_bill->status = 1;
        $new_bill->wallet_code = $wallet->code ?? 123;

        $new_bill->bill_code = date('YmdHis');

        $new_bill->save();
        return $new_bill;
    }

}