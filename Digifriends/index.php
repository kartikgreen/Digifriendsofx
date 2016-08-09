<?php
// index.php
// load and initialize global libraries
require_once 'model.php';
require_once 'controllers.php';
// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//route to show the welcome page and form to add x entries

if ($uri === '/digifriends/') 
{
    $uid=1;
    welcome($uid);
} 
    
// when form is posted to add X value
elseif ($uri === '/digifriends/index.php'   && isset($_POST['xform']))
    {
      process($_POST['xval']);
    } 
    

// when form is posted to find either x or x and z value
    elseif ($uri === '/digifriends/index.php'   && isset($_POST['xval']))
    {
        if(!empty($_POST['zval']) && ($_POST['zval'] ))
        {
           $zval=$_POST['zval']; 

        }
        else
        {
           $zval=0; 
        }            
               
        processxnz($_POST['xval'],$zval,$_POST['hval'] );
          
    } 
//For displying the current digifriends for the x value added recently
elseif ($uri === '/digifriends/index.php'   && isset($_GET['id']))
    {
       show_current_digifriends($_GET['id']);
    } 
    

//route to show the form to find x or both x and z value
    elseif ($uri === '/digifriends/index.php'   && isset($_GET['cid']))
    {
       show_check_form($_GET['cid']);
    } 
    
else 
    {
      header('HTTP/1.1 404 Not Found');
      echo '<html><body><h1>404 Error ! Page Not Found!</h1></body></html>';
     }
