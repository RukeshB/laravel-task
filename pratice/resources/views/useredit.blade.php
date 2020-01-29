@extends('layouts.app')

@section('content')
<div class="container">
        <form action="{{route('home.update',['id' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                            <img src="" alt="" id="photo" class="img-thumbnail">

                            <div class="col-md-6">
                                <input type="file" name="photo" onchange="displayPhoto(this)">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" >{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control" id="gender" required>
                                    <option value="male" @if ($user->gender == 'male')
                                    selected
                                    @endif>Male</option>
                                    <option value="female"  @if ($user->gender == 'female')
                                    selected
                                    @endif>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" value="{{$user->dob}}" name="dob" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <select name="location_id" class="form-control" id="location_id" required>
                                    @foreach ($location as $l)
                                        <option value="{{$l->id}}" @if ($user->location_id == $l->id)
                                            selected

                                        @endif>{{$l->city.', '.$l->street}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

            <div class="form-group row">
                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                <div class="col-md-6">


                    <select name="role" class="form-control" id="role" required>
                         @foreach ($role as $r)
                        <option value="{{$r->id}}" @if ($user->role_id == $r->id)
                            selected

                        @endif>{{$r->name}}</option>

                    @endforeach
                </div>

            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input type="text" name="email" placeholder="email" value="{{$user->email}}" class="form-control" id="email" required>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <button type="submit" name="update" class="btn-primary">update</button>
                </div>
            </div>

        </form>
</div>
        @endsection
        {{-- <a href="">Home</a> --}}
@include('layout.footer')
