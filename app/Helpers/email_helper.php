<?php

function send_approv_spv($supp, $nosrt, $noref, $token, $email)
{
    // $to = json_encode($email);
    $to = "edp4@pt-api.com";
    // $cc = ['edp@pt-api.com', 'edp2@pt-api.com', 'edp3@pt-api.com', 'edp4@pt-api.com'];
    $email = \Config\Services::email();
    $sent = $email->setFrom('official@doiaja.com', 'CLAIM APP')
        ->setTo($to)
        ->setSubject('PENGAJUAN PENAMBAHAN KLAIM')
        ->setMessage('<h3>Pengajuan penambahan klaim yang masa berlaku programnya lebih dari 21 hari</h3><br><p>Pengirim :  ' . getusername() . '</p><p>Stock Point : ' . sp(sp_no()) . '</p><p>Supplier : ' . getsupp($supp) . '</p><p>No. Surat : ' . $nosrt . '</p><p>Proses : <a href="' . base_url() . '/debitnote/app_spv/' . $noref . '/' . $token . '" style="border:1px solid black; text-decoration:none; background-color:green; border-radius=5px; color:white; font-weight:bold;">Proses</a></p><br><br><small>*note : email ini otomatis </small>')
        ->setMailType('html')
        ->send();
    if (!$sent) {
        $print = $email->printDebugger();
        return $print;
    }
    return 1;
}
function send_approv_nsm($supp, $nosrt, $noref, $token, $sp)
{
    // $to = ['hendrabudiman@pt-api.com','amjabar@pt-api.com'];
    $to = "edp4@pt-api.com";
    // $cc = ['edp@pt-api.com', 'edp2@pt-api.com', 'edp3@pt-api.com', 'edp4@pt-api.com'];
    $email = \Config\Services::email();
    $sent = $email->setFrom('official@doiaja.com', 'WEB CLAIM APP')
        ->setTo($to)
        ->setSubject('PENGAJUAN PENAMBAHAN KLAIM')
        ->setMessage('<h3>Pengajuan penambahan klaim yang masa berlaku programnya lebih dari 21 hari</h3><br><p>Pengirim :  ' . getusername() . '</p><p>Stock Point : ' . sp($sp) . '</p><p>Supplier : ' . getsupp($supp) . '</p><p>No. Surat : ' . $nosrt . '</p><p>Proses : <a href="' . base_url() . '/debitnote/app_nsm/' . $noref . '/' . $token . '" style="border:1px solid black; text-decoration:none; background-color:green; border-radius=5px; color:white; font-weight:bold;">Proses</a></p><br><br><small>*note : email ini otomatis </small>')
        ->setMailType('html')
        ->send();
    if (!$sent) {
        $print = $email->printDebugger();
        return $print;
    }
    return 1;
}
