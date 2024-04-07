<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index() {
        $accounts = User::all();
        return view('admin.account.index', compact('accounts'));
    }

    public function create() {

        return view('admin.account.create');
    }

    public function edit(User $account) {
        return view('admin.account.edit', compact('account'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $image = Storage::put('/images', $data['image']);
        $data['image'] = $image;
        User::create($data);
        return redirect()->route('admin.account.index');
    }
    public function update(User $account, Request $request) {
        $data = $request->all();
        if(array_key_exists('image', $data)) {
            $image = Storage::put('/images', $data['image']);
            $data['image'] = $image;
        }
        $account->update($data);
        return redirect()->route('admin.account.index');
    }

    public function destroy($id) {
        $res=User::where('id',$id)->delete();
        return redirect()->route('admin.account.index');
    }
}
