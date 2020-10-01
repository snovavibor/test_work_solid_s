
    <p class="text-center">this page home </p>


    <div class="container">
  <div class="row">
    <div class="col">
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
    