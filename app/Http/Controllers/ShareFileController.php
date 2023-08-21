<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareFileRequest;
use App\Models\ShareFile;

class ShareFileController extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function store(ShareFileRequest $request)
    {
        $validate = $request->validated();
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $path = $file->store('/files');

        $validate['file_name'] = $name;
        $validate['file_path'] = $path;
        $validate['code'] = basename($path);
        ShareFile::create($validate);
        return redirect()->route('ShareFile.show');
    }

    public function show()
    {
        $shareFile = ShareFile::latest()->first();
        return view('upload', compact('shareFile'));
    }

    public function download($code)
    {
        $shareFile = ShareFile::where('code', $code)->first();
        return view('download', compact('shareFile'));
    }

    public function downloadFile($code)
    {
        $shareFile = ShareFile::where('code', $code)->first();
        return response()->download(storage_path('app/' . $shareFile->file_path), $shareFile->file_name);
    }
}
