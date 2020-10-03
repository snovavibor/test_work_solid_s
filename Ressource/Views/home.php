
    <p class="text-center">this page home </p>


    <div class="container">
  <div class="row">
    <div class="col">

   

      

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mainBtnModal">
    Create root
    </button>
    

    <h3>in BD now:</h3>
    <?php

    if($this->param){

        foreach ($this->param as $row) {
            echo "id: {$row->id}, name:{$row->name} <br>";
                }
    }else{
      
      //TO DO: make handler for errors
      die('ERROR ::: id no exits'); 
    }
    
    ?>
    </div>
   
    
  </div>
</div>
    
    
