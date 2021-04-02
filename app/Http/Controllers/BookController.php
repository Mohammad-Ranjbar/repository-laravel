<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BookRepositories;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{


    public function deleteImage($id, $key)
    {

        $book = Book::findOrFail($id);
        $images = $book->getMedia('book_images')[$key]->delete();
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
//        $books = Book::groupBy('code')->get();
//        $books = DB::table('books')->select('code' , DB::raw('count(*) as total'))->groupBy('code')->get();

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
        if ($request->hasFile('image')) {
            $book->addMedia($request->image)
                ->usingFileName(time() . '-' . str_replace('_', '-', $request->image->getClientOriginalName()))
                ->toMediaCollection('books');
        }
        if (isset($request->link)) {
            $book->addMediaFromUrl($request->link)->toMediaCollection('book_url');

        }
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                $book->addMedia($image)->toMediaCollection('book_images');
            }
        }
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
        if (isset($request->link)) {
            $book->getFirstMedia('book_url')->delete();
            $book->addMediaFromUrl($request->link)->toMediaCollection('book_url');
        }
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                $book->addMedia($image)->toMediaCollection('book_images');
            }
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
