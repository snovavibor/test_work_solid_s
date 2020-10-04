<?php

require_once 'MakeValueInterface.php';

class MainController extends Controller implements MakeValueInterface
{
    
    public function index(){

        //$id=2;
   
        $model = new FieldModel();
        
        //$rows = $model->where($id);
        $rows = $model->all();

              
      
        return $this->view('home',$rows);
    }


    public function add(){

        $valueForm = $_POST;
      
        $valueforCreate = $this->makeValueforCreate($valueForm);
       
        $model = new FieldModel();
        
         $model->create($valueForm,$valueforCreate);

    }



    /**
     * make array for create in BD
     * for sql in execute()
     */
    public function makeValueforCreate($valueForm)
    {
        
        return array_values($valueForm);
    }

    public function delall(){

        $model = new FieldModel();
        $model->delAll();

    }
}