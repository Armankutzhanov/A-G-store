@extends('layout.layout')

@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection


@section('content')



    <div class="container">
        <main class="form-signin w-100 m-auto">

            <form method="post" action="{{route('user.store')}}">
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal text-center">Регистрация</h1>
                <div class="mt-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control mb-3" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control mb-3" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>

            </form>
        </main>
    </div>


@endsection
