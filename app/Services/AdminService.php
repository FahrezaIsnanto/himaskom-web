<?php

namespace App\Services;

interface AdminService
{
    function tableData($request);
    function store($request);
    function findById($id);
    function update($request, $id);
    function destroy($id);
}
