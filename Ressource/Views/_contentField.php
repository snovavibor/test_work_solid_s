<!-- <?php

echo "id: {$row->id}, name:{$row->name} <br>";
?> -->



<!-- <form id="fields_form"> -->
<div class="form_block ml-5 mt-3">
<input type="hidden" name="parent_id" value="<?= isset($row->id) ? $row->id: '0' ?>">
<button class="btn btn-secondary"><?= $row->name ?></button>
<button class="btn btn-secondary add_field" data-toggle="modal" data-target="#mainBtnModal">+</button>
<button class="btn btn-secondary">-</button>
</div>

<!-- </form> -->