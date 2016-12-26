<form name="supplier" id="validate" 

class="form" action="admin.php?do=images&act=addMultiImage&cid=<?=$_GET['cid']?>&type=<?=$_GET['type']?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>
<?=(isset($_GET['article_id'])?'&article_id='.$_GET['article_id']:'')?>
<?=(isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:'')?>"
 method="post" enctype="multipart/form-data">

<h1><?php 
if (!empty($product)) {
    echo $product['name_vn'];
}
 ?></h1><br/><br/>
  Select images: 
  <input type="file" name="img[]" multiple>
  <input type="submit">
  
</form>

<?php 
return;
 if ($_GET['act'] == 'add') { ?>
    <script type="text/javascript" src="plupload/js/plupload.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.gears.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.silverlight.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.flash.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.browserplus.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.html4.js"></script>
    <script type="text/javascript" src="plupload/js/plupload.html5.js"></script>
    <script type="text/javascript" src="plupload/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

    <form  method="post"
        <?php if (getquery('cid') != "") { ?>
            action="admin.php?do=images&act=addmulti<?=(isset($_GET['cid'])?'&cid='.$_GET['cid']:'')?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>&type=<?=$_GET['type']?>"
        <?php
        }
        if (getquery('product_id') != "")
        {
            ?>
            action="admin.php?do=images&act=addmulti<?=(isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:'')?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>&type=<?=$_GET['type']?>"
        <?
        }
        if (getquery('article_id') != "") { ?>
            action="admin.php?do=images&act=addmulti<?=(isset($_GET['article_id'])?'&article_id='.$_GET['article_id']:'')?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>&type=<?=$_GET['type']?>"
        <?php
        }
        ?>


        >
        <div id="uploader">
            <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
        <input type="submit" value="Hoàn tất" class="blueB" style="margin-top:10px;" />
    </form>

    <style type="text/css">
        .plupload_file_name { background:none !important; width:700px !important;}
        .plupload_add span, .plupload_start span { padding:0;}
    </style>
    <script type="text/javascript">
        // Convert divs to queue widgets when the DOM is ready
        $(function() {
            $("#uploader").plupload({
                // General settings
                runtimes : 'flash,html5,browserplus,silverlight,gears,html4',
                url : 'plupload/upload.php',
                max_file_size : '1000mb',
                max_file_count: 20, // user can add no more then 20 files at a time
                chunk_size : '1mb',
                unique_names : true,
                multiple_queues : true,

                // Resize images on clientside if we can
                resize : {width : 1200, height : 900, quality : 100},

                // Rename files by clicking on their titles
                rename: true,

                // Sort files
                sortable: true,

                // Specify what files to browse for
                filters : [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip,avi"}
                ],

                // Flash settings
                flash_swf_url : 'plupload/js/plupload.flash.swf',

                // Silverlight settings
                silverlight_xap_url : 'plupload/js/plupload.silverlight.xap'
            });

            // Client side form validation
            $('form').submit(function(e) {
                var uploader = $('#uploader').plupload('getUploader');

                // Files in queue upload them first
                if (uploader.files.length > 0) {
                    // When all files are uploaded submit form
                    uploader.bind('StateChanged', function() {
                        if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                            $('form')[0].submit();
                        }
                    });

                    uploader.start();
                } else
                    alert('You must at least upload one file.');

                return false;
            });


        });
    </script>
<? } else {
    global $image;
    $temp = Info::getInfoField('showlanguage');
    $showEnglish = $temp==1?'':'style="display:none;"';
    ?>
    <form name="supplier" id="validate" class="form" action="admin.php?do=images&act=<?=$_GET['act']=='addone'?'addsm':'editsm'?>&cid=<?=$_GET['cid']?>&type=<?=$_GET['type']?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>
<?=(isset($_GET['article_id'])?'&article_id='.$_GET['article_id']:'')?>
<?=(isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:'')?>
" method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
                <h6>Nhập dữ liệu</h6>
            </div>
            <div class="formRow">
                <label>Tên VN: <span class="req">*</span></label>
                <div class="formRight">
                    <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($image['name_vn'])?>" />
                    <span class="formNote">Nhập tên ảnh hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow ">
                <label>ID danh mục <br> :</label>
                <div class="formRight">
                    <input original-title="" name="category_id" id="category_id" class="tipS" value="<?=$image['category_id']?>" type="text">
                    <span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Xem category id </label>
                <div class="formRight">
                    <select>
                        <?php
                        global $db;
                        //    $sql = "select name_vn,id from categories where ((pid=121) and (comp=2 or comp=30 or comp=5)) order by name_vn asc";
                        $sql = "select name_vn,id from categories where ((pid=121) ) order by name_vn asc";
                        $list = $db->getAll($sql);
                        ?>
                        <? for($i=0;$i<count($list);$i++)
                        {?>
                            <option><? echo $list[$i]["name_vn"]." -- ".  $list[$i]["id"]?></option>
                        <?
                        }?>
                    </select>
                    <span class="formNote">Dùng để xem category id ko có tác dụng gì </span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Link VN: <span class="req">*</span></label>
                <div class="formRight">
                    <input type="text" name="url_vn" id="url_vn" class="tipS" value="<?=$image['url_vn']?>" />
                    <br/>(dùng cho Danh con của menu left trong trang cat productlist & tin tức.)
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Link YouTube<br/>

                    : <span class="req">*</span></label>
                <div class="formRight">
                    <input type="text" name="youtube_url" id="youtube_url" class="tipS" value="<?=$image['youtube_url']?>" />
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Mô tả </label>
                <div class="formRight">
                    <textarea rows="5"  name="desc_vn" ><?=$image['desc_vn']?></textarea>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Background color code<br/>(dùng cho banner nhỏ): </label>
                <div class="formRight">
                    <input type="text" name="colorbg_code" id="colorbg_code" class="tipS" value="<?=$image['colorbg_code']?>" />
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" <?=$showEnglish?>>
                <label>Tên EN:</label>
                <div class="formRight">
                    <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($image['name_en'])?>" />
                    <span class="formNote">Nhập tên ảnh hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Tải file ảnh:</label>
                <div class="formRight">
                    <? if($_GET['act'] == 'edit' && file_exists($image["img_vn"])) { ?>
                        <img src="<?=$image["img_vn"]?>" width="200" alt="" />
                        <a href="admin.php?do=images&act=delete_img&id=<?=$image['id']?>&img_del=img&cid=<?=$_GET['cid']?>&type=<?=$_GET['type']?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                        <br />
                    <? } ?>
                    <input type="file" id="file" name="img_vn" />
                    <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải file (ảnh JPEG, GIF , JPG , PNG), nếu là flash thì đuôi là .swf">
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label for="check1">Hiển thị</label>
                <div class="formRight">
                    <input type="checkbox" name="active" id="check1" value="1"
                        <?=($image['active']==1 || $_GET['act']=='addone')?'checked="checked"':''?>
                        />
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Số thứ tự: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$image['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của ảnh, chỉ nhập số">
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <div class="formRight">
                    <input type="hidden" name="id" value="<?=$image['id']?>" />
                    <input type="submit" class="blueB" value="Hoàn tất" />
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>
<? } ?>