<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Book;

class BookService {
   /**
    * this function for add new book
    *@param array $data
    *@param Book $book
    */
    public function createBook(array $data,Book $book)
    {
        return Book::create([
            'title' =>$data['title'],
            'author' =>$data['author'],
            //i put this to use Carbon for formate the date (published_at)
            'published_at'=>isset($data['published_at']) ? Carbon::parse($data['published_at'])->format('Y-m-d') : $book->published_at ,
            'is_active' =>true,
        ]);
    }
    /**
     * this function to update specifice book
     * @param array $data
     * @param Book $book
     */
    public function updateBook(array $data ,Book $book)
    {
        $updateBook = array_filter([
            'title'=>$data['title'] ?? $book->title,
            'author' =>$data['author'] ?? $book->author,
            'published_at'=>isset($data['published_at']) ? Carbon::parse($data['published_at'])->format('d-m-Y') : $book->published_at ?? $book->published_at,
            'is_active' =>$data['is_active'] ?? $book->is_active
        ]);
        $book -> update($updateBook);
        return $book;
    }
    
}