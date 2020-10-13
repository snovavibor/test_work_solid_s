<?php

require_once 'MakeValueInterface.php';

class MainController extends Controller implements MakeValueInterface
{
    
    public function index(){

       
        if($action = $_POST['action']){
            $this->$action();
        }
   
        $model = new FieldModel();
        
       
        $rows = $model->getTree();
    
        return $this->view('home',$rows);
    }


    /**
     * add new field
     */
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




    /**
     * delete all fields
     * @return view home page with start values(0)
     */
    public function delall(){

        $model = new FieldModel();
        $model->delAll();
        return $this->renderBlock('content',0);
    }


    private function renderBlock($view,$param)
    {
       
       require(__DIR__.'../../../Ressource/Views/'.$view.'.php');
    }


    /**
     * delete childs field
     * get values from $_POST($id field)
     * @return view with deleted childs of field
     */
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
        
        //TO DO: if $res !=true ...
       
        $rows = $model->getTree();
        
        return $this->view('home',$rows);
        
    }

    /**
     * @return view form for edit name field
     */
    public function edit()
    {
      
        $model = new FieldModel();
        $row = $model->where($_POST['id']);
     
        return $this->renderBlock('_editName',$row);
       
    }

    /**
     * update name field
     * in BD
     * get values from $_POST form(Views/_editName.php)
     * @return view with update name field
     */
    public function update()
    {
        $id = $_POST['id'];
        
        $arr = $_POST;

        $str_sql = makeStringForUpdate($arr);
        
        $model = new FieldModel();
       
        $res = $model->update($id,$str_sql);
        
        //TO DO: if $res == false ...
        
        
        $rows = $model->getTree();
        
        return $this->view('home',$rows);
       
    }


}