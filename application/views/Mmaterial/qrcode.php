<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
    <ul class="block-options">
      <li>
        <a href="{base_url}mmaterial" class="btn"><i class="fa fa-reply"></i></a>
      </li>
    </ul>
    <h3>{title}</h3>
    <a class="btn btn-success nav-link" target="_blank" href="{base_url}mmaterial/print_qrcode/<?=$this->uri->segment(3)?>" style="margin-top:10px">
        Print QRCode
    </a>
	</div>
	<div class="block-content">
    <table class="table table-bordered m-a-0">
      <tbody style="text-align:center">
        <?php for ($i=0; $i < $repeat; $i++) { ?>
          <tr>
            <td>
              <label>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
                <?=$kode?><br><?=$nama?>
              </label>
            </td>
            <td>
              <label>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
                <?=$kode?><br><?=$nama?>
              </label>
            </td>
            <td>
              <label>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
                <?=$kode?><br><?=$nama?>
              </label>
            </td>
          </tr>
        <? } ?>
      </tbody>
    </table>
	</div>
</div>