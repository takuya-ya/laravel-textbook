<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class TestController extends Controller
{
    //all usersテーブルから情報を一括取得
    // Userモデルとusersテーブルは自動で関連付けられる
    public function test() {
        $users = User::all();
        return view('test', compact('users'));
    }
}
