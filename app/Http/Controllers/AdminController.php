<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAdminRequest;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(
        AdminService $adminService
    ) {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        return Inertia::render("Admin/Index", [
            "admin" => $this->adminService->tableData($request),
            "filters" => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render("Admin/Create");
    }

    public function store(StoreUpdateAdminRequest $request)
    {
        $this->adminService->store($request);
        return redirect("admin/admin")->with('message', 'Berhasil simpan admin');
    }

    public function edit($id)
    {
        return Inertia::render("Admin/Edit", [
            "admin" => $this->adminService->findById($id)
        ]);
    }

    public function update(StoreUpdateAdminRequest $request, $id)
    {
        $this->adminService->update($request, $id);
        return redirect("admin/admin")->with('message', 'Berhasil perbarui admin');
    }

    public function destroy($id)
    {
        $this->adminService->destroy($id);
        return redirect("admin/admin")->with('message', 'Berhasil hapus admin');
    }
}
