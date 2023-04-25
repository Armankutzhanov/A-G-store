@extends('layout.layout')

@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection



@section('content')
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
<div class="container mt-3">

    <div class="container mt-5">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <div class="card shadow-sm">
                    <div class="card-body" style="width: 18rem;">
                            <img src="{{asset('storage/'.$product->img)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <form action="{{route('basket.add')}}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    <input id="product_id" type="hidden" value="{{$product->id}}" name="product_id">
                                    <a href="{{route('product.show',['product'=>$product->slug])}}" class="btn btn">{{$product->name}}</a>
                                    <p class="card-text">{{$product->description}}</p>
                                    <button type="submit" class="btn btn-primary">В корзину</button>
                                </form>
                            </div>
                    </div>

                </div>
            @endforeach
            </div>
    </div>
</div>

@endsection
