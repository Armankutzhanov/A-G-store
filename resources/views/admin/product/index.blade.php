@extends('layout.layout')

@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="sidebar col-3">
                <ul>
                    <li>
                        <a href="{{route('product.index')}}">Товари</a>
                    </li>
                    <li>
                        <a href="{{route('basket.show')}}">Заказы</a>
                    </li>
                    <li>
                        <a href="{{route('guest.show')}}">Заказы не авт</a>
                    </li>
                </ul>
            </div>


            <div class="posts col-9">
                <div class="button row">
                    <a href="{{route('product.create')}}" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="{{route('product.index')}}" class="col-3 btn btn-warning">Редактировать</a>
                </div>
                <div class="row title-table">

                    <h2>Управление товарами</h2>
                    <div class="id col-1"></div>
                    <div class="title col-5">Название</div>
                    <div class="author col-2">Цена</div>
                    <div class="red col-4"></div>
                </div>

                <div class="row post">
                    @foreach($products as $k=>$product)
                    <div class="id col-1">{{$k+1}}</div>
                    <div class="title col-5">{{$product->name}}</div>
                    <div class="author col-2">{{$product->price}}</div>
                    <div class="del col-2"><a href=""></a></div>
                    <div class="red col-2"><a href=""></a></div>

{{--                    <div class="status col-2"><a href="">unpublish</a></div>--}}

{{--                    <div class="status col-2"><a href="">publish</a></div>--}}
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
