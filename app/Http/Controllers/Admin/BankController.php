<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all()->sortByDesc('id');
        return view('admin.pages.bank.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.pages.bank.create');
    }

    public function store(\App\Http\Requests\BankRequest $request)
    {
        $data = $request->all();

        $new_bank = Bank::create($data);

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.bank.edit', $new_bank->id)->with('success', 'Tạo mới thành công ngân hàng');
        }
        return redirect()->route('admin.bank.index')->with('success', 'Tạo mới thành công ngân hàng');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.pages.bank.edit', compact('bank', 'bank'));
    }

    public function update($id, \App\Http\Requests\BankRequest $request)
    {
        $data = $request->all();
        $bank = Bank::findOrFail($id);

        $bank->update($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.bank.edit', $bank->id)->with('success', 'Tạo mới thành công loai tin');
        }
        return redirect()->route('admin.bank.index')->with('success', 'Tạo mới thành công loai tin');
    }

    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công']);
    }
}