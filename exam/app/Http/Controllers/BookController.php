<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;

class BookController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $books = books::all();
        return response()->json($books);
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $title = $request->input('title');
        $books = books::where('title', 'LIKE', '%' . $title . '%')->get();
        return response()->json($books);
    }
}
