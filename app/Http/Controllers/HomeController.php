<?php

namespace App\Http\Controllers;

use App\Services\DivisionService;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    private $newsService;
    private $divisionService;

    public function __construct(
        NewsService $newsService,
        DivisionService $divisionService
    ) {
        $this->newsService = $newsService;
        $this->divisionService = $divisionService;
    }

    public function index()
    {
        return Inertia::render("Home", [
            "news" => $this->newsService->collection(),
            "division" => $this->divisionService->collection()
        ]);
    }
}
