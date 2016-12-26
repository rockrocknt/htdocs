<? global $lg, $FullUrl, $member; ?>

<? if (isset($_SESSION["member_login"])) { ?>

    <div class="wp">
        <div class="user-content">
            <h3>
                <a href="#" >
                    Tài khoản của bạn
                </a>
            </h3>
            <p>
                Donk, Chào mừng bạn đã đến với tài khoản của bạn tại Partyshop.vn
            </p>
            <ul class="fleft">
                <li class="active" id="li_memberinfo">
                    <a href="#"   onclick="showdiv('memberinfo');return false">
                        Thông tin cá nhân
                    </a>
                </li>
                <li  id="li_memberchangepass">
                    <a href="#"  onclick="showdiv('memberchangepass');return false">
                        Đổi mật khẩu
                    </a>
                </li>
                <li id="li_member_orderhistory">
                    <a href="#" onclick="showdiv('member_orderhistory');return false">
                        Lịch sử đặt hàng
                    </a>
                </li>
                <li>
                    <a href="#" onclick="logout('<?=$FullUrl?>');return false">
                        Đăng xuất
                    </a>
                </li>
            </ul>

            <?php include "widget_html/member_info.php"; ?>
            <?php include "widget_html/member_changepass.php"; ?>
            <?php include "widget_html/member_orderhistory.php"; ?>
        </div>
    </div>
<script type="text/javascript">
    function showdiv(id)
    {
        $('.active').removeClass("active");

        $(".divtab").hide();
        $("#li_" + id).addClass("active");
        $("#" + id).fadeIn();
    }
    showdiv('memberinfo');
</script>

<? }else {
    $catlogin = Categories::getCatByAlias("signinsignup");
    $linkcat = new Categories($catlogin);
    ?>
    <script type="text/javascript">location.href="<?=$linkcat->getLink()?>"</script>
<?
} ?>
