<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fundacion Mundo Sano ( Chagas )</title>
<?php $base = base_url(); ?>
<link rel="stylesheet" href="<?php echo $base; ?>assets/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo $base; ?>assets/js/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo $base; ?>assets/js/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo $base; ?>assets/js/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
<!-- Start: login-holder -->
<div id="login-holder">

    <!-- start logo -->
    <div id="logo-login">
        <a href="index.html"><img src="<?php echo $base; ?>assets/img/logo2.png" width="116" height="86" alt="" /></a>
    </div>
    <!-- end logo -->
    
    <div class="clear"></div>
    
    <!--  start loginbox ................................................................................. -->
    <div id="loginbox">
    
    <!--  start login-inner -->
    <div id="login-inner">

                <?php $this->load->view($form_login); ?>

    </div>
        <!--  end login-inner -->
        <div class="clear"></div>
        
     </div>
 <!--  end loginbox -->
 
   

</div>
<!-- End: login-holder -->
</body>
</html>
