<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/link/edit/'.$link->id_link));
?>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama Link" value="<?php echo $link->nama_link ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>URL/Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $link->url ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Target</label>
		<select name="target" class="form-control">
			<option value="_blank">_blank</option>
			<option value="_self" <?php if($link->target=="_self"){ echo "selected";} ?>>_self</option>
			<option value="_parent" <?php if($link->target=="_parent"){ echo "selected";} ?>>_parent</option>
			<option value="_top" <?php if($link->target=="_top"){ echo "selected";} ?>>_top</option>
		</select>
	</div>
  <div class="form-group form-group-lg">
		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>



<?php echo form_close() ?>
