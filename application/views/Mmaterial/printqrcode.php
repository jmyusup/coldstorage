<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print QRCode</title>
  </head>
  <body>
    <table style="text-align:center; width:100%;">
      <tbody>
    		<?php for ($i=0; $i < $repeat; $i++) { ?>
    			<tr style="margin: 80px;">
    				<td style="border:1px solid #000">
                        <br>
    					<label>
    						<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
    						<?=$kode?><br><?=$nama?>
    					</label>
                        <br>
                        <br>
    				</td>
    				<td style="border:1px solid #000">
                        <br>
    					<label>
    						<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
    						<?=$kode?><br><?=$nama?>
    					</label>
                        <br>
                        <br>
    				</td>
    				<td style="border:1px solid #000">
                        <br>
                        <label>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?=$kode?>&amp;size=128x128"><br>
                            <?=$kode?><br><?=$nama?>
                        </label>
                        <br>
                        <br>
    				</td>
    			</tr>
    		<? } ?>
      </tbody>
    </table>
  </body>
</html>