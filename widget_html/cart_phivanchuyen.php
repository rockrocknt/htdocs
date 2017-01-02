<tr>
    <td>

    </td>
    <td>
        <div >
            <?php
            if (!isset($_SESSION['tinh']))
            {
                $_SESSION['tinh'] = 1;
            }

            if (!isset($_SESSION['quan']))
            {
                $_SESSION['quan'] = 15;
            }
            ?>
            Địa điểm giao hàng:
            <select id="tinh" onchange="changeTinh();" style="float:left;">

                <option value="2"
                    <?php

                    if ($_SESSION['tinh'] == 2) { ?>
                        selected="selected"
                    <?php
                    }

                    ?>
                    >Vận chuyển ngoài TP. HCM</option>

                <option value="1"
                    <?php

                    if ($_SESSION['tinh'] == 1) { ?>
                        selected="selected"
                    <?php }

                    ?>
                    >Vận chuyển trong TP. HCM</option>

            </select>
        </div>
    </td>
    <td>
        <div >
            <div id="divquan" style="float:left;<?php
            if ($_SESSION['tinh'] == 2) {
                ?>
                display:none;
            <?php }?>
                "><strong>Quận</strong>
                <select id="quan" onchange="changeTinh();">
                    <option value="15" selected="selected">Bình Chánh</option>
                    <?php
                    /*
                        <option value="0" <?php if ($_SESSION['quan'] == 0) { ?>
                          selected="selected"
                      <?php } ?>
                      >Chọn Quận</option>
                      <? */ ?>
                    <?php

                    $list = quan::getAll();


                    for ($count=0; $count<count($list); $count++)
                    {
                        $quan = $list[$count];
                        if ($quan['id'] != "15")
                        {
                            ?>
                            <option value="<?=$quan['id']?>"
                                <?php

                                if ($_SESSION['quan'] == $quan['id']) {
                                ?>
                                selected="selected"
                            <?php }

                                ?>
                                ><?=$quan['name']?></option>
                        <?php
                        }//if ($quan['id'] != "15")
                    }
                    ?>
                </select>
            </div> <strong class="phiGHText"> Phí giao hàng: </strong>

        </div>
    </td>
    <td>

    </td>

    <td>

        <div class="price">
            <?php
            //$feevanchuyen = quan::getFee($_SESSION['quan'],$_SESSION['viewcart']['totalSanPham']);
            $feevanchuyen = quan::getFee2($_SESSION['tinh'], $_SESSION['quan'], $_SESSION['viewcart']['totalSanPham']);
           //var_dump($feevanchuyen);
            if (empty($feevanchuyen)) {
                echo "Miễn phí";
            }else {
                $_SESSION['phivanchuyen'] = $feevanchuyen;
                echo formatPrice($_SESSION['phivanchuyen']);
            }
            ?>
        </div>

    </td>

    <td>

        <div class="delete">

        </div>

    </td>
</tr>
<script type="text/javascript">
    function cartsetquantity(proid,qtt)
    {

        location.href = "<?=$FullUrl?>/index.php?do=cart&act=setquantity&proid=" + proid + "&qty=" + $('#' + qtt).val() ;
    }
    function changeTinh()
    {
        if ($('#tinh').val()==1)	$('#divquan').show('slow');
        else $('#divquan').hide('slow');
        $.ajax({
            type: 'POST',
            url: '/ajax.php?do=cart&act=phivanchuyen',
            data: {
                tinh: $('#tinh').val(),
                quan: $('#quan').val()
            },
            success: function(data) {
                view_cart('','pagecart');
            }
        });

        /*
         if ($('#tinh').val() == 1)
         {

         }
         */
    }
    function gettongtien()
    {
        $.ajax({
            type: 'POST',
            url: '/ajax.php?do=cart&act=tongtien',
            data: {

            },
            success: function(data) {
                $('#tongtien').html($.trim(data) );




            }
        });
    }
    $(document).ready(function() {
    //    changeTinh();
    });
    function changeqtt(fullUrl, qtyId, productId)
    {

        var qty = $('#' + qtyId).val();
        $.ajax({
            type: 'POST',
            url: '/index.php?do=cart&act=setquantity&proid=' + productId + '&qty=' + qty,
            data: {
            },
            success: function(data) {
                view_cart('','pagecart');
            }
        });
    }

</script>