<?php


class MainController extends Controller
{
    
    public function index(){
      
        return $this->view('home');
    }

    
}