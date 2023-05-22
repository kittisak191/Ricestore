<?php
function connect_db()
{
  include("include/connect_db.php");
}
function get_module($module, $action)
{
  include("module/" . $module . "/index.php");
}

?>
<?php
function link_function_admin()
{
?>

  <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/simple-line-icons.css" rel="stylesheet">



  <!-- Custom CSS -->
  <link href="css/adminstlye.css" rel="stylesheet">
  <link href="assets/dist/css/w3.css" rel="stylesheet">
  <link href="assets/dist/css/bttn.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />


  <!-- file upload -->
  <link href="assets/fileupload/css/jquery.filer.css" rel="stylesheet">
  <link href="assets/fileupload/css/jquery.filer1.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

  <!-- datetime -->
  <link href="assets/as/datetime/dist/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="assets/as/datetime/dist/css/bootstrap-datetimepicker.css" rel="stylesheet">

  <!-- lightbox img -->
  <link href='assets/lightbox/stylesheets/jquery.lighter.css' rel='stylesheet' type='text/css'>

  <!-- Select img-->
  <link rel="stylesheet" href="assets/plugin/imgselect/css/imgareaselect-animated.css">
  <link rel="stylesheet" href="assets/plugin/foundation-icons/foundation-icons.css">
  <link rel='stylesheet' href='assets/plugin/lightbox/stylesheets/jquery.lighter.css'>

  <!-- Color picker-->
  <link href="assets/colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="assets/colorpicker/docs/assets/main.css" rel="stylesheet">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="plugin/bower_components/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://kit.fontawesome.com/a9e605192a.css" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugin/bower_components/Ionicons/css/ionicons.min.css">




  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables 
    <link rel="stylesheet" href="plugin/plugins/datatables/dataTables.bootstrap.css">-->
  <!-- Theme style
    <link rel="stylesheet" href="plugin/dist/css/AdminLTE.min.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="plugin/dist/css/skins/_all-skins.css">

  <link rel="stylesheet" href="css/tasks.css">

  <!-- style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/dist/css/mystyle.css" rel="stylesheet">
  <link rel="stylesheet" href="/admin/css/adminstlye.css">

<?php
}
?>


<?php
function script_function_admin()
{
?>

  <script type="text/javascript" src="jquery-1.11.1.min.js"> </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="plugin/plugins/jQuery/jquery-2.2.3.min.js"></script>

  <!-- Bootstrap 3.3.6 -->
  <script src="plugin/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="plugin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/a9e605192a.js" crossorigin="anonymous"></script>
  <!-- jQuery 3 -->
  <script src="plugin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Plugins and scripts required by all views -->
  <script src="assets/bower_components/chart.js/dist/Chart.min.js"></script>
  <!-- GenesisUI main scripts -->
  <script src="assets/js/app.js"></script>


  <!-- Color picker-->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="assets/colorpicker/dist/js/bootstrap-colorpicker.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Select img-->
  <script type='text/javascript' src='assets/ass/assets/plugin/lightbox/javascripts/jquery.lighter.js'></script>


  <!-- Select img-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.pack.js"></script>
  <script type="text/javascript" src="assets/ass/assets/plugin/imgselect/js/script2.js"></script>


  <!-- Jvascript  fileupload-->
  <script type="text/javascript" src="assets/fileupload/src/bootstrap-filestyle.js"></script>
  <script src="assets/fileupload/js/jquery.filer.min.js" type="text/javascript"></script>
  <script src="assets/fileupload/js/custom.js" type="text/javascript"></script>


  <!-- DataTables JavaScript -->
  <script src="assets/components/datatables/media/js/jquery.dataTables.js"></script>
  <script src="assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>


  <!--safari-->
  <script src="assets/js-webshim/js-webshim/minified/polyfiller.js"></script>
  <script>
    webshims.polyfill('forms');
  </script>



  <script src="assets/as/datetime/dist/js/moment.js"></script>
  <script src="assets/as/datetime/dist/js/bootstrap-datepicker.js"></script>
  <script src="assets/as/datetime/dist/js/bootstrap-datetimepicker.min.js"></script>


  <!-- lightbox -->
  <script src='assets/lightbox/javascripts/jquery.lighter.js' type='text/javascript'></script>


  <!-- Texteditor -->
  <script src="admin/js/text.js"></script>
  <!-- DataTables -->
  <script src="plugin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugin/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="plugin/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="plugin/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="plugin/dist/js/demo.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>



  <script src="../cdn/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: "textarea#textshow",
      theme: "modern",
      height: 250,
      plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak code",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager",
      ],
      toolbar1: "formatselect fontselect fontsizeselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect| responsivefilemanager | link unlink emoticons | image media | forecolor backcolor  | print preview | code ",

      image_advtab: true,
      language: 'en_GB',
      // URL
      relative_urls: false,
      remove_script_host: true,
      document_base_url: "",
      convert_urls: true,

      external_filemanager_path: "../cdn/filemanager/",
      filemanager_title: "Responsive Filemanager",
      external_plugins: {
        "filemanager": "../filemanager/plugin.min.js"
      }
    });
  </script>





  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<?php
}
?>
<?php
function DateThai($strDate)
{
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strMonth = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));
  $strHour = date("H", strtotime($strDate));
  $strMinute = date("i", strtotime($strDate));
  $strSeconds = date("s", strtotime($strDate));
  $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
  $strMonthThai = $strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear ";
}
?>