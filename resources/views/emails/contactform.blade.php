@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $send['sitename'] }}
        @endcomponent
    @endslot

    {{-- Body --}}

    **Gönderen** : {{$send['name']}}
    <br>
    **Email** : {{$send['email']}}
    <br>
    **Konu** : {{$send['subject']}}
    <br>
    **Mesaj** : {{$send['message']}}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ $send['sitename'] }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent

