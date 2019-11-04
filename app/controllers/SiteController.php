<?php


namespace app\controllers;


class SiteController extends Controller
{
    public function boot()
    {
        
    }
    
    public function anAction()
    {
        
    }

    public function actionPage($page, $lng = null)
    {
        if ($lng === null)
        {
            $lng = $_SESSION['lng'] or "ru";
        }
        
        
    }
}