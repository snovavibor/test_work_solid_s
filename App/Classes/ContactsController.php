<?php


class ContactsController extends Controller
{
    
    public function index(){

        
      
        return $this->view('contacts');
    }

    public function add(){

     
        return $this->view('contacts');
    }
    
}