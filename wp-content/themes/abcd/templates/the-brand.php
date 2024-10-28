<?php /* Template Name: the-brand.php */ ?>
<?php 
get_header();
$desc_top = get_field('desc_top');
$img = get_field('img');
$desc_bottom = get_field('desc_bottom');
?>
<style>
    .blocks .block:first-child {
        margin-top: 124px
    }

    .block-text-content {
        margin: 80px 0
    }

    .main-text-content h3,.main-text-content h1 {
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin: 0 0 24px
    }

    .main-text-content {
        max-width: 583px;
        margin: 0 auto;
        text-align: center;
        color: #000
    }

    .content-text-content {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px
    }

    .content-text-content p {
        margin-top: 0
    }

    .content-text-content p:last-child {
        margin: 0
    }

    .main-info {
        max-width: 1000px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        text-align: center
    }

    .main-info h3 {
        font-size: 10px;
        line-height: 20px;
        margin: 0;
        text-transform: uppercase;
        font-weight: 400;
        margin-bottom: 10px
    }

    .main-info .content {
        font-size: 12px;
        line-height: 20px;
        max-width: 350px
    }

    .main-info .item {
        margin: 0 45px
    }

    .block.block-info {
        margin-top: 124px
    }

    @media screen and (max-width: 950px) {
        .main-info .item {
            margin:0 20px
        }
    }

    @media screen and (max-width: 767px) {
        .main-info {
            flex-direction:column
        }

        .main-info h3 {
            font-size: 8px;
            margin-bottom: 8px;
            line-height: 15px
        }

        .main-info .content {
            font-size: 10px
        }

        .main-info .item {
            max-width: 228px;
            margin: 0 auto 40px
        }

        .content-text-content {
            font-size: 10px;
            line-height: 16px;
            letter-spacing: 0.24px;
            max-width: 320px;
            margin: 0 auto
        }

        .block-text-content {
            margin: 40px 0
        }

        .blocks .block:first-child {
            margin-top: 20px;
            margin-bottom: 42px
        }

        .block.block-info {
            margin-top: 52px
        }

        .main-text-content h3,.main-text-content h1 {
            margin: 0 0 40px
        }

        .block-image-full-width img {
            display: block
        }
    }

</style>
<div class="blocks">
    <div class="block block-text-content">
        <div class="container">
            <div class="main-text-content">
                <h1>
                    <?php the_title() ?>
                </h1>
                <div class="content-text-content" bis_skin_checked="1">
                    <p><?php echo $desc_top ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="block block-image-full-width">
        <img src="<?php echo $img ?>" alt="">
    </div>

    <div class="block block-text-content">
        <div class="container">
            <div class="main-text-content">
                <h3></h3>
                <div class="content-text-content">
                    <p><?php echo $desc_bottom ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>