<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Books;
use App\Http\Requests\BookStoreRequest;

class BookController extends Controller
{
    public function index() {
        //$books = Books::all();
        $books = Books::latest()->paginate(2);
        //return response()->json($books);
        return response()->json([
            "success" => true,
            "status" => Response::HTTP_OK,
            //"data" => $books,
            "data" => $books->items(),
        ]);
    }

    public function show($id) {
        $book = Books::find($id);
        if(!empty($book)) {
            //return response()->json($book);
            return response()->json([
                "success" => true,
                "status" => Response::HTTP_OK,
                "data" => $book,
            ]);
        }else {
            return response()->json([
                "success" => false,
                "status" => Response::HTTP_NOT_FOUND,
                "message" => "Book not found"
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /* public function store(Request $request) {
        $book = new Books;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->save();

        return response()->json([
            "success" => true,
            "status" => Response::HTTP_OK,
            "message" => "Book Added",
        ]);
    } */

    public function store(BookStoreRequest $request) {
        $book = new Books;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->save();

        return response()->json([
            "success" => true,
            "status" => Response::HTTP_OK,
            "message" => "Book Added",
        ]);
    }

    public function update(Request $request, $id) {
        if(Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;
            $book->save();

            return response()->json([
                "success" => true,
                "status" => Response::HTTP_OK,
                "message" => "Book Updated",
            ]);
        }else {
            return response()->json([
                "success" => false,
                "status" => Response::HTTP_NOT_FOUND,
                "message" => "Book not found"
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy(Request $request, $id) {
        if(Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->delete();

            return response()->json([
                "success" => true,
                "status" => Response::HTTP_OK,
                "message" => "Book Deleted",
            ], 202);
        }else {
            return response()->json([
                "success" => false,
                "status" => Response::HTTP_NOT_FOUND,
                "message" => "Book not found",
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
