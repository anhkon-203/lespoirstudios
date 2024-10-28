<?php
/* Template Name: ExchangePolicy */

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
        margin: 80px 0 24px
    }

    .main-text-content {
        color: #000;
        text-align: center;
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        max-width: 1194px;
        margin: 0 auto 160px
    }

    .top-table h3 {
        font-family: Helvetica Neue;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #000;
        margin: 0 0 5px
    }

    .top-table-content {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000
    }

    .head-table {
        display: flex;
        font-family: Helvetica Neue;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 8px;
        border-bottom: 1px solid #000;
        color: #000;
        padding-bottom: 8px;
        width: 100%
    }

    .col1 {
        min-width: 280px
    }

    .top-table {
        margin-bottom: 48px;
        width: 100%
    }

    .body-table {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000;
        width: calc(100% - 353px);
        padding-right: 70px
    }

    .main-table {
        display: flex;
        flex-wrap: wrap;
        align-items: start;
        margin-bottom: 64px
    }

    .item {
        display: flex;
        margin-bottom: 48px
    }

    .item:last-child {
        margin: 0
    }

    .bottom-table .col1 {
        font-family: Helvetica Neue;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #000
    }

    .bottom-table .col2 {
        font-family: Helvetica Neue;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0.24px;
        color: #000
    }

    .bottom-table {
        display: flex;
        margin-top: 64px
    }

    .main-table img {
        max-width: 353px
    }

    .main-text-content p {
        margin: 0
    }

    @media screen and (max-width: 767px) {
        h1 {
            margin-top:30px
        }

        .main-text-content {
            font-size: 10px;
            line-height: 16px;
            padding: 0 20px;
            margin-bottom: 50px
        }

        .main-text-content p {
            margin: 10px 0
        }

        .main-table img {
            max-width: 100%;
            order: 0;
            margin-bottom: 24px
        }

        .top-table {
            order: 1;
            margin-bottom: 10px
        }

        .head-table {
            order: 2;
            font-size: 8px
        }

        .body-table {
            order: 3;
            width: 100%;
            padding: 0;
            font-size: 10px;
            line-height: 16px
        }

        .bottom-table {
            order: 4;
            margin-top: 20px
        }

        .top-table h3 {
            font-size: 14px
        }

        .top-table-content {
            font-size: 10px;
            line-height: 16px
        }

        .col1 {
            min-width: 100px
        }

        .item {
            margin-bottom: 20px
        }

        .bottom-table .col1 {
            font-size: 14px;
            margin-top: 5px
        }

        .bottom-table .col2 {
            font-size: 10px;
            line-height: 16px
        }
    }

</style>
<div class="page-exchange">
  <h1>
    <?php the_title(); ?>
  </h1>
  <div class="blocks">

    <div class="block block-text-content">
      <div class="container">
        <div class="main-text-content">
                <?php the_content(); ?>
        </div>
      </div>
    </div>


  </div>
</div>
<?php get_footer() ?>
