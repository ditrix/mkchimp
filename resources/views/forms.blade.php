@extends('layouts.main')

@section('content')
@error('message')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

@if(\Session::has('message'))
 <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@if(\Session::has('error'))
 <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
    <div class="row">
        <div class="col-12">
            <h1>add subscriber</h1>
            <form method="post" action="{{route('subscribe')}}">
                @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name=
                "email"
                >
              <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
              </div>
              <div class="mb-3 form-check">
                  @if($errors->any('lastname'))
                    <span class="text-danger">{{$errors->first('lastname')}}</span>
                  @endif

                  @if($errors->any('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<hr>
    <div class="row">
        <div class="col-12">
            <h1>create compaign</h1>
            <form method="post" action="{{route('campaign')}}">
                @csrf
              <div class="mb-3">
                <label for="subject" class="form-label">subject</label>
                <input type="text" class="form-control" name="subject" id="subject">
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input type="text" class="form-control" name="content" id="content">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

 @endsection