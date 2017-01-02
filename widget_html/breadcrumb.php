<?php $currentCat = currentCat(); ?>
<?php if ($currentCat['id'] == 151) return; ?>
<div class="breadcrumb-holder marginLessBreadCum">
    <div class="container">
        <ul class="inline bcrumb">
            <li>
                <a href="/">Trang chủ</a>
            </li>
            <?php echoBreadCumCat(1); ?>
        </ul>

        <?php if (isShowGridListOption()) : ?>
        <div class="grid-list-buttons">
            <ul class="inline">
                <li class="active"><a data-toggle="tab" href="#grid-view"><i class="icon-th-large"></i> Grid</a></li>
                <li><a data-toggle="tab" href="#list-view"><i class="icon-th-list"></i> List</a></li>

            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
function isShowGridListOption()
{
    global $do, $tpl;
    if ($do == 'products') {
        if ($tpl == 'list') {
            return true;
        }
    }
    return false;
}
function echoBreadCumCat($i)
{
    global $cat1;
    $currentCat = currentCat();
    if ($i == 1) {
        if (isset($cat1)) {
            if ($cat1['id'] == $currentCat['id']) {
            ?>
                <li class="active"><?php echo $cat1['name_vn']; ?></li>
            <?php
            }
            ?>
        <?php
        }
    }
}
?>