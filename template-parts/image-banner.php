<?php
if ($args['image_url']) {?>
    <div style="display: flex; flex-direction: column; max-height: 400px; justify-content: flex-end; overflow:hidden; position: relative">
        <img style="width: 100%; height: auto; display: block;" src="<?php echo(esc_url($args['image_url'])) ?>" alt="">
        <div class="myWord" style="width: 100%; text-align:center; color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 7vw"><?php echo $args['text']?></div>
    </div>
<?php }
?>