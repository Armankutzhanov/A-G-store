@extends('layout.layout')

@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection



@section('content')

    <div class="container">
        <div class="content row">
            <div class="main-content col-md-9 col-12">
                <h2>{{$products->name}}</h2>

                <div class="single_post row">
                    <div class="imag col-12">
                        <img src="{{asset('storage/'.$products->img)}}" alt="{{asset('storage/'.$products->img)}}" class="img-thumbnail">

                    <h3>{{$products->price}} тенге</h3>
                        <form action="{{route('basket.add')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input id="product_id" type="hidden" value="{{$products->id}}" name="product_id">
                            <button type="submit" class="btn btn-primary">В корзину</button>
                        </form>
                    </div>
                    <div class="info">
                        <i class="far fa-user"></i>
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="single_post_text col-12">
                        <p>{{$products->description}}</p>
                    </div>
                </div>

            </div>

@endsection
