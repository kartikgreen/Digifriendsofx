<?php

// model.php
function open_database_connection()
{
$link = new PDO("mysql:host=localhost;dbname=digifriends", 'root', '');
// set the PDO error mode to exception
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $link;
}
function close_database_connection(&$link)
{
$link = null;
}
//this is a fuction called from controller function called welcome
function user_detail($uid)
{
$link = open_database_connection();
$uid = intval($uid);
$result = $link->query('SELECT uid, name FROM user WHERE uid = '.$uid);
$row = $result->fetch(PDO::FETCH_ASSOC);
close_database_connection($link);
return $row;
    
}

//this is a fuction called from controller function called show_current_digifriends

function get_digifriends_by_id($id)
{
$link = open_database_connection();
$id = intval($id);
$result = $link->query("SELECT digifriends_num, xvalue  FROM digifriends WHERE uid ='$id'ORDER BY did DESC LIMIT 1");
$row = $result->fetch(PDO::FETCH_ASSOC);
close_database_connection($link);
return $row;
}
// computing the digifriends for x value and returned back to the function insertxval()
function calculate_digifriends($xvalue)
{
$ans=array();
$x=$xvalue;
$ans[1]=$x*2;
$ans[2]=$x;
$n=1;
for($i=3; $i<=14; $i++ )
{
  $y= $i-1;
  $ans[$i]=$ans[$y]+(8*$n);
  $i++;
  $y++;
  $ans[$i]=$ans[$y]-6;
  $i++;
  $y++;
  $ans[$i]=$ans[$y]-4;
  $i++;
  $y++;
  $ans[$i]=$ans[$y]-6;
  $n++;  
}  
$answer= implode(",", $ans);

return $answer;
}

// insert the data and the feedback is sent to the controller function process()
function insertxval($val)
{
$link = open_database_connection();
$xvalue = intval($val);
$uid=1;
$digfr= calculate_digifriends($xvalue);
$date=date("Y-m-d");
// prepare sql and bind parameters
    $stmt = $link->prepare("INSERT INTO digifriends (uid, xvalue, digifriends_num, date) 
    VALUES (:uid, :xvalue, :digifriends_num, :date)");
    $stmt->bindParam(':uid', $uid);
    $stmt->bindParam(':xvalue', $xvalue);
    $stmt->bindParam(':digifriends_num', $digfr);
    $stmt->bindParam(':date', $date);

    $stmt->execute();
    close_database_connection($link);
    return 'New records created successfully';
    
}
//called from processxnz() to process the final result for user added X and Z value or only X value
function check_xandz($val1,$val2,$val3)
{
$link = open_database_connection();
$id = $val3;
$result = $link->query("SELECT digifriends_num, xvalue  FROM digifriends WHERE uid ='$id' AND xvalue='$val1'");
$row = $result->fetch(PDO::FETCH_ASSOC);
close_database_connection($link);


$count = $result->rowCount();
if($count>0)
{
    if($val2>0)
    {
        
        
     $exdigfri=$row['digifriends_num'];
     $digfri= explode(",", $exdigfri);  
     if (in_array("$val2", $digfri))
     {
       return 'This combination exists'; 
     }
     else
      {
       return 'This combination Does not exists'; 

      }
     
    }
 else
 {
     return $row['digifriends_num'];   
 }

    
}
else{
  return 'No Digifriends found for the x value';
 }
  

}