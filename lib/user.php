<?php
function check_login($username, $password)
{
    global $list_users;
    foreach ($list_users as $user) {
        if ($username == $user['username'] and md5($password) == $user['password']) {
            return true;
        }
    }
    return false;
}
