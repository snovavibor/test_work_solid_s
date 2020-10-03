<!-- Modal -->
<form action="form" method="POST">

<div class="modal fade" id="mainBtnModal" tabindex="-1" aria-labelledby="mainBtnModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mainBtnModalLabel">
        You may add new field
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <?php require_once(__DIR__.'../../../Ressource/Views/form.php')?>
            
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="mainbtn">Add Field</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
    <?php

        require_once asset('/js/mainbutton.js');

    ?>
    </script>