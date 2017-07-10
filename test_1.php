<?php

    $hash = md5('16' . 'SaLtaSd');
    $url = "http://penki.loc/user/login?hash=" . $hash;
    print "<a target=blank href=\"{$url}\">Login</a>";

    
    function generatePassword($length = 6)
    {
        $generate = function($length){
            $counterNum = 0;
            $counterChar = 0;
            $limit = ceil($length/2);

            $password = '';
            for ($i=0; $i<$length; $i++){
                $isNum = rand(0, 1);

                if ($isNum && $counterNum < $limit || $counterChar == $limit) {
                    $password .= rand(0, 9);
                    $counterNum++;
                } else {
                    $char = rand(0, 1) ? rand(ord('a'), ord('z')) : rand(ord('A'), ord('Z'));
                    $password .= chr($char);
                    $counterChar++;
                }
            }
            return $password;
        };

        return $generate($length);
    }

    var_dump(generatePassword(8));

    
