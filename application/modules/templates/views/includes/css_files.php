
<?php

$config= Modules::run("settings/getAll");

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

<meta name="description" content="<?php echo $config->meta_description; ?>" />
<meta name="keywords" content="<?php echo $config->meta_keywords; ?>" />
<meta name="author" content="Solvertech UG" />

<!-- Page Title -->
<title><?php echo $config->system_name; ?></title>
<!-- Favicon and Touch Icons -->
<link href="<?php echo base_url(); ?>assets/images/<?php echo $config->favicon; ?>" rel="shortcut icon" type="image/png">


<!-- Stylesheet -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/css-plugin-collections.css" rel="stylesheet"/>

<!--Trumb-->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/trumb/dist/ui/trumbowyg.min.css">

<!-- CSS | Main style file -->
<link href="<?php echo base_url(); ?>assets/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?php echo base_url(); ?>assets/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo base_url(); ?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

<!-- CSS | Theme Color -->
<link href="<?php echo base_url(); ?>assets/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo base_url(); ?>assets/js/jquery-plugin-collection.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>

<script>

//     var isNS = (navigator.appName == "Netscape") ? 1 : 0;
//     if(navigator.appName == "Netscape") 
//       document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);

//     function mischandler(){
//       return false;
//     }
//     function mousehandler(e){
//       var myevent = (isNS) ? e : event;
//       var eventbutton = (isNS) ? myevent.which : myevent.button;
//       if((eventbutton==2)||(eventbutton==3)) return false;
//     }
//     document.oncontextmenu = mischandler;
//     document.onmousedown = mousehandler;
//     document.onmouseup = mousehandler;

//     $(document).keydown(function (event) {
//         if (event.keyCode == 123) {
//             //return false;
//         }
//         else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
//             //return false;
//         }
//     });


</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style type="text/css">
	
	a{
		cursor: pointer!important;
	}

	/*hide sider on ver small screens*/
	@media screen and (max-width: 500px) {
   
   #home{
   	display: :none;
   }


}


</style>

<!-- CSS | Showmore -->
<link href="<?php echo base_url(); ?>assets/css/showmore.css" rel="stylesheet" type="text/css">


</head>
<body class="">
