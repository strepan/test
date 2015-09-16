<?php

return array(

    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => array('address' => 'estrepan@gmail.com', 'name' => 'Yevhen Strepan'),
    'encryption' => 'tls',
    'username' => 'estrepan',
    'password' => 'lpylywfiartbkzxs',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

);