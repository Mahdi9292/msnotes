<?php

function has_access ($access, $targetAccess){
    return strhas($access, "|$targetAccess|") ? true :  false;
}


function get_access_name(){

    if(isGuest()){
        return "Guest";
    }
    $access = $_SESSION['access'];
    $accessName = "";



    if(isSuperAdmin()){
        $accessName .= "," . "Super Administrator";
    }elseif (isAdmin()){
        $accessName .= "," . "Administrator";
    }

    if(isVip()){
        $accessName .= "," . "VIP User";
    }elseif (isUser()){
        $accessName .= "," . "Limited User";
    }

    if(isVipAuthor()){
        $accessName .= "," . "VIP Author";
    }elseif (isAuthor()){
        $accessName .= "," . "Author";
    }


    return $accessName;
}

function isAdmin(){
    if (isGuest()){return false;}
    $access = $_SESSION['access'];
    if (has_access($access,"admin") || has_access($access, 'superadmin')){
        return true;
    }
    return false;

}

function isSuperAdmin(){
    if (isGuest()){return false;}
    $access = $_SESSION['access'];
    if (has_access($access, 'superadmin')){
        return true;
    }
    return false;

}

function isAuthor(){
    if (isGuest()){return false;}
    $access = $_SESSION['access'];
    if (has_access($access, 'author')){
        return true;
    }
    return false;

}

function isVipAuthor(){
    if (isGuest()){return false;}
    $access = $_SESSION['access'];
    if (has_access($access, 'vipauthor')){
        return true;
    }
    return false;

}

function isVip(){
    if (isGuest()){return false;}
    $access = $_SESSION['access'];
    if (has_access($access, 'vip')){
        return true;
    }
    return false;

}

function isUser()
{
    return isset($_SESSION['access']) ? true : false;
}

function isGuest()
{
    return !isset($_SESSION['access']) ? true : false;
}

function grantSuperAdmin()
{
    if (!isSuperAdmin()) {
        echo "Forbidden";
        exit;
    }
}

function grantAdmin(){
    if (!isAdmin()){
        echo "Forbidden";
        exit;
    }
}