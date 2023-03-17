<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateNewsRequest;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    private $newsService;

    public function __construct(
        NewsService $newsService
    ) {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        return Inertia::render("News/Index", [
            "news" => $this->newsService->tableData($request),
            "filters" => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render("News/Create");
    }

    public function store(StoreUpdateNewsRequest $request)
    {
        $this->newsService->store($request);
        return redirect("admin/news")->with('message', 'Berhasil simpan berita');
    }

    public function edit($id)
    {
        return Inertia::render("News/Edit", [
            "news" => $this->newsService->findById($id)
        ]);
    }

    public function update(StoreUpdateNewsRequest $request, $id)
    {
        $this->newsService->update($request, $id);
        return redirect("admin/news")->with('message', 'Berhasil perbarui berita');
    }

    public function destroy($id)
    {
        $this->newsService->destroy($id);
        return redirect("admin/news")->with('message', 'Berhasil hapus berita');
    }
}
