<?php

function backendBreacrum($data)
{
    $result = array();
    foreach ($data as $row) {
        if ($row[1] == '#') {
            $url = '<li><a class="text-muted" href="#">'.$row[0].'</a></li>';
        } elseif ($row[1] == '') {
            $url = '<li><a class="link-effect" href="#">'.$row[0].'</a></li>';
        } else {
            $url = '<li><a class="link-effect" href="'.site_url($row[1]).'">'.$row[0].'</a></li>';
        }
        array_push($result, $url);
    }

    return implode('', $result);
}

function DMYFormat($date)
{
    $date = date('d/m/Y', strtotime($date));

    return $date;
}

function YMDFormat($date)
{
    $date = date('Y-m-d', strtotime(str_replace('/', '-', $date)));

    return $date;
}

function MONTHFormat($date)
{
  Switch ($date){
    case 1 : $date="Januari";
        Break;
    case 2 : $date="Februari";
        Break;
    case 3 : $date="Maret";
        Break;
    case 4 : $date="April";
        Break;
    case 5 : $date="Mei";
        Break;
    case 6 : $date="Juni";
        Break;
    case 7 : $date="Juli";
        Break;
    case 8 : $date="Agustus";
        Break;
    case 9 : $date="September";
        Break;
    case 10 : $date="Oktober";
        Break;
    case 11 : $date="November";
        Break;
    case 12 : $date="Desember";
        Break;
    }
    return $date;
}

function permissionUserLoggedIn($session)
{
    if (!$session->userdata('logged_in')) {
         $session->set_flashdata('error', true);
         $session->set_flashdata('message_flash', 'Access Denied');
        redirect('musers/sign_in');
    }
}

function permissionUserLoggin($session)
{
    if ($session->userdata('logged_in')) {
         $session->set_flashdata('error', true);
         $session->set_flashdata('message_flash', 'Access Denied');
        redirect('home');
    }
}

function errorSuccess($session)
{
    if ($session->flashdata('error')) {
        return errorMessage($session->flashdata('message_flash'));
    } elseif ($session->flashdata('confirm')) {
        return succesMessage($session->flashdata('message_flash'));
    } else {
        return '';
    }
}

function errorMessage($message)
{
    return '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h3 class="font-w300 push-15">Error!</h3>
        <p style="display: grid;">'.$message.'</p>
      </div>';
}

function succesMessage($message)
{
  return '<div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h3 class="font-w300 push-15">Berhasil!</h3>
   	  <p style="display: grid;">'.$message.'</p>
    </div>';
}

function statusPermission($id)
{
    if ($id != '') {
        $data = array(
                  '1' => 'Administrator',
                  '2' => 'Pegawai',
                );

        return $data[$id];
    } else {
        return '';
    }
}

function RemoveComma($number, $delimiter = ',')
{
    return str_replace($delimiter, '', $number);
}
