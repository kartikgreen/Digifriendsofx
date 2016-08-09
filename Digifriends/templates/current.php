<?php 
$title = "Digifriends for the current X";
 include 'menubar.php';

ob_start(); 
echo $menu;

?>
<h1><?php echo "Your recent digifriends generated for the number ".$post['xvalue'].' is' ?></h1>
<div class="body">
    
<?php 
echo $post['digifriends_num'] ?>
</div>
<?php $content = ob_get_clean(); 
include 'layout.php';