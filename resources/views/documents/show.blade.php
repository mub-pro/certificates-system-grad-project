@extends('layouts.dashboard')

@section('wrap')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

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
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Share
                </button> -->
                <a type="button" class="btn btn-primary" href="{{ route('email.send', $document->hashid) }}">
                    Share
                </a>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Sharing Document</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send Email</button>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection