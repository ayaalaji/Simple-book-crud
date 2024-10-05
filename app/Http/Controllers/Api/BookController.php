<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;

class BookController extends Controller
{
    protected $bookService;
    /**
     * this constactor contain the middleware auth(with JWT)
     * and middleware admin(only admin can store and update and destroy a book)
     * and have referance to Book Service
     */
    public function __construct(BookService $bookService)
    {
        $this->middleware('auth:api', ['except' => ['index']]);
        $this->middleware('mid-admin', ['except' => ['index','show']]);
        $this->bookService = $bookService;
    }
    /**
     * Display all Books 
     * But just the book which the status of (is_active is true)
     * the response success is in the Controller
     * i mean /App\Http\Controllers\Controller
     */
    public function index()
    {
        $books = Book::where('is_active' , true)->get();
        return $this->success($books , 'All Books available');
    }

    /**
     *create new book by admin.
     * @param  StoreRequest $request
     * @param  Book $book
     * @return /Illuminate\Http\JsonResponse
     * i use for response (success) i put it in /App\Http\Controllers\Controller
     */
    public function store(StoreRequest $request,Book $book)
    {
        $validatedData = $request->validated();
        $book= $this->bookService->createBook($validatedData,$book);
        return $this->success($book,'You created book successfully',201);
    }

    /**
     * Update the specified Book.
     * @param  UpdateRequest $request
     * @param  Book $book
     * @return /Illuminate\Http\JsonResponse
     * i use for response (success) i put it in /App\Http\Controllers\Controller
     */
    public function update(UpdateRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        $book = $this->bookService->updateBook($validatedData,$book);
        return $this->success($book,'updated book successfully');
    }

    /**
     * Remove the specified book.
     * @param Book $book
     * @return /Illuminate\Http\JsonResponse
     * i use for response (success) i put it in /App\Http\Controllers\Controller
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return $this->success();
    }
}
