<?php
/* Template Name: Collections */

get_header();

?>
<style>
    #archive-collections .row {
        margin-left: -10px;
        margin-right: -10px
    }

    .image {
        position: relative;
        overflow: hidden;
        padding-top: 60%;
        width: 100%;
        margin-bottom: 10px
    }

    .image img {
        position: absolute;
        width: 100%;
        height: auto;
        top: 0;
        left: 0;
        right: 0
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

    a.item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
        color: #000;
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        text-transform: uppercase;
        text-decoration: none;
        margin-bottom: 50px
    }

    #archive-collections .col-6 {
        padding: 0 10px
    }

    .item h3 {
        font-weight: 500;
        margin: 0;
        font-size: 10px
    }

    a.item p {
        margin: 0
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin: 20px 0 40px
        }

        a.item {
            font-size: 8px;
            margin-bottom: 40px;
            padding: 0 20px
        }

        .item h3 {
            font-size: 8px
        }
    }

</style>
<main id="archive-collections" class="site-main">
    <div class="container">
        <h1>lespoir collection</h1>
        <div class="row">
          <?php
          $args = array(
              'post_type' => 'collection',
              'posts_per_page' => -1,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_status' => 'publish'
          );
          $query = new WP_Query($args);
          ?>
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post();
                    $gallery = get_field('gallery', get_the_ID());
                    $image = $gallery[0];
                    $location = get_field('location', get_the_ID());
                ?>
                  <div class="col-6">
                      <a class="item" href="<?php the_permalink(); ?>">
                          <div class="image">
                              <?php if(the_post_thumbnail()): ?>
                                  <img src="<?php the_post_thumbnail(); ?>"
                                       alt="">
                                <?php else: ?>
                                  <img src="<?= $image ?>"
                                       alt="">
                                <?php endif; ?>
                          </div>
                          <h3>
                                <?php the_title(); ?>
                          </h3>
                          <p>
                                <?php echo $location; ?>
                          </p>
                      </a>
                  </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer() ?>
