
<div class="product-tabs">
    <div class="controls-holder nav-tabs">
        <ul class="inline">
            <li class="active"><a data-toggle="tab" href="#description">Chi tiết sản phẩm</a></li>

        </ul>
    </div>

    <div class="tab-content">
        <div id="description" class=" active tab-pane ">
            <?php echo str_replace(DOMAIN, "", $product->getContent()); ?>
        </div>

        <div id="how-to-use" class=" tab-pane ">

        </div>

        <div id="reviews" class=" tab-pane ">


        </div>

    </div>
</div>
