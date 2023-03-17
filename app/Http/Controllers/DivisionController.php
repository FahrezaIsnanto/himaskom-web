<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDivisionRequest;
use App\Services\DivisionService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DivisionController extends Controller
{
    private $divisionService;

    public function __construct(
        DivisionService $divisionService
    ) {
        $this->divisionService = $divisionService;
    }

    public function index(Request $request)
    {
        return Inertia::render("Division/Index", [
            "division" => $this->divisionService->tableData($request),
            "filters" => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render("Division/Create");
    }

    public function store(StoreUpdateDivisionRequest $request)
    {
        $this->divisionService->store($request);
        return redirect("admin/division")->with('message', 'Berhasil simpan bidang');
    }

    public function edit($id)
    {
        return Inertia::render("Division/Edit", [
            "division" => $this->divisionService->findById($id)
        ]);
    }

    public function update(StoreUpdateDivisionRequest $request, $id)
    {
        $this->divisionService->update($request, $id);
        return redirect("admin/division")->with('message', 'Berhasil perbarui bidang');
    }

    public function destroy($id)
    {
        $this->divisionService->destroy($id);
        return redirect("admin/division")->with('message', 'Berhasil hapus bidang');
    }
}
