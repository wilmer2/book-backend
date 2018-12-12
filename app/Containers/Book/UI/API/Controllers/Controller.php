<?php

namespace App\Containers\Book\UI\API\Controllers;

use App\Containers\Book\UI\API\Requests\CreateBookRequest;
use App\Containers\Book\UI\API\Requests\DeleteBookRequest;
use App\Containers\Book\UI\API\Requests\GetAllBooksRequest;
use App\Containers\Book\UI\API\Requests\FindBookByIdRequest;
use App\Containers\Book\UI\API\Requests\UpdateBookRequest;
use App\Containers\Book\UI\API\Requests\AddViewerRequest;
use App\Containers\Book\UI\API\Transformers\BookTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Book\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBook(CreateBookRequest $request)
    {
        $book = Apiato::call('Book@CreateBookAction', [$request]);

        return $this->created($this->transform($book, BookTransformer::class));
    }

    /**
     * @param FindBookByIdRequest $request
     * @return array
     */
    public function findBookById(FindBookByIdRequest $request)
    {
        $book = Apiato::call('Book@FindBookByIdAction', [$request]);

        return $this->transform($book, BookTransformer::class);
    }

    /**
     * @param GetAllBooksRequest $request
     * @return array
     */
    public function getAllBooks(GetAllBooksRequest $request)
    {
        $books = Apiato::call('Book@GetAllBooksAction', [$request]);

        return $this->transform($books, BookTransformer::class);
    }

    /**
     * @param UpdateBookRequest $request
     * @return array
     */
    public function updateBook(UpdateBookRequest $request)
    {
        $book = Apiato::call('Book@UpdateBookAction', [$request]);

        return $this->transform($book, BookTransformer::class);
    }

    
    public function addViewerBook(AddViewerRequest $request)
    {
        $book = Apiato::call('Book@AddViewerAction', [$request]);

        return $this->transform($book, BookTransformer::class);
    }

    /**
     * @param DeleteBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBook(DeleteBookRequest $request)
    {
        Apiato::call('Book@DeleteBookAction', [$request]);

        return $this->noContent();
    }
}
