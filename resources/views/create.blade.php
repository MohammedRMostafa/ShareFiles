@extends('layouts.master')
@section('card_title', 'Upload File')
@section('content')
    <form action="{{ route('ShareFile.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" placeholder="Title"
                value="{{ old('title') }}">
            <label for="title">Title</label>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="file" @class(['form-control', 'is-invalid' => $errors->has('file')]) id="file" name="file" placeholder="File">
            <label for="file">File</label>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex col-3">
            <button type="submit" class="mx-1 btn btn-primary">Upload</button>
        </div>
    </form>
@endsection
