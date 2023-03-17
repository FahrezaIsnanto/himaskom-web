<?php

namespace App\Services;

interface DivisionService
{
    function tableData($request);
    function store($request);
    function findById($id);
    function update($request, $id);
    function destroy($id);
    function collection($request = NULL);
}
