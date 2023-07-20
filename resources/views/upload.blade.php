@extends('layouts.master')
@section('title', 'File Ready')
@section('card_title', 'Your File Uploaded Successfully')
@section('content')

    <h5 class="card-title">{{ $shareFile->title }}</h5>
    <p>{{ $shareFile->file_name }}</p>
    <hr>
    <button onclick="myFunction()" value="{{ url('/download', $shareFile->code) }}" id="copy" class="btn btn-primary">Copy
        Link</button>
@endsection
@section('js')
    <script>
        function myFunction() {
            var copyText = document.getElementById("copy");
            navigator.clipboard.writeText(copyText.value);
            alert("Copied successfully");
        }
    </script>
@endsection
