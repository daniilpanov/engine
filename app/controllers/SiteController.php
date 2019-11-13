<?php


namespace app\controllers;


class SiteController extends Controller
{
    private $lng = "ru";

    public function boot()
    {
        
    }
    
    public function anAction()
    {
        
    }

    public function lng($lng)
    {
        $_SESSION['lng'] = $this->lng = $lng;
    }

    public function page($page)
    {
        echo $page;
    }

    public function index()
    {
        echo "Routing is working!..";
    }
}