<?php
$konfigurasi = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo $title.' | '.$konfigurasi->keywords ?>" />
    <meta name="description" content="<?php echo $title.' | '.$konfigurasi->deskripsi ?>" />
    <meta name="author" content="<?php echo $konfigurasi->namaweb.' - '.$konfigurasi->tagline ?>" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="<?php echo base_url()?>assets/front/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="<?php echo base_url()?>assets/front/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <!-- footer stylesheet -->
    <link href="<?php echo base_url()?>assets/front/css/footer3.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/front/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="<?php echo base_url()?>assets/front/css/font-awesome.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <script src="<?php echo base_url()?>assets/viewerjs/ViewerJS/pdf.js" type="text/javascript"></script>
    <!-- online-fonts -->
    <!-- logo -->
    <link href="//fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <!-- titles -->
    <link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- body -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
