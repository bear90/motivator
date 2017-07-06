<?php

    $hash = md5('16' . 'SaLtaSd');
    $url = "http://penki.loc/user/login?hash=" . $hash;
    print "<a target=blank href=\"{$url}\">Login</a>";
