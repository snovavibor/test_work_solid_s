

<!-- <form id="fields_form"> -->
<div class="form_block ml-5 mt-3">
<div class="content">
<input type="hidden" name="parent_id" value="<?= isset($row->id) ? $row->id: '0' ?>">
<button class="btn btn-secondary field_name" data-target="#mainBtnModal" id="editName_btn"><?= $row->name ?></button>
<button class="btn btn-secondary add_field" data-toggle="modal" data-target="#mainBtnModal">+</button>
<button class="btn btn-secondary deleteChild">-</button>
</div>
</div>



<!-- </form> -->
