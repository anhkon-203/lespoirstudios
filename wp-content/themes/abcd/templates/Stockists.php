<?php
/* Template Name: Stockists */
get_header();
$re_stock = get_field('re_stock');
?>
<style>
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

    .items-locations h3 {
        font-family: 'Helvetica Neue Neue',sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        border-bottom: 1px solid #000;
        margin-bottom: 15px;
        padding-bottom: 5px;
        margin-top: 0;
        width: 100%;
        color: #000
    }

    .items-locations {
        display: flex;
        flex-wrap: wrap;
        align-items: start;
        justify-content: space-between
    }

    .items-locations img {
        width: 353px;
        height: auto
    }

    .items-locations .item {
        display: flex;
        margin-bottom: 48px
    }

    .items-locations .items {
        width: calc(100% - 353px)
    }

    .address {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000;
        padding-right: 15px;
        width: 40%
    }

    .shop_name {
        color: #000;
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        width: 30%
    }

    .country {
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        width: 30%;
        color: #000
    }

    .items-locations .item:last-child {
        margin-bottom: 32px
    }

    @media screen and(max-width: 1024px) {
        .items-locations .items {
            width:70%
        }

        .items-locations img {
            width: 30%
        }
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin:20px 0 64px
        }

        .items-locations img {
            width: 100%;
            order: 0;
            margin-bottom: 24px
        }

        .items-locations h3 {
            font-size: 14px;
            order: 1;
            padding-bottom: 4px;
            margin-bottom: 16px
        }

        .items-locations .items {
            width: 100%;
            order: 2
        }

        .country,.shop_name {
            font-size: 8px;
            padding-right: 10px
        }

        .address {
            font-size: 10px;
            padding: 0
        }

        .items-locations .item {
            margin-bottom: 16px
        }
    }

</style>
<div class="page-locations">
  <div class="container">
    <h1>
        <?php the_title(); ?>
    </h1>

    <div class="locations">
      <?php
      foreach ($re_stock as $location) {
        $continent = $location['continent'];
        $nationals = $location['re_national'];
        ?>
          <div class="items-locations">
              <h3><?php echo htmlspecialchars($continent); ?></h3>
              <div class="items">
                <?php foreach ($nationals as $national) : ?>
                    <div class="item">
                        <div class="country">
                          <?php echo htmlspecialchars($national['name_national']); ?>
                        </div>
                        <div class="shop_name">
                        </div>
                        <div class="address">
                          <?php echo htmlspecialchars($national['detail_location']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php
                for ($i = count($nationals); $i < 3; $i++) : ?>
                    <div class="item">
                        <div class="country"></div>
                        <div class="shop_name"></div>
                        <div class="address"></div>
                    </div>
                <?php endfor; ?>
              </div>
              <img src="<?php echo htmlspecialchars($nationals[0]['img']); ?>" alt="">
          </div>
        <?php
      }
      ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>
