<?php
/*------------------------------------------------------------------------
# @author - Alonzo Weatherby
# copyright Copyright (C) 2013 forkliftcertification.us. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://forkliftcertification.us/
# Technical Support: http://www.forkliftcertification.us/extensions/index.php/contact-us
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die;
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_contactusslider/assets/style.css');
$recipient = $params->get('recipient');
$fromName = $params->get('fromName');
$fromEmail = $params->get('fromEmail');
$margintop = $params->get('margintop');
$cwidth = $params->get('cwidth');
$cbox1_width = trim($params->get( 'cwidth' )+10);
$cheight = $params->get('cheight');

/*contact form code start*/
$url = JURI::current();
$url = htmlentities($url, ENT_COMPAT, "UTF-8");
$myError = '';
$CORRECT_EMAIL = '';
$CORRECT_SUBJECT = '';
$CORRECT_MESSAGE = '';


if (isset($_POST["cf_email"])) {
  $CORRECT_SUBJECT = htmlentities($_POST["cf_subject"], ENT_COMPAT, "UTF-8");
  $CORRECT_MESSAGE = htmlentities($_POST["cf_message"], ENT_COMPAT, "UTF-8");
  
  
  // check email
  if ($_POST["cf_email"] === "") {
    $myError = '<span style="color:#cccccc;">No Email</span>';
  }
  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", strtolower($_POST["cf_email"]))) {
    $myError = '<span style="color: #cccccc;">Invalid Email</span>';
  }
  else {
    $CORRECT_EMAIL = htmlentities($_POST["cf_email"], ENT_COMPAT, "UTF-8");
  }
  
   if ($myError == '') {
    $mySubject = $_POST["cf_subject"];
    $myMessage = 'You received a message from '. $_POST["cf_email"] ."\n\n". $_POST["cf_message"];

    $mailSender = &JFactory::getMailer();
    $mailSender->addRecipient($recipient);

    $mailSender->setSender(array($fromEmail,$fromName));
    $mailSender->addReplyTo(array( $_POST["cf_email"], '' ));

    $mailSender->setSubject($mySubject);
    $mailSender->setBody($myMessage);

    if ($mailSender->Send() !== true) {
		$myError = '<span style="color:#cccccc">' . "Showing Error" . '</span>';
      $myReplacement = '<span style="color:#cccccc">' . "Showing Error" . '</span>';
      print $myReplacement;
      return true;
    }
    else {
		$myError = '<span style="color:#cccccc">' . "Thanks for submitting form" . '</span>';
      $myReplacement = '<span style="color: #cccccc;">' . "Thanks for submitting form" . '</span>';
      print $myReplacement;
      return true;
    }

  }
  
 }
 /*Contact form code end*/

/*
$style = '.contact-form {
width: '. echo $cwidth; . 'px;
margin-top: 25px;
}';
$document->addStyleDeclaration( $style );*/
?>

<div id="contact_slider">
<?Php if($params->get('position')=='left'){ ?>
	<div id="cbox1" style="left: -<?php echo $cbox1_width;?>px; top: <?php echo $margintop;?>px; z-index: 10000;">
		<div id="cbox2" style="text-align: left;width:<?php echo $cwidth; ?>px;height:<?php echo $cheight; ?>px;">
			<a class="open" id="clink" href="#"></a><img style="top: 0px;right:-50px;" src="modules/mod_contactusslider/assets/contact-icon.png" alt="">
<?php } else { ?>	
    <div id="cbox1" style="right: -<?php echo $cbox1_width;?>px; top: <?php echo $margintop;?>px; z-index: 10000;">
		<div id="cbox2" style="text-align: left;width:<?php echo $cwidth; ?>px;height:<?php echo $cheight; ?>px;">
			<a class="open" id="clink" href="#"></a><img style="top: 0px;left:-50px;" src="modules/mod_contactusslider/assets/contact-icon.png" alt="">
<?php } ?>					
				<!--start contact form code here-->
				<div class="contact-form">
					<form action="<?php echo $url; ?>" method="post">
						<div class="contact-form-text"><?php echo $myError; ?></div>
							<label for="email">Email:</label>
							<input type="text" name="cf_email" value="<?php echo $CORRECT_EMAIL; ?> " required/>
							<label for="Subject">Subject:</label>
							<input type="text" name="cf_subject" value="<?php echo $CORRECT_SUBJECT; ?>" required/>
							<label for="message">Message:</label>
							<textarea name="cf_message" ><?php echo $CORRECT_MESSAGE; ?></textarea>
							<div class="contact-submit"><input type="submit" value="Send Email" /></div>
					</form>
				</div>
				
				<!--end contact form code here-->
		</div>
		  <!--<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;"><a href="" target="_blank" style="color: #808080;" title=""></a></div>-->
		  </div>
</div>
<?php
	if (trim( $params->get( 'loadjquery' ) ) == 1){
	$document->addScript("http://code.jquery.com/jquery-latest.min.js");}
?>
	<script type="text/javascript">
		jQuery.noConflict();
		jQuery(function (){
			jQuery(document).ready(function()
				{
					jQuery.noConflict();
					jQuery(function (){
						jQuery("#cbox1").hover(function(){ 
						jQuery('#cbox1').css('z-index',101009);
						<?Php if($params->get('position')=='left'){ ?>
						jQuery(this).stop(true,false).animate({left:  0}, 500); },
                        <?php } else { ?>
						jQuery(this).stop(true,false).animate({right:  0}, 500); },
						<?php } ?>
						function(){ 
						jQuery('#cbox1').css('z-index',10000);
						<?Php if($params->get('position')=='left'){ ?>
						jQuery("#cbox1").stop(true,false).animate({left: -<?php echo $params->get( 'cwidth' )+10; ?>}, 500); });
                        <?php } else { ?>
						jQuery("#cbox1").stop(true,false).animate({right: -<?php echo $params->get( 'cwidth' )+10; ?>}, 500); });
					    <?php } ?>
						});}); });
					</script>
