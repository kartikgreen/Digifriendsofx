<?php 
$title = "Result Page";
 include 'menubar.php';

ob_start(); 
echo $menu;

?>
<h1><?php echo "Output:"; ?></h1>
<div class="body">
<?php print_r($result); ?>
</div>

<?php $content = ob_get_clean(); 
include 'layout.php';