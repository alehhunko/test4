<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('main');
    }

    public function admin()
    {
        return view('admin');
    }

    public function all_request()
    {
        $questions = Question::all();
        return $questions;
    }

    public function add_request(Request $request)
    {
        $data = $request->validate([
            'request' => 'nullable|string|max:1000',
            'response' => 'nullable|string|max:1000',
        ]);
        $question = Question::create($data);
        return $question;
    }
}
