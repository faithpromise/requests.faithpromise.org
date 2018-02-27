Hi, {{ $method->name }}

{!! $ticket->getExtendedMessage() !!}


------

{{ $ticket->getName() }}
{{ $ticket->getEmail() }}