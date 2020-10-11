<?php

require_once 'MakeValueInterface.php';

class MainController extends Controller implements MakeValueInterface
{
    
    public function index(){

        //$id=2;
        if($action = $_POST['action']){
            $this->$action();
        }
   
        $model = new FieldModel();
        
        //$rows = $model->where($id);
        //$rows = $model->all();
        
       
        $rows = $model->getTree();
    
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


    public function delchild()
    {

        $id = $_POST['id'];
       
        $model = new FieldModel();

        //get childs field with id ==$id
        $childs = $model->childsForDel($id);

        //make new array with key 'id' from $childs
        $arrKeys = makeArrayOfKey($childs,'id');
        
        //add in array id parent field
        $arrKeys[] = $id;
        
        //make string of value(id) for sql query for delete
        $str_for_sql = implode(',',$arrKeys);
        $res = $model->destroy($str_for_sql);
        
       
        $rows = $model->getTree();
        
        return $this->view('home',$rows);
        
    }


}