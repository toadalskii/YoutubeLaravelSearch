<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utility\Youtube;

class WelcomeController extends Controller
{
    private $youtube;

    public function __construct(Youtube $youtube){
        $this->youtube = $youtube;
    }
    /**
     * Show the Website home page
     *
     * @return View
     */
    public function show()
    {
        return view('welcome');
    }

     /**
     * Handle the Ajax call for Youtube API Search
     *
     * @return JSON
     */
    public function showResult(Request $request){

        $query = $request->input('query');
        $responce = $this->youtube->findByTitle($query);

        if(count($responce) <= 0) {
            return response()->json([
                'error' => 'error',
                'message' => 'No Result Found. Please Try Again Later'
            ]);
        }

        return response()->json($responce);
    }
}