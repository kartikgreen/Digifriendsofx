<?php
//assuming the user id with 1 is the current user logged in
function welcome($uid)
{
//To get the user detail in the welcome page
$posts = user_detail($uid);
require 'templates/user.php'; 
    
}



// controller function to insert the user entered x value from the form
function process($val)
{
    $result= insertxval($val);
    require 'templates/result.php';

}

// controller function to fetch the user entered x and y value or only x value from the form

function processxnz($val1, $val2, $val3)
{
    $result= check_xandz($val1,$val2, $val3);

require 'templates/result.php';


}


//This is for displaying the recent digifriends of x entered by the user
function show_current_digifriends($id)
{
$post = get_digifriends_by_id($id);
require 'templates/current.php';
}


//Form to check the x and z value or only x
function show_check_form($cid)
{
require 'templates/check.php';
}