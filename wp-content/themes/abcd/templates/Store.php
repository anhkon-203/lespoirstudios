<?php
/* Template Name: Store */
get_header();
$location_store_group = get_field('location_store_group');
if ($location_store_group) {
    $img_location = $location_store_group['img'];
    $name_store = $location_store_group['name_store'];
    $location = $location_store_group['location'];
    $location_detail = $location_store_group['location_detail'];
}
$gallery = get_field('gallery');
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

    .top-location {
        height: 100vh;
        background-size: cover;
        background-position: center
    }

    .top-location .container {
        display: flex;
        justify-content: end;
        align-items: end;
        height: 100%
    }

    .head-top-location .name {
        font-family: Helvetica Neue;
        font-size: 16px;
        font-style: normal;
        line-height: normal;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #000;
        font-weight: 500
    }

    .name-location {
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #000
    }

    .main-top-location {
        background-color: #fff;
        min-width: 510px;
        padding: 16px;
        margin-bottom: 20px
    }

    .head-top-location {
        display: flex;
        justify-content: space-between;
        margin-bottom: 60px
    }

    .content-location {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000
    }

    .location {
        margin-bottom: 20px
    }

    .has_padding {
        padding: 0 20px
    }

    .images img {
        margin-bottom: 20px;
        display: block
    }

    .show_mobile {
        display: none
    }

    @media screen and (max-width: 1024px) {
        .top-location {
            height:100%;
            min-height: 600px;
            display: flex;
            align-items: end;
            justify-content: end
        }

        .top-location .container {
            margin-right: 0
        }
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin:20px 0 64px
        }

        .show_mobile {
            display: block
        }

        .top-location {
            min-height: auto;
            height: auto;
            background-image: unset!important
        }

        .top-location .container {
            flex-direction: column;
            padding: 0
        }

        .main-top-location {
            min-width: 100%;
            margin-bottom: 0
        }

        .head-top-location .name {
            font-size: 14px
        }

        .head-top-location {
            margin-bottom: 80px
        }

        .name-location {
            font-size: 8px
        }

        .content-location {
            font-size: 10px;
            line-height: 16px
        }

        .has_padding {
            padding: 0 16px
        }

        .images img {
            margin-bottom: 16px
        }
    }

</style>
<div class="page-store-location">
  <h1>Stores</h1>
  <div class="location">
    <div class="top-location" style="background-image: url(<?php echo $img_location ?>)">
      <div class="container">
        <img class="show_mobile" src="<?php echo $img_location ?>" alt="">
        <div class="main-top-location">
          <div class="head-top-location">
            <div class="name">
                <?php echo $name_store ?>
            </div>
            <div class="name-location">
                <?php echo $location ?>
            </div>
          </div>
          <div class="content-location">
                <?php echo $location_detail ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="images">
      <?php foreach($gallery as $img): ?>
          <div class="has_padding">
              <img src="<?php echo $img ?>" alt="">
          </div>
        <?php endforeach; ?>
  </div>
</div>
<?php get_footer() ?>
