<?php

namespace Pradeep\Test\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($name="pradeep test")
    {
        echo $name; 
        // return view('test::index', [
        //     'name' => $name
        // ]);
    }

}