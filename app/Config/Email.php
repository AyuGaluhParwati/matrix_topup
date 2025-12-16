<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // ================= PENGIRIM =================
    public string $fromEmail = 'agunggaluh16@gmail.com'; // email gmail kamu
    public string $fromName  = 'MTRIX Support';

    // ================= SMTP =================
    public string $protocol = 'smtp';

    public string $SMTPHost = 'smtp.gmail.com';
    public string $SMTPUser = 'agunggaluh16@gmail.com'; // email gmail kamu
    public string $SMTPPass = 'zffq pgfi rpfk qgdp';     // WAJIB App Password
    public int    $SMTPPort = 587;
    public string $SMTPCrypto = 'tls';

    // ================= FORMAT EMAIL =================
    public string $mailType = 'html';
    public string $charset  = 'UTF-8';

    // ================= KONFIG TAMBAHAN =================
    public int $SMTPTimeout = 10;
    public bool $SMTPKeepAlive = true;

    public bool $wordWrap = true;
    public int  $wrapChars = 76;

    public string $CRLF    = "\r\n";
    public string $newline = "\r\n";

    public bool $validate = false;
    public int  $priority = 3;
}
