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
            <form action="{{route('send')}}" method="post">
                @csrf 
                <button type="submit" class="btn btn-primary">Run</button>
            </form>
        </div>
    </div>
 @endsection