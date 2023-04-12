@component('mail::message')
    # Hello {{ $follower->profile->first_name }},

    {{ $user->profile->first_name }} has created a new job {{ $jobPost->type }}.

    Check it out here http://127.0.0.1:8000/post/{{ $jobPost->id }}

    Thanks,
    The Dev Team
@endcomponent
