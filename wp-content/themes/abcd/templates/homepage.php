<?php /* Template Name: Homepage */ ?>
<?php 
get_header();
$img_desktop_mobile = get_field('img_desktop_mobile');
$img_desktop = get_field('img_desktop');
$img_mobile = get_field('img_mobile');
?>
<div class="blocks">

<div class="block block-image-full-width desktop_mobile">
    <div class="container-full">
        <img src="<?php echo $img_desktop_mobile ?>" alt="">
    </div>
</div>

<div class="block block-image-full-width desktop">
    <div class="container-full">
        <div class="row">
            <?php foreach($img_desktop as $key => $img):
                if($key == 3) break;
              ?>
                <div class="col-4">
                    <img src="<?php echo $img ?>" alt="">

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="block block-image-full-width desktop">
    <div class="container-full">
        <div class="row">
            <?php foreach($img_desktop as $key => $img):
                if($key < 3) continue;
              ?>
                <div class="col-6">
                    <img src="<?php echo $img ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="block block-image-full-width mobile">
    <div class="container-full">
        <img src="<?php echo $img_mobile ?>" alt="">
    </div>
</div>

</div>

<?php get_footer() ?>