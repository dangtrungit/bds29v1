<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function showBillConfirm($id)
    {
        $user = Auth::user();
        $bill = Bill::where(['id' => $id, 'owner_id' => $user->id])->first();
        return view('customer.pages.user_profile.bill_confirm', compact('bill'));
    }

    public function listBillAdmin()
    {
        $bills = Bill::all();
        return view('admin.pages.bill.index', compact('bills'));
    }

    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        return view('admin.pages.bill.edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $bill = Bill::findOrFail($id);
        $user = User::with('wallet')->findOrFail($bill->owner_id);
        $wallet = $user->wallet;
        if (!isset($wallet)) {
            return abort(404);
        }
        $current_status = $bill->status;
        if ($current_status == 1 && $request->status == 2) {
            $wallet->main_account = $wallet->main_account + $request->amount_of_money;
            $wallet->save();
            activity()
                ->causedBy($user)
                ->performedOn($wallet)
                ->withProperties([
                    'amount_of_money' => $request->amount_of_money,
                    'main_account' => $wallet->main_account,
                ])
                ->log('Nạp tiền vào tài khoản');
            $bill->status = 2;
        }

        $bill->owner_phone = $request->owner_phone;
        $bill->owner_email = $request->owner_email;
        $bill->save();

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.bill.edit', $bill->id)->with('success', 'Lưu thành công!');
        }
        return redirect()->route('admin.bill.admin_list')->with('success', 'Lưu thành công!');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
