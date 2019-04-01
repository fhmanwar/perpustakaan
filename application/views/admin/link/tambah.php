<p>
	<button class="btn btn-success" data-toggle="modal" data-target="#Tambah" >
  <i class="fa fa-plus"></i>Tambah
</button>
</p>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Link</h4>
            </div>
            <div class="modal-body">

<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/link'));
?>

<div class="col-lg-12">
	<div class="form-group form-group-lg">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama Link" value="<?php echo set_value('nama_link') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>URL/Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo set_value('url') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Target</label>
		<select class="form-control" name="target">
			<option value="_blank">_blank</option>
			<option value="_self">_self</option>
			<option value="_parent">_parent</option>
			<option value="_top">_top</option>
		</select>
	</div>
  <div class="form-group form-group-lg">
		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>



<?php echo form_close() ?>

<div class="clearfix"></div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
</div>
</div>
</div>
</div>
