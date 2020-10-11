<?php

function rekursiveRender($rows)
{
  foreach($rows as &$row)
  {
?>
    <div class="child ml-4">

<?php

    require(__DIR__.'../../../Ressource/Views/_contentField.php');

    rekursiveRender($row->child);

?>
    </div>

<?php
  }
}


    if($param){

        foreach ($param as &$row) {
?>

         
          <div class="row p-2" >
            <div class="col">
            <div class="field ">
              
<?php

          require(__DIR__.'../../../Ressource/Views/_contentField.php');
?>
          
          

          
          
<?php
      if(!empty($row->child))
      {
?>
          <div class="inf ml-5">
<?php
          rekursiveRender($row->child);
?>

          </div>
<?php
      }


?>

          </div>

        </div>
      </div>
           
<?php
           
             }

 
    }
    
?>

     