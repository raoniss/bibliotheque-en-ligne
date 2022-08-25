<?php
namespace core;
class Page {
    public function _body(){
    }
    public function _head(){
        ?>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>BIBALL</title>
<!-- General CSS Files -->
<?php
    ?>
<?php
}
public function _foot(){
       
}
public function _html(){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- General CSS Files -->
    
    <link rel="stylesheet" href="public/css/app.min.css">
    <link rel="stylesheet" href="public/bundles/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="public/bundles/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="public/bundles/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="public/bundles/summernote/summernote-bs4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="public/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='public/img/favicon.ico'/>
    <link rel="stylesheet" href="public/bundles/prism/prism.css">
        <link rel="stylesheet" href="public/bundles/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="public/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="public/bundles/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="public/bundles/jquery-selectric/selectric.css">
        <link rel="stylesheet" href="public/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="public/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <?php
    $this->_head();
    ?>
</head>

    <body>
        <?php
    $this->_body();
    $this->_foot();
    ?>
        <!-- General JS Scripts -->
        <script src="public/js/app.min.js"></script>
        <!-- JS Libraies -->
        <script src="public/bundles/echart/echarts.js"></script>
        <script src="public/bundles/chartjs/chart.min.js"></script>
        <!-- Page Specific JS File -->
        <script src="public/js/page/index.js"></script>
        <!-- Template JS File -->
        <script src="public/js/scripts.js"></script>
        <!-- Custom JS File -->
        <script src="public/js/custom.js"></script>
    </body>

</html>
<?php
   
}
}