
    <div class="container">
  <div class="row">
    <div class="col">

    <button type="button" class="btn btn-info" id="create_root"> Create root </button>
    </div>
</div>
</div>



<div class="container">
  <div class="row">
    <div class="col">
    
    
    
    
  <div class="root <?= (count($param) ==0) ? 'd-none':'' ?> mt-3" id="root_make_block">
  <!-- Button trigger modal -->
    <button class="btn btn-primary">Root</button>
    <button type="button" class="btn btn-primary add_field"  data-target="#mainBtnModal" id="bat">
    +
    </button>
    <button type="button" class="btn btn-danger" id="delTree" data-target="#mainBtnModal" > - </button>
    

    
    

    <?php require_once(__DIR__.'../../../Ressource/Views/content.php')?>
    
    
    </div>
   
    
    </div>
  </div>
</div>
    
    
     <?php require_once(__DIR__.'../../../Ressource/Views/modal.php')?>


     