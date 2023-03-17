<?php

namespace App\Services;

interface AuthService
{
    function store($request);
    function destroy($request);
}
