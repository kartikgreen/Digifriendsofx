<?php 
$title = "Digifriends for the current X";
 include 'menubar.php';

ob_start(); 
echo $menu;

?>
<h1>
    <?php echo " <u>Option 1:</u><br/>Check X and Y combination <br/>
    Note: This is to find if Z is present in the digifrends of one of the X values that has been generated so far<br/>
    <u>Option 2:</u><br/> Enter only X value<br/>
    Note:This is to see the digifriends of the X value that has been generated so far"; ?>
</h1>
<div> Enter the X & Z value or only the value of X!</div>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <input type="text" name="xval" placeholder="Enter X value">
        <br/>
        <input type="text" name="zval" placeholder="Enter Z value">
        <input type="hidden" value="<?php echo $_GET['cid'];?>" name="hval" >
        <br/>
        <input name="xnzform" type="submit" >               
    </form>
</div>

<?php $content = ob_get_clean(); 
include 'layout.php';