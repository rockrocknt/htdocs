<?php
class cart{
	public static function addProduct($proid, $soluong, $size,$color=0){
        global $db;
        $sql = "select * from `products` where id=" . $proid;
        $row = $db->getRow($sql);
        if (empty($row)) { 
            return;
        }
		if ($proid<1) return;
        $soluong = 1;
        if (!is_numeric($soluong)) {
            $soluong = 1;
        }
		if ($soluong<0) {
			$soluong = 1;
		}

		$carts = array();
		if (isset($_SESSION['cart'])){
			$carts = $_SESSION['cart'];
		}

		$hadproduct = 0;
		if ($carts[0]) {
			for ($i=0; $i<count($carts); $i++) {
				if ($carts[$i]['proid'] == $proid) {
					$hadproduct = 1;
					$carts[$i]['soluong'] += $soluong;
					$carts[$i]['size'] = $size;
                    $carts[$i]['color'] = $color;
				}
			}
		}
		if ($hadproduct == 0)
		{
			if ($carts[0]) {
				$next = count($carts);
			} else {
				$next = 0;
			}
			
			$carts[$next]['proid'] = $proid;
			$carts[$next]['soluong'] = $soluong;
			$carts[$next]['size'] = $size;
            $carts[$next]['color'] = $color;
		}

		$_SESSION['cart'] = $carts;
	}
	
	public static function delProduct($proid) {
		$carts = array();

		if (isset($_SESSION['cart'])) {
			$carts = $_SESSION['cart'];
		} else return;

		$newcart = array();
		$index = 0;
		foreach ($carts as $cart) {
			if ($cart['proid'] != $proid ) {
				$newcart[$index] = $cart;
				$index++;
			}
		}	
		// dung de khoi tao index
		$_SESSION['cart'] = $newcart;
	}

	public static function getQuantity() {
		$soluong = 0;
		$carts = array();

		if (!isset($_SESSION['cart'])) {
			return 0;
		} else {
			$carts = $_SESSION['cart'];

			foreach ($carts as $cart) {
				if ($cart['proid'] > 0) {
					$soluong++;
				}
			}
		}
	
		return $soluong;
	}
    public static function getQuatity() {
        $soluong = 0;
        $carts = array();

        if (!isset($_SESSION['cart'])) {
            return 0;
        } else {
            $carts = $_SESSION['cart'];

            foreach ($carts as $cart) {
                if ($cart['proid'] > 0) {
                    $soluong++;
                }
            }
        }

        return $soluong;
    }
	
	public static function setQuantity($proid, $quantity){
		$carts = array();
		if (isset($_SESSION['cart'])) {
			$carts = $_SESSION['cart'];
		} else return;

		foreach ($carts as $i=>$cart) {
			if ($cart['proid'] == $proid ) {
                if ($quantity < 1) $quantity=1;
				$carts[$i]['soluong'] = $quantity;
			}
		}
		// dung de khoi tao index
		$_SESSION['cart'] = $carts;

	}
	// day la ham de hien thi cart
	public static function getCart() {
		global $lg, $db;

		$carts = array();
		if (isset($_SESSION['cart'])) {
			$carts = $_SESSION['cart'];
		}
		
		if ($carts) {
			$strwhere = '';
			foreach ($carts as $cart) {
				$strwhere .= ($strwhere == '')?( ' id = ' . $cart["proid"] ): ' or id = ' . $cart["proid"];
			}

			$sql = "select * from products where " . $strwhere;
			$products =  $db->getAll($sql);	

			$viewcart = array();
			if ($products) {
				foreach ($carts as $i=>$cart) {
					foreach ($products as $product) {
						$product = new products($product);
						if ($product->getID() == $cart['proid']) {
							$price =  $product->getPrice();
							$viewcart[$i]['id'] = $product->getID();						
							$viewcart[$i]['name'] = $product->getName();
							$viewcart[$i]['price'] = $price;
                            $viewcart[$i]['link'] = $product->getLink();
							$viewcart[$i]["img"] = $product->getImage2();
							$viewcart[$i]['soluong'] =$cart['soluong'];
							$viewcart[$i]['code'] =$product->getCode();
                            $viewcart[$i]['cid'] =$product->getCID();
							$viewcart[$i]['categoryName'] =$product->getCatName();
							$viewcart[$i]['thanhtien'] = $cart['soluong'] * $price;
                            $viewcart[$i]['productObj'] = $product;
							if ($cart['size'] != "undefined")
								$viewcart[$i]['size'] = $cart['size'];
							else
								$viewcart[$i]['size'] = "";
						}
					}
				}
			}			
			return $viewcart;
		} else return;
	}
	
