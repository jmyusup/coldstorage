<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}musers" class="btn"><i class="fa fa-reply"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content block-content-narrow">
		<?php echo form_open_multipart('musers/save','class="form-horizontal"') ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">NIK</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="{nik}" required="" aria-required="true">
				</div>
			</div>
			<?php if($foto != ''){ ?>
			<div class="form-group">
	        <label class="col-md-3 control-label" for="example-hf-email"></label>
	        <div class="col-md-7">
	            <img class="img-avatar" src="{upload_path}users_avatar/{foto}" />
	        </div>
	    </div>
			<? } ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Foto</label>
				<div class="col-md-7">
					<div class="box">
						<input type="file" id="file-3" class="inputfile inputfile-3" style="display:none;" name="foto" value="{foto}" />
						<label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Nama</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{nama}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Username</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="username" placeholder="username" name="username" value="{username}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Password</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Password Confirmation</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" value="" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Hak Akses</label>
				<div class="col-md-7">
					<select name="idhakakses" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
						<option value="#" selected disabled>Pilih Opsi</option>
						<option value="1" <?=($idhakakses=='1') ? "selected" : "" ?>>Administrator</option>
						<option value="2" <?=($idhakakses=='2') ? "selected" : "" ?>>Pegawai</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success" type="submit">Simpan</button>
					<a href="{base_url}musers" class="btn btn-default" type="reset"><i class="pg-close"></i> Batal</a>
				</div>
			</div>
			<?php echo form_hidden('id', $id); ?>
			<?php echo form_close() ?>
	</div>
</div>
