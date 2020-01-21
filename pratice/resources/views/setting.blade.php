@extends('layouts.app')

@section('content')
<form action="{{route('change')}}" method="POST">
    @csrf
    @if(session()->has('message'))
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    {{session()->get('message')}}
                </div>
            </div>
        </div>
    @endif
    <div class="form-group row">
        <label for="password-old" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

        <div class="col-md-6">
            <input id="password-old" type="password" class="form-control" name="password_old" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password-new" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

        <div class="col-md-6">
            <input id="password-new" type="password" class="form-control" name="password_new" required>


        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password">
            </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Change') }}
            </button>
        </div>
    </div>
</form>
@endsection
