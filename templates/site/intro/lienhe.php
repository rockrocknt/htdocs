<?php
global $FullUrl, $prefix_url, $lg, $product,$title_bar;
$catdichvu = currentCat();
?>


<?=$title_bar?$title_bar:navigationBar()?><br/>

<link rel="stylesheet" href="<?=$FullUrl?>/css_site/master1_lienhe.css">
<table width="100%">
    <tbody><tr>
        <td>


            <link title="style" href="/text/partycity/customer-service/contactus-style-pc-2014.css" type="text/css" rel="stylesheet">

            <style type="text/css">
                &lt;!-- --&gt;
            </style>

            <div id="leftCol">
                <div class="leftHeader">
                    <img width="202" height="30" title="Customer Service" alt="Customer Service" src="image_site/customerservice_mhd.gif">
                </div>

                <div class="formContainer">
                    <form onsubmit="return validateContactUs();" method="post" action="">
                        <input type="hidden" value="00Dd0000000eWsh" name="orgid">
                        <input type="hidden" value="http://www.partycity.com/category/contact+us+complete.do" name="retURL">

                        <div class="rowElement">
                            <div class="leftText"><p>Name: <span class="red">*</span></p></div>
                            <input type="text" size="20" name="name" maxlength="80" class="dataField" id="name">
                        </div>
                        <div class="rowElement">
                            <div class="leftText"><p>Email: <span class="red">*</span></p></div>
                            <input type="text" size="20" name="email" maxlength="80" class="dataField" id="email">
                        </div>
                        <div class="rowElement">
                            <div class="leftText"><p class="space">Phone:</p></div>
                            <input type="text" size="20" name="phone" maxlength="40" class="dataField" id="phone">
                        </div>
                        <div class="rowElement">
                            <div class="leftText"><p>Description: <span class="red">*</span></p></div>
                            <textarea cols="21" rows="3" name="description" class="dataField" id="description"></textarea>
                        </div>

                        <div class="rowElement">
                            <div class="leftText"><p class="space">Ship ID:</p></div>
                            <input type="text" size="20" name="00Nd00000077CtM" maxlength="20" class="dataField" id="00Nd00000077CtM">
                        </div>
                        <div class="submit">
                            <input type="submit" value="Submit" name="submit" class="dataField">
                        </div>
                        <input type="hidden" value="1" name="external" id="external">
                        <input type="hidden" value="012d0000000hCYL" size="20" name="recordType" maxlength="80" id="recordType">
                        <input type="hidden" size="20" name="00Nd00000077Ct3" maxlength="20" id="00Nd00000077Ct3">
                    </form>
                </div><!--End Form Container-->

            </div> <!-- End left col-->

            <div id="rightCol">
                <div class="rightHeader"><h1>Contact Us</h1></div>
                <?php echo $cat->getContent(); ?>



            </div> <!-- end right col -->


            <!-- endcontact-us-pc-140618.html -->

        </td>

    </tr>
    </tbody></table>