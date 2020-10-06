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
        
       $result = $model->create($valueForm,$valueforCreate);
      
       
    header('Location:/');
         
         

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
        return $this->renderBlock('content',0);
    }


    private function renderBlock($view,$param)
    {
       
       require(__DIR__.'../../../Ressource/Views/'.$view.'.php');
    }
}