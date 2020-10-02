<?php

require_once 'MakeValueInterface.php';

class MainController extends Controller implements MakeValueInterface
{
    
    public function index(){

        //$id=2;
        $valueForm = [
            'name'=>'rerr',
        ];
        
        //перенести в метод записи новых данных в БД ******
        $valueforCreate = $this->makeValueforCreate($valueForm);
        //var_dump($valueforCreate);die();


        $model = new FieldModel();
        
        //$rows = $model->where($id);
        //$rows = $model->all();

        //перенести в метод записи новых данных в БД *****
         $model->create($valueForm,$valueforCreate);      
      
        return $this->view('home',$rows);
    }

    /**
     * make array for create in BD
     * for sql in execute()
     */
    public function makeValueforCreate($valueForm)
    {
        return array_values($valueForm);
    }
}