<?php
	global $db, $lg;

	$itemid = SafeFormValue("id");
	$table = SafeFormValue("table");
	$current = SafeFormValue("current");
	$step = Info::getInfoField("paging_comment");
	$end = $current+$step;
	
	$sql = "select * from comments where cmt_post_id=$itemid and cmt_do='$table' and cmt_active=1 and cmt_pid=0 order by cmt_id desc limit $current, $step";
	$cmtList = $db->getAll($sql);
	
	$sql = "select * from comments where cmt_post_id=$itemid and cmt_do='$table' and cmt_active=1 and cmt_pid=0";
	$totalCmt = $db->numRows($db->query($sql));
	
	if ($cmtList) { ?>
		<?php foreach($cmtList as $i=>$comment) {
            $comment = new comments($comment);
            $id = $comment->getID();
        ?>
        <li>
            <div class="cmt-info">
                <span class="cmt-author"><?=$comment->getAuthor()?></span>
                <span class="cmt-date">(<?=FormatDate($comment->getDate())?>)</span>
                <span class="cmt-reply">
                    <a id="active-rep-<?=$id?>" href='#' onclick="return ReplyCmt(<?=$id?>, <?=$itemid?>, '<?=$table?>', '<?=$lg?>')"><?=SITE_REPLY?></a>
                </span>
                 <span class="cmt-reply">
                    <a href='#' id="cancel-rep-<?=$id?>" style="display:none" onclick="return CancelRep(<?=$id?>)"><?=SITE_CANCEL?></a>
                </span>
            </div>
            <div><?=$comment->getContent()?></div>
            <div id="replay-on-<?=$id?>"></div>
            <?php if($comment->getHasChild() == 1) {
                    $commentchild = $comment->getChilds();				
                    if($commentchild) {
                ?>
                <ul class='cmt-childrens'>
                    <?php foreach($commentchild as $cmtchild) {
                            $cmtchild = new comments($cmtchild);
                        ?>
                    <li>
                        <div>
                            <span class="cmt-author"><?=$cmtchild->getAuthor()?></span>
                            <span class="cmt-date">(<?=FormatDate($cmtchild->getDate())?>)</span>
                        </div>
                        <div><?=$cmtchild->getContent()?></div>
                    </li>
                    <?php } ?>
                </ul>
            <?php }} ?>
        </li>
        <?php } ?>
        <?php if ($totalCmt > $end) { ?>
        <li class="viewmorecmt" style="text-align:center;"><a href="#" onclick="return viewMoreComment('<?=$itemid?>', '<?=$table?>', '<?=$end?>', '<?=$lg?>')"><?=VIEW_ORTHER_COMMENT?></a></li>
        <?php } ?>
	<?php }