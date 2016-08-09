<?php 
$title = "Welcome ".$posts['name'];
 include 'menubar.php';

ob_start(); 
echo $menu;
?>

<h1><?php echo "Welcome ".$posts['name']."!".'<br/> Generate Digifriends for any number'; ?></h1>
<div> Enter the X value!</div>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <input type="text" name="xval">
        <input name="xform" type="submit">               
    </form>
</div>
<?php $content = ob_get_clean(); 
include 'layout.php';