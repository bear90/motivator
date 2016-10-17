<?php

    $hash = md5('95' . 'SaLtaSd');
    $url = "http://motivator.loc/user/login?hash=" . $hash;
    print "<a target=blank href=\"{$url}\">логин</a>";