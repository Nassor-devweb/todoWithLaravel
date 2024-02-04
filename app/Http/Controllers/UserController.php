<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getName($name)
    {
        return 'Hello ' . $name;
    }
}
