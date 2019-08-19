<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}mmaterial/create" class="btn"><i class="fa fa-plus"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content">
		<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
		<table class="table table-bordered table-striped js-dataTable-full">
			<thead>
				<tr>
					<th>No</th>
					<th>No. Material</th>
					<th>Nama Material</th>
					<th>Lokasi</th>
					<th>Umur</th>
					<!-- <th>Jumlah</th> -->
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $number=0; ?>
				<?php foreach($list_index as $row){ ?>
				<?php $number=$number+1; ?>
				<tr>
					<td><?=$number?></td>
					<td><?=$row->kode?></td>
					<td><?=$row->nama?></td>
					<td><?=$row->lokasi?></td>
					<td><?=$row->umur?> Jam</td>
					<!-- <td><?=$row->jumlah?> m²</td> -->
					<td><?=($row->status == 1 ? '<span class="label label-success">Tersedia</span>':'<span class="label label-danger">Terpakai</span>');?></td>
					<td>
						<div class="btn-group">
							<a href="{base_url}mmaterial/update/<?=$row->id?>" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
							<a href="{base_url}mmaterial/delete/<?=$row->id?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin data akan dihapus ?');"><i class="fa fa-trash-o"></i></a>&nbsp;
							<a href="{base_url}mmaterial/qrcode/<?=$row->id?>" data-toggle="tooltip" title="QRCode")><i class="fa fa-print"></i></a>
						</div>
					</td>
				</tr>
				<? } ?>
			</tbody>
		</table>
	</div>
</div>
