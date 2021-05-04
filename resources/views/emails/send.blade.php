@component('mail::message')

<embed class="mb-5 col-9" src="/storage/pdf_files/{{$document->pdf_file}}#toolbar=0&navpanes=0&scrollbar=0" height="700" width="100%" type="application/pdf">

@endcomponent
