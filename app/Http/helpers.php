<?php

function checkPermission($permissions){
    $userAccess = auth()->user()->role;
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}

function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'admin';
            break;
        case 2:
            return 'teacher';
            break;
        default:
            return 'student';
            break;
    }
}

?>