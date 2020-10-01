<?php



class MainController extends Controller
{
    
    public function index(){

        //$id=2;
        
        $model = new FieldModel();
        
        //$rows = $model->where($id);
        $rows = $model->all();
      
        return $this->view('home',$rows);
    }

    
}