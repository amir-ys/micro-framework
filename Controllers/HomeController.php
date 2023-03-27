<?php

namespace Controllers;

class HomeController
{
    public function index()
    {
       return  view('index.view.php');
    }

    public function about()
    {
        return view('about.view.php');
    }

    public function contact()
    {
        return view('contact.view.php');
    }


}