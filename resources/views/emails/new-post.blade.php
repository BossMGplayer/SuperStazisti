@component('mail::message')
    # Hello {{ $followerName }},

    {{ $user->first_name }} has created a new job {{ $jobPost->type }}.

    Check it out here http://127.0.0.1:8000/post/{{ $jobPost->id }}

    Thanks,
    The Dev Team
@endcomponent
