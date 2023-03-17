<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    private $authService;

    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }

    public function index()
    {
        return Inertia::render('Auth/Index');
    }

    public function store(StoreAuthRequest $request)
    {
        $this->authService->store($request);
        return redirect('/admin/dashboard');
    }

    public function destroy(Request $request)
    {
        $this->authService->destroy($request);
        return redirect('/auth');
    }
}
