<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    public function dang_ky() {
    	return view('dang_ky');
    }
    public function create(request $req) {
    	Account::create($req->all());
    	return view('dang_ky');
    }
}
