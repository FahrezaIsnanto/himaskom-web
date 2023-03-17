<?php

namespace App\Services\Impl;

use App\Exceptions\CustomErrors;
use App\Models\Division;
use App\Services\DivisionService;
use Illuminate\Support\Facades\Storage;

class DivisionServiceImpl implements DivisionService
{
    private $division;
    public function __construct(Division $division)
    {
        $this->division = $division;
    }

    function tableData($request)
    {
        $resData = $this->division;
        if (!empty($request->search)) {
            $resData = $resData->whereRaw("title like '%" . $request->search . "%'");
        }
        return $resData->paginate(10);
    }

    function store($request)
    {
        $fileUpload = $request->file('image');
        if (empty($fileUpload)) {
            throw new CustomErrors("Gambar tidak boleh kosong");
        }
        $path = $fileUpload->storeAs(
            'division',
            date('Ym') . '/' . time(),
            'public'
        );

        $this->division->create([
            "title" => $request->title,
            "image" => $path,
        ]);
    }

    function findById($id)
    {
        $resData = $this->division->where('id', $id);
        if (!$resData->exists())
            throw new CustomErrors("Data bidang tidak ditemukan");
        return $resData->first();
    }

    function update($request, $id)
    {
        $data = $this->division->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data bidang tidak ditemukan");

        $oldImage = $data->first()->image;
        $path = $oldImage;
        $fileUpload = $request->file('image');
        if (!empty($fileUpload)) {
            if (!empty($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $path =  $fileUpload->storeAs(
                'division',
                date('Ym') . '/' . time(),
                'public'
            );
        }

        $data->update([
            "title" => $request->title,
            "image" => $path,
        ]);
    }

    function destroy($id)
    {
        $data = $this->division->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data bidang tidak ditemukan");
        $oldImage = $data->first()->image;
        if (!empty($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }
        $data->delete();
    }

    function collection($request = NULL)
    {
        $resData = $this->division;
        if (!empty($request->id)) {
            $resData = $resData->where('id', $request->id);
        }
        return ($resData->exists()) ? $resData->get() : '';
    }
}
