<? global $banks, $FullUrl; ?>

  <script  type="text/javascript">
  function showcachchon(i)
  { 
	  if (i == 1 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Thanh toán cho người giao hàng');
		   $('#hiddencachthanhtoan').val('1');
	  }
	  if (i == 2 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Chuyển khoản qua ngân hàng');
		   $('#hiddencachthanhtoan').val('2');
	  }
	  if (i == 3 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Chuyển khoản qua ngân hàng ( thùng ATM hay tại điểm giao dịch ngân hàng)');
		   $('#hiddencachthanhtoan').val('3');
	  }
		  if (i == 4 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Thanh toán qua Ngân Lượng');
		   $('#hiddencachthanhtoan').val('4');
	  }
		  if (i == 5 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Thanh toán qua Bảo Kim');
		   $('#hiddencachthanhtoan').val('5');
	  }
	  
	  if (i == 6 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Thanh toán qua PayPal');
		   $('#hiddencachthanhtoan').val('6');
	  }
	  
		  if (i == 7 )
	  {
		   $('#div_cachthanhtoan').html('Bạn chọn: Dùng thẻ Tín dụng hay Ghi nợ Quốc tế: (phí 3.600 VNĐ + 2.75% giao dịch)');
		   $('#hiddencachthanhtoan').val('7');
	  }
  }
  </script>
  <div class="t2-main3" style="margin-left:10px;">
	  <input type="hidden" value="" name="hiddencachthanhtoan" id="hiddencachthanhtoan" />
    <div style="color:#C00; font-size:26px;line-height:40px;font-weight:bold">
	    Chọn cách thanh toán dưới đây để hoàn thành đơn hàng:
    </div>
	<div class="main3">
	<ul>
            <li><a href="#" class="click-show">&raquo; Thanh toán cho người giao hàng (chỉ áp dụng cho nội thành tp.HCM và Hà Nội)</a>
              <div><?php /*?>
                <p>Bạn có thể đến thanh toán tại địa điểm:</p>
                <p><strong>Văn phòng: </strong>152/41/3, Điện Biên Phủ, P.25, Q.Bình Thạnh, HCM </p>
                <p><strong>Điện thoại: </strong>090 999 7104 (Mr.Quang), 090 680 7174 (Mr.Nam) </p>
                <p><img src="http://cart.imgroup.vn/html/thanhtoan/images/ban-donho.png" /></p><?php */?>
                <p>
                  <input type="submit" onclick="showcachchon('1');return Register2();" value="Xác nhận" class="click-chon">
                  </input>
                </p>
              </div>
            </li>
            <li><a href="#" class="click-show">&raquo; Chuyển khoản qua ngân hàng <a href="http://www.tuixachnam.vn/mua-hang-online/" target="_blank" title="xem cách thanh toán online"><font size="5"> >>xem cách thanh toán online<< </font></a></a>
              <div><?php /*?>
                <p>Bạn có thể đến thanh toán tại địa điểm:</p>
                <p><strong>Văn phòng: </strong>152/41/3, Điện Biên Phủ, P.25, Q.Bình Thạnh, HCM </p>
                <p><strong>Điện thoại: </strong>090 999 7104 (Mr.Quang), 090 680 7174 (Mr.Nam) </p>
                <p><img src="http://cart.imgroup.vn/html/thanhtoan/images/ban-donho.png" /></p><?php */?>
                <p>
                  <input type="submit" onclick="showcachchon('2');return Register2();" value="Xác nhận" class="click-chon">
                  </input>
                </p>
              </div>
            </li>
            <? if($banks){ ?>
            <li> <a href="#" class="click-show">&raquo; Chuyển khoản bằng Internet Banking hoặc chuyển khoản qua ngân hàng</a>
              <div class="div1">
                <p style="line-height:26px;">
                <div style="padding-left:25px;">
						  <!--<p style="font-weight: bold;color:#038fd8;">CTY CP ĐẦU TƯ VÀ PHÁT TRIỂN IM
                  </p>
                  <p><span class="bold">Số tài khoản:</span> 0071000638187 &ndash; Vietcombank Q.10</p>-->
                  <p class="bold"><b>Tài khoản:</b></p>
                  <ul class="bank_account">
                  	<? foreach($banks as $bank){ ?>
                    <li>
                      <img width="150" src="<?=$FullUrl?>/<?=$bank["bank_img"]?>" alt="<?=$bank["bank_name"]?>" />	
                      <p style="font-weight: bold;color:#038fd8;"><?=$bank["bank_name"]?></p>
                      <p><?=$bank["bank_account"]?></p>
                    </li>
                    <? } ?>
                  </ul>
                  <?
				  	$paymentMethod = Info::getByName('ghi chu trong phan thanh toan bang tai khoan ngan hang');
					$paymentMethodResult = $paymentMethod['content_vn'];
					if(!empty($paymentMethodResult)){
				  ?>
                  <p><?=strip_tags($paymentMethodResult)?></p>
                  <? } ?>
                </div>
                </p>
                <p>
                  <input type="submit" onclick="showcachchon('2');return Register2();"  class="click-chon " value="Xác nhận" />
                </p>
              </div>
            </li>
            <? } ?>
            <?php /*?><li><a href="#" class="click-show">Chuyển khoản qua ngân hàng ( thùng ATM hay tại điểm giao dịch ngân hàng)</a>
              <div class="div1">
                <p style="line-height:26px;">
                <div style="padding-left:25px;">
						  <!--<p style="font-weight: bold;color:#038fd8;">CTY CP ĐẦU TƯ VÀ PHÁT TRIỂN IM
                  </p>-->
                  <!--<p><span class="bold">Số tài khoản:</span> 0071000638187 &ndash; Vietcombank Q.10</p>-->
                  <p class="bold">Tài khoản:</p>
                  <ul class="bank_account">
                    <li>
                      <p style="font-weight: bold;color:#038fd8;">ACB HỒ CHÍ MINH</p>
                      <p>Nguyễn Khánh Duy - 567 43 789</p>
                    </li>
                  </ul>
                  <p>Vui lòng gọi vào số điện thoại <span class="bold colorff0000">0909 774 796</span> (Mr. Duy) để thông báo sau khi bạn hoàn tất thanh toán.</p>
                </div>
                </p>
                <p>
                  <input type="submit" onclick="showcachchon('3');return Register2();" value="Xác nhận"   class="click-chon">
                  </input>
                </p>
              </div>
            </li><?php */?>
            <?php /*?><li><a href="#" class="click-show">Thanh toán qua Ngân Lượng</a>
              <div class="div1">
                <table>
                  <tr>
                    <td><img src="https://www.nganluong.vn/webskins/skins/nganluong/images/logo-nl.png" align="Ngan luong logo"/></td>
                  </tr>
                  <tr>
                    <td><p>
                        <input type="submit" onclick="showcachchon('4'); return Register2();"  value="Xác nhận"     class="click-chon">
                        </input>
                      </p></td>
                  </tr>
                </table>
              </div>
            </li>
            <li><a href="#" class="click-show">Thanh toán qua Bảo Kim</a>
              <div class="div1">
                <table>
                  <tr>
                    <td><img src="http://cart.imgroup.vn/imgcachthanhtoan/logo_baokim.png" align="Bao kim" /></td>
                  </tr>
                  <tr>
                    <td><p>
                        <input type="submit" onclick="showcachchon('5');return Register2();" value="Xác nhận"    class="click-chon">
                        </input>
                      </p></td>
                  </tr>
                </table>
              </div>
            </li>
            <li><a class="click-show"  href="#">Thanh toán bằng tài khoản Paypal thông qua cổng NganLuong.vn</a>
              <div class="div1">
                <table>
                  <tr>
                    <td><p style="font-size: 40px; color: red;"><img src="http://cart.imgroup.vn/images/paypal.jpg" alt="Paypal" /></p></td>
                  </tr>
                  <tr>
                    <td><p>
                        <input type="submit" onclick="showcachchon('6');return Register2();" value="Xác nhận"    class="click-chon">
                        </input>
                      </p></td>
                  </tr>
                </table>
              </div>
            </li>
            <li ><a class="click-show" href="#">Dùng thẻ Tín dụng hay Ghi nợ Quốc tế (thông qua cổng NganLuong.vn): (phí 3.600 VNĐ + 2.75% giao dịch)</a>
              <div class="div1">
                <p style="font-size: 40px; color: red;">
                <table cellspacing="8">
                  <tr>
                    <td><img border="0" height="30" alt="Thanh toán bằng Visa Card" src="http://cart.imgroup.vn/images/visacard.gif"></td>
                    <td><img border="0" height="30" alt="Thanh toán bằng Visa Card" src="http://cart.imgroup.vn/images/mastercard.gif">&nbsp;</td>
                    <td><img border="0" height="30" alt="Thanh toán bằng Visa Card" src="http://cart.imgroup.vn/images/americian_express.gif">&nbsp;</td>
                    <td><img border="0" height="30" alt="Thanh toán bằng Visa Card" src="http://cart.imgroup.vn/images/jcbcard.gif">&nbsp;</td>
                  </tr>
                </table>
                </p>
                <p>
                  <input type="submit" onclick="showcachchon('7');return Register2();"  value="Xác nhận"      class="click-chon">
                  </input>
                </p>
              </div>
            </li><?php */?>
          </ul>
          </div>
  </div>
  <script type="text/javascript">
	
	  
	   $(document).ready(function(){

        $('.main3').find('div.div1:not(:first)').hide();

        $('.main3').find('a.click-show').addClass('add1');

        $('a.click-show').click(function(){

            var $this= $(this);

            if($this.next('div.div1').is(':hidden')==false)

            {

                $this.next('div.div1').slideUp('normal');

            }

            else{

                $('div.div1').slideUp('normal');

                $('.main3').find('a.click-show').removeClass('add');

                $this.addClass('add');

                if($this.next('div.div1').is(':hidden')==true){

                    $this.next('div.div1').slideDown('normal');

                }                

            }            

            return false;

        });        

    });

  </script>