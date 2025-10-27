<p>You have received a new contact form submission.</p>

<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>

<p><strong>Message:</strong></p>
<p>{!! nl2br(e($messageBody)) !!}</p>
