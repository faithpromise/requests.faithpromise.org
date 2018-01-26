@component('mail::message')
    # Introduction

    {{ $ticket->message }}

    @if (isset($ticket->postscript) AND $ticket->postscript){{ $ticket->postscript }}@endif

    @if (isset($ticket->files) AND !empty($ticket->files))
        Files:@foreach($ticket->files as $file)
                  {{ $file['url'] }}@endforeach


    Thanks,
    {{ $ticket->name }}
@endcomponent
