<?php
$this->title = $object->title;
$this->registerMetaTag(['name' => 'description', 'content' => $object->description]);
?>
<div class="body-content">

    <div class="object-cover">
        <?php
            echo '<div class="object-title"><h1>'.$object->title.'</h1></div>';
            echo '<div class="object-description">'.$object->description.'</div>';
        ?>
    </div>
    
</div>