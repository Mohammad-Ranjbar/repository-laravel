<?php

namespace App\Http\Repositories;

use App\Models\Book;
use Illuminate\Http\Request;

class BookRepositories
{
    /*
    * @var Book
    */
    public $book;


    public function __construct(Book $book)
    {
        return $this->book = $book;
    }

    public function index()
    {
        return $this->book->orderBy('created_at', 'desc')->get();
    }

    public function store($request)
    {

    }
}
