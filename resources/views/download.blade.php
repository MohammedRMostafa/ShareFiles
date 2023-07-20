@extends('layouts.master')
@section('title', 'Download Page')
@section('card_title', 'Download File')
@section('content')

    <div class="table-responsive">
        <table class="table table-dark text-start">
            <tr>
                <th class="w-25">File Name</th>
                <td>{{ $shareFile->file_name }}</td>
            </tr>
            <tr>
                <th class="w-25">Title</th>
                <td>{{ $shareFile->title }}</td>
            </tr>
            <tr>
                <th class="w-25">Action</th>
                <td> <a href="{{ route('ShareFile.downloadFile', $shareFile->code) }}"
                        class="btn btn-primary btn-sm">Download</a>
                </td>
            </tr>

        </table>
    </div>
@endsection
