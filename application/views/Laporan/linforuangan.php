<!-- Full Table -->
<div class="block block-bordered">
	<div class="block-content">
    <table class="table table-bordered table-striped">
      <tr>
        <td colspan="6" style="text-align:center;border:none;background-color:#fff;"><b><u>LAPORAN INFORMASI RUANGAN</u></b></td>
      </tr>
      <tr>
        <th style="text-align:center">No.</th>
        <th style="text-align:center">Tanggal</th>
        <th style="text-align:center">Suhu</th>
        <th style="text-align:center">Kelembaban</th>
      </tr>

      <!-- default variable -->
      <?php $number = 0; ?>
      <?php if ($laporan != '') { ?>
        <?php foreach ($laporan as $row) { ?>
          <?php $number = $number + 1; ?></td>

          <!-- menampilkan data laporan -->
          <tr>
            <td style="text-align:center"><?=$number;?></td>
            <td><?=$row->tanggal;?></td>
            <td><?=$row->suhu;?> °C</td>
            <td><?=$row->kelembaban;?> %</td>
          </tr>
        <? } ?>
      <? } ?>
      <tr style="border:none;background-color:#fff;">
        <td colspan="6" style="text-align:right;border-color: #fff;">ColdStorage PT Dirgantara Indonesia - Laporan <?=date("d/m/Y - h:i:s");?></td>
      </tr>
    </table>
  </div>
</div>
