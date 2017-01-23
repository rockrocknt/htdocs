<ul class="inline top-cat-menu">
    <li>
        <a href="/">Trang chủ</a>
    </li>
    <?php

    $listMenu = ImagesGroup::getimgbycid(16);
    foreach ($listMenu as $img) {
        $cid = $img['category_id'];
        $catMe = Categories::getById($cid);
        $link = $img['url_vn'];
        if (empty($catMe)) continue;
        if (!empty($catMe)) {
            $catMenu = new Categories(Categories::getById($cid));
            $link = $catMenu->getLink();
        }
        $name = $img['name_vn'];
        ?>
        <li
            <?php if (($currentCat['pid'] == $catMenu->getID()) || ($currentCat['id'] == $catMenu->getID())): ?>
                class="active"
            <?php endif; ?>
            >
            <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
        </li>
    <?php
    }
    ?>

</ul>
<select class="top-cat-menu dropdown">
    <option value="/">
        Trang chủ
    </option>
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
        <option
            <?php if (($currentCat['pid'] == $catMenu->getID()) || ($currentCat['id'] == $catMenu->getID())): ?>
                selected="selected"
            <?php endif; ?>
            value="<?php echo $link; ?>">
            <?php echo $name; ?>
        </option>
    <?php
    }
    ?>
</select>