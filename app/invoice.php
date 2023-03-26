<?php require("../functions/web_config.php"); ?>
<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title><?php echo $sitename; ?></title>
	<link rel="icon" type="image/png" href="../access/images/favicon.png">

<link rel="stylesheet" href="backend/css/bootstrap1.min.css" />

<link rel="stylesheet" href="backend/vendors/themefy_icon/themify-icons.css" />

<link rel="stylesheet" href="backend/vendors/niceselect/css/nice-select.css" />

<link rel="stylesheet" href="backend/vendors/owl_carousel/css/owl.carousel.css" />

<link rel="stylesheet" href="backend/vendors/gijgo/gijgo.min.css" />

<link rel="stylesheet" href="backend/vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="backend/vendors/tagsinput/tagsinput.css" />

<link rel="stylesheet" href="backend/vendors/datepicker/date-picker.css" />
<link rel="stylesheet" href="backend/vendors/vectormap-home/vectormap-2.0.2.css" />

<link rel="stylesheet" href="backend/vendors/scroll/scrollable.css" />

<link rel="stylesheet" href="backend/vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="backend/vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="backend/vendors/datatable/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="backend/vendors/text_editor/summernote-bs4.css" />

<link rel="stylesheet" href="backend/vendors/morris/morris.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="backend/vendors/material_icon/material-icons.css" />

<link rel="stylesheet" href="backend/css/metisMenu.css">

<link rel="stylesheet" href="backend/css/style1.css" />
<link rel="stylesheet" href="backend/css/colors/default.css" id="colorSkinCSS">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>
<script type="text/javascript" src="backend/js/overlay.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
    .centered {
position: realtive;
text-align: center;
top: 2px;
left: 5px;
margin: 0 auto;
transform:translateY(-50%);
}

.parent {
background: #CCCCCC;
height: 650px;
width: 100%;
border-radius:10px;
position: relative;
}
.child {
background: #FFFF00;
width: 130px;
height: 74px;
top: 1%;
right: 7%;
}

.child2 {
background: #FFFF00;
width: 130px;
height: 74px;
top: 1%;
left: 4%;
}
</style>
</head>
<body class="crm_body_bg" id="genReceipt">


<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<h3 class="large_logo"><?php echo strtoupper($sitename); ?></h3>

</div>

</nav>

<section class="main_content dashboard_part large_header_bg">

</div>
</div>
<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_30 f_w_700 dark_text">Invoice - <?php echo strtoupper($sitename); ?></h3>
<ol class="breadcrumb page_bradcam mb-0">
<li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
<li class="breadcrumb-item active">invoice</li>
</ol>
</div>

</div>
</div>
</div>


<?php

if (isset($_GET['reference']) && !empty($_GET['reference'])){

$receipt="";
$buttons="<a href='transactions'><button class='btn btn-danger'>Go Back </button></a> <button class='btn btn-success' id='PdfDial'>Print Slip </button>";
$reference=$_GET['reference'];
 $lettr= mysqli_query($con, "SELECT * FROM final_transactions WHERE sys_ref='$reference' ORDER BY id DESC LIMIT 1");
if (mysqli_num_rows($lettr)<1){
 
 $receipt= '
	<div class="media_thumb ml_25">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
		<h3 style="font-weight: bold;font-size: 20px;">Sorry !!! Transaction Not Found</h3>
		<p>There is no reference no supply for this transaction !!! </p>
	</center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</div>
	';

}

else {

$transactdata = mysqli_fetch_array($lettr, MYSQLI_ASSOC);
      $tid=$transactdata['id'];
      $status=$transactdata['buyer_status'];
      $amount=$transactdata['buyer_amount'];
      $trx=$transactdata['sys_ref'];
      $buyer_mobile=$transactdata['mobile_number'];
      $descr=$transactdata['buyer_descr'];
      $buyer_service=$transactdata['buyer_service'];
      $buyer_email=$transactdata['buyer_email'];
      $date=$transactdata['buyer_date'];
      $oldbal=$transactdata['buyer_prebal'];
      $newbal=$transactdata['buyer_postbal'];

      if ($status=="SUCCESSFUL"){$actmode="background-color: lightseagreen";}
      else {$actmode="background-color: palevioletred";}

$receipt= '

<div class="row ">
<div class="col-12 QA_section">
<div class="card QA_table ">
<div class="card-header">
Invoice

<strong>'.$date.'</strong>
<span class="float-end"> <strong>Status:</strong> '.$status.'</span>
</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">From:</h6>
<div>
<strong>Order 1</strong>
</div>
<div>'.$trx.'</div>
<div>Buyer Email: '.$buyer_email.'</div>
<div>Buyer Phone: '.$buyer_mobile.'</div>
</div>
</div>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th>Description</th>
<th class="right">Cost</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td class="left strong">'.strtoupper($buyer_service).'</td>
<td class="left">'.$descr.'</td>
<td class="right">'.$amount.'</td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">
</div>
<div class="col-lg-4 col-sm-5 ms-auto QA_section">
<table class="table table-clear QA_table">
<tbody>
<tr>
<td class="left">
<strong>Amount</strong>
</td>
<td class="right">N '.$amount.'</td>
</tr>
<tr>
<td class="left">
<strong>Prev Bal.</strong>
</td>
<td class="right">N '.$oldbal.'</td>
 </tr>
<tr>
<td class="left">
<strong>Post Bal.</strong>
</td>
<td class="right">N '.$newbal.'</td>
</tr>
</tbody>
</table>
</div>
</div>

';
}


echo $receipt;

echo $buttons;
?>


<?php
}

else {

	echo '
	<div class="media_thumb ml_25">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
		<h3 style="font-weight: bold;font-size: 20px;">Sorry !!!</h3>
		<p>There is no reference no supply for this transaction !!! </p>
	</center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</div>
	';
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script type="text/javascript">
      document.getElementById('PdfDial').addEventListener('click',
       Export);

  function Export() {
            html2canvas(document.getElementById('genReceipt'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("TransactionReceipt.pdf");
                }
            });
        }  </script>

<?php require ("site_footer.php"); ?>