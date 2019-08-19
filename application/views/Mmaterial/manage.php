<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}mmaterial" class="btn"><i class="fa fa-reply"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content block-content-narrow">
		<?php echo form_open('mmaterial/save','class="form-horizontal push-10-t"') ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">No. Material</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="kode" placeholder="No. Material" name="kode" value="{kode}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Nama</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{nama}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Lokasi</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="lokasi" placeholder="Lokasi" name="lokasi" value="{lokasi}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Umur</label>
				<div class="col-md-7">
					<div class="input-group">
            <input type="text" class="form-control" id="umur" placeholder="Umur" name="umur" value="{umur}" required="" aria-required="true">
						<span class="input-group-addon">jam</span>
					</div>
				</div>
			</div>
			<!-- <div class="form-group">
				<label class="col-md-3 control-label" for="nama">Jumlah</label>
				<div class="col-md-7">
					<div class="input-group">
						<input type="text" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah" value="{jumlah}" required="" aria-required="true">
						<span class="input-group-addon">m²</span>
					</div>
				</div>
			</div> -->
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Status</label>
				<div class="col-md-7">
					<select class="form-control" name="status">
						<option value="1">Tersedia</option>
						<option value="2">Terpakai</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success" type="submit">Simpan</button>
					<a href="{base_url}mmaterial" class="btn btn-default" type="reset"><i class="pg-close"></i> Batal</a>
				</div>
			</div>
			<?php echo form_hidden('id', $id); ?>
			<?php echo form_close() ?>
	</div>
</div>
