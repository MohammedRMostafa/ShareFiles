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
        $path = $file->store('/files', [
            'disk' => 'public',
        ]);

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
        $file = public_path('storage/' . $shareFile->file_path);
        return response()->download($file, $shareFile->file_name);
    }
}
