@extends('layout')

@section('content')

    <div class="container mt-3 text-right" dir="rtl">

        <form action="{{route('books.update',$book->id)}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            @method('put')
            <legend>ویرایش کتاب</legend>
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">نام کتاب</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام کتاب..." value="{{$book->name}}">
                </div>
                <div class="form-group col-6">
                    <label for="code">کد کتاب</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="کد کتاب..." value="{{$book->code}}">
                </div>
                <div class="form-group col-6">
                    <label for="image">تصویر کتاب</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="col-6">
                    <label>تصویر کنونی کتاب</label>
                    <br>
                    <img src="{{asset($book->getFirstMediaUrl('books'))}}" alt="{{$book->name}}">
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


@endsection
