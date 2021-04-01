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
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام کتاب..."
                           value="{{$book->name}}">
                </div>
                <div class="form-group col-6">
                    <label for="code">کد کتاب</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="کد کتاب..."
                           value="{{$book->code}}">
                </div>
                <div class="form-group col-6">
                    <label for="image">تصویر کتاب</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="col-6">
                    <label>تصویر کنونی کتاب</label>
                    <br>
                    <img src="{{asset($book->getFirstMediaUrl('books'))}}" class="w-100" width="250px" height="250px"
                         alt="{{$book->name}}">
                </div>
                <hr>
                <div class="form-group col-12">
                    <label for="images">تصاویر کتاب</label>
                    <input type="file" class="form-control" name="images[]" multiple id="images">
                </div>
                @foreach($book->getMedia('book_images') as $key=>$image)
                    <div class="col-4">
                        <label>تصاویر کنونی کتاب</label>
                        <br>
                        <img src="{{asset($image->getUrl())}}" class="w-100" width="250px"
                             height="250px" alt="{{$book->name}}">
                        <br>
                        <a href="{{route('delete-image',['id' => $book->id ,'key' => $key])}}" class="btn btn-outline-danger col-12">حذف </a>
                    </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary">تایید</button>
        </form>

    </div>


@endsection
