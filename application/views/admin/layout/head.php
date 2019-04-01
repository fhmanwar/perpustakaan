<?php
$konfigurasi = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->

        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- Tinymce -->
    <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      tinymce.init({
        selector: '.editor',
        plugins: [
          'advlist autolink lists link image charmap print preview anchor textcolor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tiny.cloud/css/codepen.min.css'
        ]
      });
    </script>
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>

    <!-- JQUERY UI -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/jquery-ui.min.css">
    <script src="<?php echo base_url() ?>assets/jquery/jquery-ui.min.js"></script>

    <!-- select2 -->
    <link href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/select2/dist/js/select2.min.js"></script>

    <style type="text/css" media="screen">
      select{
        color: #000 !important;
      }
    </style>
</head>
<body>
    <div id="wrapper">
