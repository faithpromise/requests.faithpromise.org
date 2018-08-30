Hi, {{ $ticket->getName() }}.

You submitted the following request on {{ $submitted_at }}.

------

{!! $ticket->getExtendedMessage() !!}

------

We appreciate the opportunity to serve you. If you have any questions or need to update your request, please submit a follow-up request.

Thank you!

{{ $method->name }}
Faith Promise Church