	public static function getTotalMoney(){
		global $lg, $db;

		$carts = array();
		if (isset($_SESSION['cart'])) {
			$carts = $_SESSION['cart'];
		} else return 0;

		if ($carts) {
			$strwhere = '';
			foreach ($carts as $cart) {
				$strwhere .= ($strwhere == '')?( ' id = ' . $cart["proid"] ): ' or id = ' . $cart["proid"];
			}

			$sql = "select * from products where " . $strwhere;
			$products = $db->getAll($sql);	
			$total = 0;
			
			if ($products) {
				foreach ($carts as $cart) {
					foreach ($products as $product) {
						$product = new products($product);
						if ($product->getID() == $cart['proid']) {
							$price = $product->getPrice();
							$total += $cart['soluong']*$price;
						}
					}
				}
			}
		
			return $total;
		} else return 0;
	}
    public  static  function insertOrder()
    {

        if (isset($_SESSION['cart']))
        {

            global $db, $FullUrl, $prefix_url, $lg;
            global $db, $FullUrl, $prefix_url, $lg;




            $firstName = getsession("firstname");
            $city    = getsession("city");
            $lastname = getsession("lastname");
            if ($firstName=="") return;

            $alias = SafeFormValue('alias');
            $stt = SafeFormValue('stt');
            // thong tin nguoi mua
            $name = $firstName;
            //$name = SafeFormValue('name');
            $email = getsession('email');
            $phone = getsession('phone');
            $address = getsession('address_giaohang');
            $note = getsession('note');
            // thong tin nguoi nhan
            $r_name =$name;
            $r_email = $email;
            $r_phone = $phone;
            $r_address = $address;
            /*
            $r_name = getsession('r_name');
            $r_email = SafeFormValue('r_email');
            $r_phone = SafeFormValue('r_phone');
            $r_address = SafeFormValue('r_address');
            */

            $sql = "select * from payments where alias like '$alias'";
            $payment = $db->getRow($sql);
            // dien du lieu de chen vao bang orders
            if (isset($_SESSION['member_id'])) {
                $arr['odr_mem_id'] = $_SESSION['member_id'];
            }
            $arr['orderFirstName'] = $firstName;
            $arr['orderLastName'] = $lastname;
            $arr['orderCity'] = $city;
            $arr['insert_time_int'] = strtotime('now');
            $arr['orderName'] = $name;
            $arr['orderPhone'] = $phone;
            $arr['orderEmail'] = $email;
            $arr['orderAddress'] = $address;
            $arr['odr_note'] = $note;
            $arr['receiveName'] = $r_name;
            $arr['receivePhone'] = $r_phone;
            $arr['receiveEmail'] = $r_email;
            $arr['receiveAddress'] = $r_address;
            $arr['paymentid'] = $_SESSION['cachthanhtoan'];
            $arr['paymenttype'] = $stt;
            $arr['receiveName'] = $name;
            $arr['receivePhone'] = $phone;
            $arr['receiveEmail'] = $email;
            $arr['orderAddress'] = $address;
            $arr['odr_note'] = $note;
            $arr['receiveAddress'] =$address;

            if (SafeFormValue('typeGuest') == 1){
                $arr['odr_guestcheckoutid'] = Members::insertGuestCheckout($arr);
            }else
                $arr['odr_mem_id'] = Members::insertMember($arr);

            $arr['insert_time_int'] = strtotime('now');
            $idorder = vaInsert('orders', $arr,0);

            $cart = cart::getCart();

            $tongsanpham = cart::getQuantity();
            $_SESSION["totalCart"] = $total = cart::getTotalMoney();
            $order_detail = "";

            for($i=0; $i<$tongsanpham; $i++){
                $r = $cart[$i];
                $img = "<img src='http://www.".GetFullDomain().'/'.$r["img"]."' alt='' width='100' />";
                $size = $r["size"]?"<br/>Size: ".$r["size"]:"";
                $order_detail .= "<tr><td align='center'>".($i+1)."</td><td align='center'>".$r['code']."</td><td>".$img."</td><td align='center'><a href='http://".GetFullDomain().$r["link"]."'>".$r["name"]. "</a>" . "$size</td><td align='center'>".formatPrice($r['price'])."</td><td align='center'>".$r['soluong']."</td><td align='center'>".formatPrice($r['thanhtien'])."</td></tr>";
                // chen vao bang order_detail
                $arr_detail = array();
                $arr_detail['od_odr_id'] = $idorder;
                $arr_detail['od_pro_id'] = $r['id'];
                $arr_detail['od_pro_quantity'] = $r['soluong'];
                $arr_detail['od_size'] = $r['size'];
                vaInsert('order_detail', $arr_detail);
            }

            $sql = "select * from orders where odr_id=$idorder";
            $r = $db->getRow($sql);

            $arr['dated'] = $r['odr_insert_date'];
            $arr['idorder'] = $idorder;
            $arr['order_detail'] = $order_detail;
            //$arr['total'] = echoPrice(formatPrice($total));
            $arr['total'] = $total;
            $arr['website'] = GetFullDomain();

            if ($alias == "Bank") {
                $sql = "select * from banks where id=".$stt;
                $bank = $db->getRow($sql);
            }

            /*
            $arr['payment'] = $payment["name_$lg"].($bank?" - ".$bank["bank_$lg"]:'');
            */
            if (getsession('cachthanhtoan')==2)
            {
                $arr['payment'] = "Chuyển khoản";
                // $template = str_replace('[CACHTHANHTOAN]', "Chuyển khoản", $template);
            }
            else
                if (getsession('cachthanhtoan')==3)
                {
                    $arr['payment'] = "Thanh toán chuyển khoản online ngay";
                }
                else
                {
                    $arr['payment'] = "Thanh toán cho người giao hàng (chỉ áp dụng cho nội thành tp.HCM và Hà Nội)";

                }
            $urltransfer = "";
            $returnurl = "http://www.".GetFullDomain().$prefix_url.($lg=='vn'?'hoan-tat-don-hang.html':'order-finish.html');
            $paymentlink = "http://www.".GetFullDomain().$prefix_url.($lg=='vn'?'huong-dan-thanh-toan.html':'payment-guide.html');
            $rate = Info::getInfoField('rate');

            /*
            switch ($alias) {
                case "Nganluong":
                    $urltransfer = "https://www.nganluong.vn/button_payment.php?receiver=".$payment["email"]."&product_name=".$idorder."&price=".$total."&comments=".urlencode("Thanh toán đơn hàng, mã đơn hàng ".$idorder);
                    break;
                case "Baokim":
                    $urltransfer = 'https://www.baokim.vn/payment/customize_payment/product?business='.$payment["email"].'&product_name=Đơn hàng '.$idorder.'&product_price='.$total.'&product_quantity=1&total_amount='.$total;
                    break;
                case "Paypal":
                    $totalUSD = number_format($total/$rate, 2)+3;
                    $url = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&item_name=Order No ".$ordercode."&business=".$payment["email"]."&currency_code=USD&rm=2&amount=".$totalUSD;
                    break;
            }
            */

            $arr['guide'] = "<a href='$paymentlink'>".($lg=='vn'?"Xem hướng dẫn thanh toán":"View payments guide")."</a>";
            $rel["error"] = 0;
            $rel["id"] = $idorder;
            $_SESSION['idorder'] = $idorder;

            if (Email::sendEmailOrder($arr)) {
                $rel["error"] = 0;
                //	$rel["url"] = $urltransfer?$urltransfer:$returnurl;
            } else {
                $rel["error"] = 1;
                $rel['mess'] = MESS_SEND_EMAIL_UNSUCCESSFUL;
                //	$rel["url"] = $FullUrl.$prefix_url;
            }
        }
    }
    public static function update_bill_id($idOrder, $params)
    {
      $arr["bill_id"]=    $params["bill_id"];
      $arr["payment_url"]=    $params["payment_url"];

      vaUpdate('orders',$arr," `odr_id`='".$idOrder."'",0);


    }

}
?>