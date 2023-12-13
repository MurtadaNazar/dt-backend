<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\BestTraderProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $totalComments = Comment::count();
        $totalTraders = BestTraderProfile::count();
        $totalAgents = User::count();
        $latestComments = Comment::latest()->take(5)->get();

        return view('auth.home', compact('totalComments', 'totalTraders', 'totalAgents', 'latestComments'));
    }
}
