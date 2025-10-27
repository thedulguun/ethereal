@component('mail::message')
# New contact message

**From:** {{ $data['name'] }} ({{ $data['email'] }})

**Message:**
{{ $data['message'] }}

@component('mail::button', ['url' => config('app.url')])
Open Site
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
