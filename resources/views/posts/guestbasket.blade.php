@extends('layout.layout')

@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection



@section('content')

    <div class="container">

        @if(!$cart_item)
            <div class="emptyBasket" style="display: block">
                <h3>Bаша корзина пуста</h3>
                <img src="https://f97o6kd8uk.a.trbcdn.net/local/templates/.default/images/cart.png?_cvc=1681146445" alt="">
                <p>Воспользуйтесь нашим каталогом, чтобы ее заполнить.</p>
                <a href="{{route('home')}}" class="button yellow">Продолжить покупки</a>
            </div>
        @else
            <div class="row title-table">

                <h2>Товари</h2>
                <div class="id col-1">№</div>
                <div class="title col-4">Название</div>
                <div class="title col-1">Кол-во</div>
                <div class="author col-2">Цена</div>
                <div class="red col-4">Управление</div>
            </div>
            <div class="row post">

                @foreach($products as $k=>$product)
                    <div class="id col-1">{{$k+1}}</div>
                    <div class="title col-4">{{$product->name}}</div>
                    <div class="title col-1">{{$product->quantity}}</div>
                    <div class="author col-2">{{$product->price}}</div>
                    <div class="del col-2"><a href=""></a></div>
                    <div class="red col-2"><a href=""></a></div>
                @endforeach
                @endif
                <a href="{{route('home')}}" class="button yellow">Продолжить покупки</a>
            </div>

            <form method="post" action="{{route('guest.add')}}">
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal text-center">Заполните данную таблицу</h1>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control mb-3" id="phone" name="phone">
                    <input type="hidden" class="form-control mb-3" id="sess_id" name="sess_id" value="{{session()->getId()}}">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>

            </form>

    </div>



@endsection
