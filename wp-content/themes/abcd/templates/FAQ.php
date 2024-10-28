<?php
/* Template Name: FAQ */
get_header();
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

    .main-faqs h2 {
        font-family: Helvetica Neue;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #000;
        margin-bottom: 40px
    }

    .item h3 {
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 16px;
        margin-top: 0;
        color: #000
    }

    .answer {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000
    }

    .item {
        margin-bottom: 40px
    }

    .main-faqs {
        max-width: 539px;
        margin: 0 auto
    }

    .block.block-faqs {
        margin-bottom: 160px
    }

    .block.block-faqs:last-child {
        margin: 0
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin:30px 0 64px
        }

        .main-faqs {
            max-width: 310px;
            margin: 0 auto;
            padding: 0 15px
        }

        .main-faqs h2 {
            font-size: 14px
        }

        .item h3 {
            font-size: 8px
        }

        .answer {
            font-size: 10px;
            line-height: 16px
        }

        .block.block-faqs {
            margin-bottom: 64px
        }
    }

</style>
<div class="page-faqs">
  <h1>
    <?php the_title() ?>
  </h1>
  <div class="blocks">

    <div class="block block-faqs">
      <div class="container">
        <div class="main-faqs">
        <?php the_content() ?>
        </div>
      </div>
    </div>


  </div>
</div>
<?php get_footer() ?>
