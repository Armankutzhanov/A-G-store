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
                        <a href="{{route('topic.index')}}">Категория</a>
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
                    <h2>Добавление товара</h2>
                </div>
                <div class="row add-post">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
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
                        @csrf
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <input type="text" class="form-control mb-3" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" class="form-control mb-3" id="price" name="price" value="">
                        </div>
                        <div class="col">
                            <label  for="description" class="form-lable">Характеристика товара</label>
                            <textarea name="description" class="form-control" id="description" rows="4"></textarea>
                        </div>
                        <div class="input-group col">
                            <input name="img" type="file" class="form-control-file" id="img">
{{--                            <label class="input-group-text" for="inputGroupFile02">Upload</label>--}}
                        </div>
                        <select name="categories" class="form-select" aria-label="Default select example">
                            <option>Категории</option>
                            @foreach($categories as $k=>$v)

                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach

                        </select>
                        <div class="form-check">
                            <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Publish
                            </label>
                        </div>
                        <div class="col">
                            <button name="add_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
