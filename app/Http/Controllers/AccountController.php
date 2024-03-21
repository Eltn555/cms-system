<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {

        return view('admin.account.index');
    }

    public function create() {

        return view('admin.account.create');
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
