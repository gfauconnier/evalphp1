<?php

function check_date($deadline)
{
    if (preg_match('#^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$#', $deadline)) {
        $deadline = substr($deadline, 6).'/'.substr($deadline, 3, 3).substr($deadline, 0, 2);


        $deadline = new DateTime($deadline);
        $now = getdate();
        $now = $now['year'] . '/' . $now['mon'] . '/' . $now['mday'];
        $now = new DateTime($now);

        if ($deadline > $now) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
