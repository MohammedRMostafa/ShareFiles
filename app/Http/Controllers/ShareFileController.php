<?php

namespace App\Http\Controllers;

use App\Events\DownloadFile;
use App\Http\Requests\ShareFileRequest;
use App\Models\ShareFile;
use Illuminate\Http\Request;

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

        $validate['name'] = $name;
        $validate['path'] = $path;
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

    public function downloadFile(Request $request, $code)
    {
        $shareFile = ShareFile::where('code', $code)->first();
        $request['file_id'] = $shareFile->id;
        DownloadFile::dispatch($request);
        $shareFile->downloaded_times += 1;
        $shareFile->save();
        return response()->download(storage_path('app/' . $shareFile->path), $shareFile->name);
    }
}