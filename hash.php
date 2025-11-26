<?php
// Buat hash dari password admin1234
$hash = password_hash('user@matrix.com', PASSWORD_BCRYPT);
echo $hash;
