<?php
if (!defined('INCLUDED')) {
    die("Access Denied");
}
?>





<div class="infocard">









<div class="title-content-card-top3" style="height: 25px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;margin-top:10px;"><?= $template->title_content('Contact Cardguys') ?></span></div>



<?php if (!isset($_POST['email']) || ($_POST['email']=="")) { ?>
        <form class="contact-form" method="post" action="<?php echo $sitelink; ?>/contact">


            <br />
            <div style="text-align: left;"> 
                For questions regarding a credit card you already hold, or the status of a new credit card application, please contact the card issuer or bank directly. Should your questions be related to the use of our website, or any of the offers found on Cardguys.com, please contact us using the form below. 
            </div>
            <br />

            <input required="required" class="cardguys-input"  name="name" size="40" title="Name" placeholder="Name"> <br/>
            <input required="required" type="email"  class="cardguys-input" title="Email" name="email" size="25" placeholder="E-mail"><br/>
            <input required="required" required class="cardguys-input"  title="subject" name="subject" size="25" placeholder="Subject"><br/>
            <textarea required="required" class="cardguys-textarea" title="content" name="content" rows="7" cols="40">Message</textarea><br/>

            <button class="applybtn contactsubmbit">
                <span>Send</span>

                <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
            </button>


            <br/>
            <input type="hidden" name="option" value="add"/><br/>

        </form>

    </div>

    <?php
} else {
    // the user has submitted the form
    // Check if the "from" input field is filled out
    if (isset($_POST['email'])) {

        $name =$_POST['name'];//name
        $from = $_POST['email']; // sender
	$subject = $_POST['subject']; // subject
        $message = $_POST['content'];
        // message lines should not exceed 70 characters (PHP rule), so wrap it
        $message = wordwrap($message, 70);
        // send mail

        mail("sydney@directaccessdigital.com", $subject."-CardGuys", $message, "From: $from\n");
        echo "Thank you for sending us feedback, <br />We will contact you as soon as possible";

        $post = array_filter($_POST);
    }
}
?>


<script>
	
	
				
	$('.contact-form').submit(function( event ) {
				alert("we out here")			
	});
				
				
</script>


</div>

