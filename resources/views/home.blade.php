@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            Hi <strong>{{ auth()->user()->name }}</strong>, {{ __('You are logged in!') }} <br>
            {{-- logged in email --}}
            <strong>Email:</strong> {{ auth()->user()->email }}
        </div>
    </div>
@endsection
