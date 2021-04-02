@extends('layout')

@section('content')

    <div class="container mt-3 text-right" dir="rtl">

            <form action="{{route('books.store')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <legend>ایجاد کتاب</legend>
                <div class="row">
                <div class="form-group col-6">
                    <label for="name">نام کتاب</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام کتاب...">
                </div>
                <div class="form-group col-6">
                    <label for="code">کد کتاب</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="کد کتاب...">
                </div>
                    <div class="form-group col-12">
                    <label for="link">لینک تصویر کتاب</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک تصویر کتاب...">
                </div>
                <div class="form-group col-6">
                    <label for="image">تصویر شاخص کتاب</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                    <div class="form-group col-6">
                        <label for="images">تصاویر کتاب</label>
                        <input type="file" class="form-control" name="images[]" multiple id="images">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">ثبت</button>
            </form>
    </div>


@endsection
