<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BookRepositories;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $books = Book::all();
        $books = Book::all();

        return view('books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['name'] = $request->name;
        $data['code'] = $request->code;
        $book = Book::create($data);

        $book->addMedia($request->image)->toMediaCollection('books');
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $data['name'] = $request->name;
        $data['code'] = $request->code;

        $book->update($data);
        if ($request->hasFile('image')) {
            $book->getFirstMedia('books')->delete();
            $book->addMedia($request->image)->toMediaCollection('books');

        }


        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back();
    }
}
