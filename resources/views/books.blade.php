@extends('layout')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('books.create')}}" target="_blank" class="btn btn-outline-success col-12 text-center m-4">ایجاد کتاب</a>
        </div>
        <div class="row p-3">

            @foreach($books as $key=>$book)
                <div class="col-4 text-center border mb-3 p-2">
                    <span> {{$key+1}}) - book name : {{$book->name}}</span>
                    <hr>
                    <img src="{{asset($book->getFirstMediaUrl('books'))}}" class="w-100" alt="{{$book->name}}">
                    <hr>
                    <div class="row m-2">
                        <form action="{{route('books.destroy',$book->id)}}" class="col-6" method="post">
                            @csrf
                            @method('delete')
                                 <button type="submit" class="btn btn-danger col-12">حذف</button>
                        </form>
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-warning col-6">ویرایش</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
