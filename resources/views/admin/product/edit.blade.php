@extends('layout.layout')
<link href="../../css/main.css" rel="stylesheet">
@section('title')
    @parent{{$title}}
@endsection


@section('header')
    @parent
@endsection



@section('content')
    <link href="../../css/main.css" rel="stylesheet">
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
                <div class="row title-table">
                    <h2>Редактирование товара</h2>
                </div>
                <div class="row add-post">
                    <div class="col-12 err">
                    </div>
                    <form action="{{route('product.edit',['product'=>$id])}}" method="post" enctype="multipart/form-data">

                        <div class="col mb-4">
                            <input name="title" value="" type="text" class="form-control" placeholder="" aria-label="">
                        </div>
                        <div class="col">
                            <label  for="editor" class="form-lable">Содержимое записи</label>
                            <textarea name="content" class="form-control" id="editor" rows="6"></textarea>
                        </div>
                        <div class="input-group col mb-4 nt-4">
                            <input name="img" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <select name="topic" class="form-select mb-2" aria-label="Default select example">
                            <option value=""></option>

                        </select>
                        <div class="form-check">
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Publish
                            </label>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Publish
                            </label>
                        </div>
                        <div class="col">
                            <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
