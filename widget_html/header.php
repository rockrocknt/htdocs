<?php $currentCat = currentCat(); ?>
<section class="section-head">
    <div class="container">
        <div class="row-fluid top-row">
            <div class="span4">
                <div class="logo">

                                <span class="icon">
                                    <?php
                                    $listMenu = ImagesGroup::getimgbycid(27);
                                    foreach ($listMenu as $img) {
                                    $imgName = $img['img_vn'];
                                    $name = $img['name_vn'];
                                    ?>
                                        <a href="/">
                                        <img alt="<?php echo $name; ?>" src="/<?php echo $imgName; ?>" />
                                        </a>
                                    <?php
                                        break;
                                    } ?>

                                </span>
                </div>




            </div>
            <div class="span8">


                <div class="top-menu cart-menu">
                    <ul class="inline">
                        <?php
                        $listMenu = ImagesGroup::getimgbycid(19);
                        foreach ($listMenu as $img) {
                            $cid = $img['category_id'];
                            //$catMenu = new Categories(Categories::getById($cid));
                            $name = $img['name_vn'];
                           // $link = $catMenu->getLink();
                            $link = $img['url_vn'];

                            ?>
                            <li>
                                <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
                            </li>
                        <?php
                        }
                        ?>


                        <li>
                            <div class="basket">
                                <?php
                                $sp = cart::getQuantity();
                                ?>
                                <div class="basket-item-count">
                                    <?=$sp?>
                                </div>
                                <div class="total-price-basket">

                                    <?=$sp?>&nbsp;S.Phẩm
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-hover="dropdown" href="#">
                                        <img alt="basket" src="/images/icon-basket.png" />
                                    </a>
                                    <?php include "widget_html/header_cart.php"; ?>

                                </div>

                            </div>
                        </li>

                    </ul>


                </div>
            </div>
        </div>


    </div>

    <div class="top-categories">
        <div class="container">
            <div class="row-fluid">
                <div class="span9">
                    <?php include "widget_html/menuMain.php"; ?>
                </div>
                <div class="span3">
                    <div class="search-field-holder">
                        <form>
                            <input class="span12" type="text" placeholder="Bạn muốn tìm sản phẩm gì...">
                            <i class="icon-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "widget_html/breadcrumb.php"; ?>
</section>
