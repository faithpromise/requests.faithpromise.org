Hi, {{ $method->name }}

{{ $ticket->message }}@if (isset($ticket->postscript) AND $ticket->postscript)


{{ $ticket->postscript }}@endif

@if (isset($ticket->files) AND !empty($ticket->files))

Files:
@foreach($ticket->files as $file)
{{ $file['url'] }}
@endforeach
@endif


Thank you,

{{ $ticket->name }}
{{ $ticket->email }}