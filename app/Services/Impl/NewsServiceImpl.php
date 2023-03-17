<?php

namespace App\Services\Impl;

use App\Exceptions\CustomErrors;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class NewsServiceImpl implements NewsService
{
    private $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    function tableData($request)
    {
        $resData = $this->news;
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
            'news',
            date('Ym') . '/' . time(),
            'public'
        );

        $this->news->create([
            "title" => $request->title,
            "date" =>  $request->date,
            "link" =>  $request->link,
            "image" => $path,
        ]);
    }

    function findById($id)
    {
        $resData = $this->news->where('id', $id);
        if (!$resData->exists())
            throw new CustomErrors("Data berita tidak ditemukan");
        return $resData->first();
    }

    function update($request, $id)
    {
        $data = $this->news->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data berita tidak ditemukan");

        $oldImage = $data->first()->image;
        $path = $oldImage;
        $fileUpload = $request->file('image');
        if (!empty($fileUpload)) {
            if (!empty($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $path =  $fileUpload->storeAs(
                'news',
                date('Ym') . '/' . time(),
                'public'
            );
        }

        $data->update([
            "title" => $request->title,
            "date" =>  $request->date,
            "link" =>  $request->link,
            "image" => $path,
        ]);
    }

    function destroy($id)
    {
        $data = $this->news->where('id', $id);
        if (!$data->exists())
            throw new CustomErrors("Data berita tidak ditemukan");
        $oldImage = $data->first()->image;
        if (!empty($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }
        $data->delete();
    }

    function collection($request = NULL)
    {
        $resData = $this->news;
        if (!empty($request->id)) {
            $resData = $resData->where('id', $request->id);
        }
        $resData->orderBy('id', 'desc')->take(2);
        return ($resData->exists()) ? $resData->get() : '';
    }
}
