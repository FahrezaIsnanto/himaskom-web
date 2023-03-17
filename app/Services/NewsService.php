<?php

namespace App\Services;

interface NewsService
{
    function tableData($request);
    function store($request);
    function findById($id);
    function update($request, $id);
    function destroy($id);
    function collection($request = NULL);
}
