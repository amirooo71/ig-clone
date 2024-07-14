<?php

namespace App\Http\Controllers;

use App\Models\User;

class SearchController extends Controller
{
    public function __invoke()
    {
        $users = User::where('name', 'Like', '%'.request('query').'%')->limit(10)->get();

        return $users;
    }
}
