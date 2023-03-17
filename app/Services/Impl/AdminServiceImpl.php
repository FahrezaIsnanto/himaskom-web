<?php

namespace App\Services\Impl;

use App\Exceptions\CustomErrors;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;

class AdminServiceImpl implements AdminService
{
    private $admin;
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    function tableData($request)
    {
        $resData = $this->admin;
        if (!empty($request->search)) {
            $resData = $resData->whereRaw("username like '%" . $request->search . "%' OR fullname like '%" . $request->search . "%'");
        }
        return $resData->paginate(10);
    }

    function store($request)
    {
        $this->admin->create([
            "username" => $request->username,
            "password" =>  Hash::make($request->password),
            "fullname" => $request->fullname,
        ]);
    }

    function findById($id)
    {
        $resData = $this->admin->where('id', $id);
        if (!$resData->exists())
            throw new CustomErrors("Data admin tidak ditemukan");
        return $resData->first();
    }

    function update($request, $id)
    {
        $data = $this->admin->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data admin tidak ditemukan");
        $data->update([
            "username" => $request->username,
            "password" =>  Hash::make($request->password),
            "fullname" => $request->fullname,
        ]);
    }

    function destroy($id)
    {
        $data = $this->admin->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data admin tidak ditemukan");
        $data->delete();
    }
}
