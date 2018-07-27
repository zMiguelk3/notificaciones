<?php

namespace App\Http\Controllers;

use App\Events\EventNewNotification;
use App\Message;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.index');
    }
   
    
}
