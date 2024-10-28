<?php
get_header();
// field
$gallery = get_field('gallery');

?>
<style>
    .item.col2 {
        display: flex
    }

    h1 {
        color: #000;
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        text-align: center;
        margin: 124px 0 164px
    }

    .item {
        margin-bottom: 50px
    }

    .item.col2 a {
        width: 50%
    }

    .item img {
        display: block
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin:30px 0 64px
        }

        .site-main .container {
            padding: 0
        }

        .item {
            margin-bottom: 5px
        }
    }

    @media screen and (max-width: 480px) {
        .item.col2 {
            display:block
        }
    }

</style>
<main id="primary" class="site-main">
  <div class="container">
    <h1>
      <?php the_title() ?>
    </h1>
    <div class="images">
        <?php foreach ($gallery as $item) :
          ?>
            <div class="item col1">
                <a href="javascript:void(0)">
                    <img src="<?= $item ?>" alt="">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
