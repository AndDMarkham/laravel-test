<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Illuminate\SUpport\Facades\Mail;

class EmailController extends Controller
{
    public function index() 
    {
        $user_name = 'Andrew';

        Mail::to('mail@example.com')
            ->send(new TestEmail($user_name));
    }
}
