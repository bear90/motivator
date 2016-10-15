<?php

    $hash = md5('97' . 'SaLtaSd');
    $url = "http://motivator.loc/user/login?hash=" . $hash;
    print "<a target=blank href=\"{$url}\">логин</a>";