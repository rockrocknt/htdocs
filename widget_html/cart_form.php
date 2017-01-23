<section class="section-contact">
    <div class="container">

        <div class="row-fluid">
            <div class="span6">
                <div class=" contact-form-holder">

                    <h4>Vui lòng điền thông tin của bạn để đặt hàng</h4>

                    <div class="message-box"></div>

                    <form class="contact-form" method="post" novalidate="novalidate">

                        <div class="control-group inline-block span6">

                            <div class="controls">
                                <label class="form-label ">Họ tên</label>

                                <input id="firstname" name="name" size="25"
                                       value="<?php
                                       echo getsession('firstname')
                                       ?>"
                                       class="required cusmo-input span12">

                            </div>
                        </div>

                        <div class="control-group inline-block span6">

                            <div class="controls">
                                <label class="form-label">Email</label>
                                <input id="email"
                                       name="mail"
                                       class="required cusmo-input span12"
                                       type="email"
                                       value="<?php
                                       echo getsession('email')
                                       ?>"
                                    >

                            </div>
                        </div>


                        <div class="control-group inline-block  span12" style="margin-left: 0px;">
                            <div class="controls">
                                <label class="form-label">Địa chỉ đặt hàng</label>
                                <input id="address" name="mail" class="required cusmo-input span12"
                                       value="<?php
                                       echo getsession('address_giaohang')
                                       ?>"
                                    >

                            </div>
                        </div>




                    </form>
                </div>
            </div>
            <div class="span6">
                <h4>&nbsp;</h4>

                <div class="message-box"></div>

                <form class="contact-form">

                    <div class="control-group inline-block span12">

                        <div class="controls">
                            <label class="form-label ">Số điện thoại</label>

                            <input id="phone" name="name" size="25" class="required cusmo-input span12"
                                <?php
                                echo getsession('phone');
                                ?>
                                >

                        </div>
                    </div>

                    <div class="control-group">

                        <div class="controls">
                            <label class="form-label">Ghi chú thêm</label>

                            <textarea id="note" name="msj" rows="5" cols="5" class="required span12 cusmo-input"></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <input class="submit cusmo-btn narrow"
                               onclick="finishcheckout('');return false;"
                               value="HOÀN TẤT" type="submit">
                    </div>
                    <div id="loading" class="pull-right">
                        <img alt="" src="/images/loader.gif">
                    </div>
                </form>
            </div>
        </div>

    </div>




</section>