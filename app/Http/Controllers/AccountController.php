<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index(Request $request) {
        $currentPageNumber = $request->query('page', 1); // Default to page 1 if not provided
        $perPage = $request->input('perPage', 10); // Default to 10 items per page
        $accountQuery = User::orderBy('created_at', 'desc');

        // If there is a search query
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $accountQuery->where(function($query) use ($searchQuery) {
                $query->where('name', 'like', '%'.$searchQuery.'%')
                    ->orWhere('lastname', 'like', '%'.$searchQuery.'%')
                    ->orWhere('email', 'like', '%'.$searchQuery.'%')
                    ->orWhere('phone', 'like', '%'.$searchQuery.'%')
                    ->orWhere('address', 'like', '%'.$searchQuery.'%');
            });
        }

        $accounts = $accountQuery->paginate($perPage)->appends([
            'perPage' => $perPage,
            'search' => $request->input('search')
        ]);

        return view('admin.account.index', compact('accounts', 'perPage', 'currentPageNumber'));


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
