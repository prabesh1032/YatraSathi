<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TravellerController extends Controller
{
    // Display the list of travellers
    public function index()
    {

        $users = User::paginate(10);
        return view('travellers.index', compact('users'));
    }
}
