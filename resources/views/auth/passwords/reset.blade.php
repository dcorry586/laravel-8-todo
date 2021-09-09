@extends('layouts.auth_views')

@section('content')
<div class="container w-25">

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
    
        <input type="hidden" name="token" value="{{ $token }}">


        <h1>Reset Password</h1>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
        {{-- <div class="form-group row"> --}}
            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
    
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            {{--  --}}
    
            <label for="password" class="form-label">{{ __('Password') }}</label>
    
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    
                <br>
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Reset Password') }}
                </button>
    
    

    </form>
    

</div>

@endsection

