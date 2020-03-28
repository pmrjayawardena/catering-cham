<?php if(count($images)): ?>

<?php foreach ($images as $img ):?>
<img src="<?php echo $img->avatar; ?>">
<?php endforeach;;?>

<?php else:?>
<p>No image found</p>
<?php endif;?>

