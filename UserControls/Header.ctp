<? 
	global $FullUrl, $do, $sl, $Menu2, $cat1, $submenu, $lg, $logo; 
	
	$tongsanpham = cart::getQuatity();
?>

<div id="header-container">
  <div id="header">
    <div id="logo" class="floatleft"><a href="<?=$FullUrl?>/" title="<?=$logo["name_$lg"]?>"><img src="<?=$FullUrl;?>/<?=$logo["img"]?>" alt="<?=$logo["name_$lg"]?>" title="<?=$logo["name_$lg"]?>" width="200" /></a></div>
    <div class="highlight-1"><p><strong>Hotline Sài Gòn:</strong> 0932 034 899 anh Duy</p> <p><strong>Hotline Hà Nội:</strong> 0916 888 613 anh Hậu</p> <p><strong>Hotline Biên Hòa:</strong> 061 382 1809</p>
      <p>Dành cho khách mua số lượng lớn - 0906 951 303 anh Tuấn</p></div>
    <div id="cart" class="floatright">
      <p><strong><a href="<?=$FullUrl;?>/index.php?do=cart&amp;act=view&amp;lg=<?=$lg?>">Xem Giỏ hàng:</a></strong> Bạn có <strong><?=$tongsanpham?$tongsanpham:0;?></strong> Sản phẩm</p>
      <p>
      	<form onsubmit="return SearchGoogle();" action="#">
            <input type="text" id="key_search" value="Tìm kiếm..." onfocus="if (this.value == 'Tìm kiếm...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Tìm kiếm...';}" />
            <input type="button" value="Go" id="btn-search" onclick="SearchGoogle();" />
        </form>
      </p>
    </div>
  </div>
</div>