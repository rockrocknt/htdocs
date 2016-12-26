<style>
    #categories li ul {
        display: block !important;
    }
</style>

    <!-- Categories -->
    <div class="widget margin-top-0">
        <h3 class="headline">DANH MỤC TIN TỨC</h3><span class="line"></span><div class="clearfix"></div>

        <ul id="categories">
            <?php
            global $db;
            $sql = "select * from `categories` where  `comp`=1 and `categories_displaytype_id`=1 and active=1";
            $listdanhmuc = $db->getAll($sql);
            for($i=0;$i<count($listdanhmuc);$i++)
            {
                $item = $listdanhmuc[$i];
                $link = "/t/".$item['unique_key_vn']."/";
                if ($item['unique_key_vn']=="t")
                {
                    $link = "/t/";
                }
                ?>
            <li><a href="<?=$link?>"><?=$item['name_vn']?></a></li>
            <?
            }
            ?>
        </ul>

    </div>
