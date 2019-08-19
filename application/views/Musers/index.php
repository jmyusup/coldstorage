<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}musers/add" class="btn"><i class="fa fa-plus"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content">
		<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
		<table class="table table-bordered table-striped js-dataTable-full">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Hak Akses</th>
					<th>Action</th>
					<th style="display:none">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list_index as $row){ ?>
				<tr>
					<td><?php echo $row->nik; ?></td>
					<td>
							<img class="img-avatar" src="{upload_path}users_avatar/<?php echo ($row->foto == '' ? 'default.jpg':$row->foto); ?>" />
					</td>
					<td><?php echo $row->nama; ?></td>
					<td><?php echo statusPermission($row->idhakakses); ?></td>
					<td>
						<div class="btn-group">
							<a href="{base_url}musers/edit/<?php echo $row->id; ?>" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
							<a href="{base_url}musers/remove/<?php echo $row->id; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin data akan dihapus ?');"><i class="fa fa-trash-o"></i></a>
						</div>
					</td>
					<td style="display:none"></td>
				</tr>
				<? } ?>
			</tbody>
		</table>
	</div>
</div>
