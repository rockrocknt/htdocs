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
                                        <img alt="<?php echo $name; ?>" src="/<?php echo $imgName; ?>" />
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
                            $catMenu = new Categories(Categories::getById($cid));
                            $name = $img['name_vn'];
                            $link = $catMenu->getLink();

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
                    <ul class="inline top-cat-menu">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <?php

                        $listMenu = ImagesGroup::getimgbycid(16);
                        foreach ($listMenu as $img) {
                        $cid = $img['category_id'];
                        $catMe = Categories::getById($cid);
                        $link = $img['url_vn'];
                        if (!empty($catMe)) {
                            $catMenu = new Categories(Categories::getById($cid));
                            $link = $catMenu->getLink();
                        }
                        $name = $img['name_vn'];
                        ?>
                            <li
                                <?php if (($currentCat['pid'] == $catMenu->getID()) || ($currentCat['id'] == $catMenu->getID())): ?>
                                    active
                                <?php endif; ?>
                                >
                                <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>

                    <select class="top-cat-menu dropdown">
                        <option value="products-grid.html">
                            FACE
                        </option>


                        <option value="products-grid.html">
                            BODY
                        </option>
                        <option value="products-grid.html">
                            MAKE UP
                        </option>
                        <option value="products-grid.html">
                            HAIRS
                        </option>
                        <option value="products-grid.html">
                            PERFUMES
                        </option>
                        <option value="products-grid.html">
                            GIFTS
                        </option>
                        <option value="products-grid.html">
                            BRANDS
                        </option>

                        <option value="products-grid.html">
                            MUST HAVE
                        </option>



                    </select>
                </div>
                <div class="span3">
                    <div class="search-field-holder">
                        <form>
                            <input class="span12" type="text" placeholder="Type and hit enter">
                            <i class="icon-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "widget_html/breadcrumb.php"; ?>
</section>
