<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index() {
        $accounts = Account::all();
        return view('admin.account.index', compact('accounts'));
    }

    public function create() {

        return view('admin.account.create');
    }

    public function edit(Account $account) {
        return view('admin.account.edit', compact('account'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $image = Storage::put('/images', $data['image']);
        $data['image'] = $image;
        Account::create($data);
        return redirect()->route('admin.account.index');
    }
    public function update(Account $account, Request $request) {
        $data = $request->all();
        if(array_key_exists('image', $data)) {
            $image = Storage::put('/images', $data['image']);
            $data['image'] = $image;
        }
        $account->update($data);
        return redirect()->route('admin.account.index');
    }
}
