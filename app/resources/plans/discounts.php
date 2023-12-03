<?php
error_reporting(0);
$rtdata="";

if (!empty($_GET['services']) && !empty($_GET['level'])){
	require("../../../functions/web_config.php");

	$level=$_GET['level'];

	$getservices=strtolower($_GET['services']);
	//BILLS-START
	if ($getservices == "dstv") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT dstv_discount FROM dstv_planlist WHERE id='$level'"));
		if ($data_query[0] > 0) {
			$echo  = '
				<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[0] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
				</div>
			';
		}
	}

	if ($getservices == "gotv") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gotv_discount FROM gotv_planlist WHERE id='$level'"));
		if ($data_query[0] > 0) {
			$echo  = '
				<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[0] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
				</div>
			';
		}
	}

	if ($getservices == "startimes") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT star_discount FROM startime_planlist WHERE id='$level'"));
		if ($data_query[0] > 0) {
			$echo  = '
				<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[0] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
				</div>
			';
		}
	}

	if ($getservices == "showmax") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT showmax_discount FROM showmax_planlist WHERE id='$level'"));
		if ($data_query[0] > 0) {
			$echo  = '
				<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[0] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
				</div>
			';
		}
	}

	if ($getservices == "abuja-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT abuja,abuja_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
				<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[0] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
				</div>
			';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "ibadan-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ibadan,ibadan_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
				<div class="alert alert-warning alert-dismissible">
				₦' . $data_query[0] . ' charges apply <br>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			';
		}
		if ($data_query[1] > 0) {
			echo '
				<div class="alert alert-success alert-dismissible">
					<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
					<button type="button" class="btn-close" 
					data-bs-dismiss="alert"
					aria-label="Close">
					</button>
					</div>
				</div>
			';
		}
	}

	if ($getservices == "eko-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT eko, eko_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "jos-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT jos,jos_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "kaduna-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kaduna, kaduna_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "kano-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT kano,kano_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "ikeja-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT ikeja, ikeja_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "portharcourt-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT portharcourt,portharcourt_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "benin-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT benin,benin_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
			<button type="button" class="btn-close" 
			data-bs-dismiss="alert"
			aria-label="Close">
			</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "enugu-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT enugu,enugu_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}

	if ($getservices == "aba-electric") {
		$data_query = mysqli_fetch_array(mysqli_query($con, "SELECT aba,aba_discount FROM bills_planlists WHERE id='$level'"));
		if ($data_query[0] > 0) {
			echo '
			<div class="alert alert-warning alert-dismissible">
			₦' . $data_query[0] . ' charges apply <br>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
			</div>
		';
		}
		if ($data_query[1] > 0) {
			echo '
			<div class="alert alert-success alert-dismissible">
				<strong class="discount-text">' . $data_query[1] . '% Discount applies for you</strong>
				<button type="button" class="btn-close" 
				data-bs-dismiss="alert"
				aria-label="Close">
				</button>
				</div>
			</div>
		';
		}
	}
	echo $echo;
}else{
	echo "NULL";
	exit();
}

?>