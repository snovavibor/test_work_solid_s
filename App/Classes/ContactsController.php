<?php


class ContactsController extends Controller
{
    
    public function index(){
      
        return $this->view('contacts');
    }

    
}