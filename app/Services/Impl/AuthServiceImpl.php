<?php

namespace App\Services\Impl;

use App\Services\AuthService;
use App\Exceptions\CustomErrors;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl implements AuthService
{
    function store($request)
    {
        $admin = Admin::where('username', $request->username);
        if (!$admin->exists()) {
            throw new CustomErrors("Username tidak ditemukan!");
        }
        $admin = $admin->first();
        if (!Hash::check($request->password, $admin->password)) {
            throw new CustomErrors("Password Salah!");
        }
        $request->session()->put("admin", $admin);
    }

    function destroy($request)
    {
        $request->session()->forget('admin');
    }
}
