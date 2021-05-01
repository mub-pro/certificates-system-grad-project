@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">{{$document->document_name}}</div>
    <p class="mb-5">{{ $document->document_description }}</p>
    <div class="row">
        <embed class="mb-5 col-9" src="/storage/pdf_files/{{$document->pdf_file}}" height="700" type="application/pdf">
        <div class="col px-5">
            <div class="row">
                <a href="{{route('documents.download', $document->pdf_file)}}" class="btn btn-primary mb-5">Download</a>
            </div>
            <div class="row">
                <a class="btn btn-primary mb-5" type="submit">share</a>
            </div>
        </div>
    </div>

</div>
@endsection