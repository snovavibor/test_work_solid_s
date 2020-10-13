


      <div class="form-group" id="edit_name">
<form action="update" method="POST" id="edit_name_form">
<input type="hidden" name="id" value="<?= ($param[0]->id) ?? ''; ?>">
<input type="text" name="name" class="form-control" id="name_edit" value="<?= ($param[0]->name) ?? ''; ?>">
<button type="button" class="btn btn-primary" id="update_name">Save New Name</button>
<button type="button" id="cancel" class="btn btn-danger">Cancel</button>
</form>
</div>     
            
      


