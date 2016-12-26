<?php global $coupon; ?>
<form name="supplier" id="validate" class="form" action="admin.php?do=coupon&act=<?=$_GET['act']=='add'?'addsm':'editsm'?>" method="post" enctype="multipart/form-data">
    <div class="widget">
        <div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
        </div>
        <div class="formRow">
            <label>Tên Coupon: <span class="req">*</span></label>
            <div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]"
                       value="<?=htmlspecialchars($coupon['name_vn'])?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Mã Coupon: <span class="req">*</span></label>
            <div class="formRight">
                <input type="text" name="code" id="code" class="tipS" value="<?=$coupon['code']?>" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Ngày hết hạn: <span class="req">*</span></label>
            <div class="formRight">
                <input type="text" name="end_date" id="end_date" class="tipS validate[required]"
                       value="<?= date("m/d/Y",$coupon['end_date']);?>" />
                <span class="formNote">Month / date / Year</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số tiền giảm (format: 200000) hoặc % giảm: <span class="req">*</span></label>
            <div class="formRight">
                <input type="text" name="sotiengiam" id="sotiengiam" class="tipS" value="<?=$coupon['sotiengiam']?>" />
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Kiểu giảm giá: <span class="req">*</span></label>
            <div class="formRight">
                <input type="text" name="coupontype" id="coupontype" class="tipS" value="<?=$coupon['coupontype']?>" />
                <span class="formNote">0: giảm theo số tiền / 1 giảm theo %</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Mô tả </label>
            <div class="formRight">
                <textarea rows="5"  name="desc_vn" ><?=$coupon['desc_vn']?></textarea>

            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label for="check1">Hiển thị</label>
            <div class="formRight">
                <input type="checkbox" name="active" id="check1" value="1" <?=($coupon['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" value="<?=$coupon['id']?>" />
                <input type="submit" class="blueB" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>