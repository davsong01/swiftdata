<?php
    $response = [
        'name'=>'',
        'price'=>0,
        'code'=>'',
        'val'=>'',
    ];

    // MTN data
    if ($type == "data" && $product == "mtn" ) {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtnsme_500,mtnsme_1, mtnsme_2, mtnsme_3, mtnsme_5, mtnsme_10 FROM mtnsmedata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => "MTN SME 500M",
                'price' => $data_query[0],
                'code' => 289,
                'id'=>'',
                'val'=>500,
            ],
            [
                'name' => "MTN-SME 1GB",
                'price' => $data_query[1],
                'code' => 290,
                'id'=>'',
                'val'=>1000,
            ],
            [
                'name' => "MTN-SME 2GB",
                'price' => $data_query[2],
                'code' => 291,
                'id'=>'',
                'val'=>2000,
            ],
            [
                'name' => "MTN-SME 3GB",
                'price' => $data_query[3],
                'code' => 292,
                'id' => '',
                'val' => 3000,
            ],
            [
                'name' => "MTN-SME 5GB",
                'price' => $data_query[4],
                'code' => 293,
                'id' => '',
                'val' => 5000,
            ],
            [
                'name' => "MTN-SME 10GB",
                'price' => $data_query[5],
                'code' => 294,
                'id' => '',
                'val' => 10000,
            ],

        ];

    }

    // mtn cg
    if ($type == "data" && $product == "mtn-cg") {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mtncg_500,mtncg_1, mtncg_2, mtncg_3, mtncg_5, mtncg_10 FROM mtncgdata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => "MTN-CG 500MB",
                'price' => $data_query[0],
                'code' => 125,
                'id' => '',
                'val' => 500,
            ],
            [
                'name' => "MTN-CG 1GB",
                'price' => $data_query[1],
                'code' => 125,
                'id' => '',
                'val' => 1000,
            ],
            [
                'name' => "MTN-CG 2GB",
                'price' => $data_query[2],
                'code' => 125,
                'id' => '',
                'val' => 2000,
            ],
            [
                'name' => "MTN-CG 3GB",
                'price' => $data_query[3],
                'code' => 125,
                'id' => '',
                'val' => 3000,
            ],
            [
                'name' => "MTN-CG 5GB",
                'price' => $data_query[4],
                'code' => 125,
                'id' => '',
                'val' => 5000,
            ],

            [
                'name' => "MTN-CG 10GB",
                'price' => $data_query[5],
                'code' => 125,
                'id' => '',
                'val' => 10000,
            ],

        ];

    }

    // airtel cg
    if ($type == "data" && $product == "airtel-cg") {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtelcg_100,airtelcg_300, airtelcg_500, airtelcg_1, airtelcg_2, airtelcg_5  FROM airtelcgdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "AIRTEL-CG 100MB",
                'price' => $data_query[0],
                'code' => 601,
                'id' => '',
                'val' => 100,
            ],
            [
                'name' => "AIRTEL-CG 300MB",
                'price' => $data_query[1],
                'code' => 602,
                'id' => '',
                'val' => 300,
            ],
            [
                'name' => "AIRTEL-CG 500MB",
                'price' => $data_query[2],
                'code' => 603,
                'id' => '',
                'val' => 500,
            ],
            [
                'name' => "AIRTEL-CG 1GB",
                'price' => $data_query[3],
                'code' => 604,
                'id' => '',
                'val' => 1000,
            ],
            [
                'name' => "AIRTEL-CG 2GB",
                'price' => $data_query[4],
                'code' => 605,
                'id' => '',
                'val' => 2000,
            ],

            [
                'name' => "AIRTEL-CG 5GB",
                'price' => $data_query[5],
                'code' => 606,
                'id' => '',
                'val' => 5000,
            ],

        ];

    }

    // airtel data
    if ($type == "data" && $product == "airtel") {        
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT airtel_750,airtel_15, airtel_2, airtel_3, airtel_45, airtel_6, airtel_10, airtel_11, airtel_20, airtel_40, airtel_75,airtel_120  FROM airteldata_plan WHERE id='$level'"));

		// echo '
		// 	<option value="501">AIRTEL 750MB - ₦'.$data_query[0].'</option>
		// 	<option value="502">AIRTEL 1.5GB - ₦'.$data_query[1].'</option>
		// 	<option value="503">AIRTEL 2GB - ₦'.$data_query[2].'</option>
		// 	<option value="504">AIRTEL 3GB - ₦'.$data_query[3].'</option>
		// 	<option value="505">AIRTEL 4.5GB - ₦'.$data_query[4].'</option>
		// 	<option value="506">AIRTEL 6GB - ₦'.$data_query[5].'</option>
		// 	<option value="507">AIRTEL 10GB - ₦'.$data_query[6].'</option>
		// 	<option value="508">AIRTEL 11GB - ₦'.$data_query[7].'</option>
		// 	<option value="509">AIRTEL 20GB - ₦'.$data_query[8].'</option>
		// 	<option value="510">AIRTEL 40GB - ₦'.$data_query[9].'</option>
		// 	<option value="511">AIRTEL 75GB - ₦'.$data_query[10].'</option>
		// 	<option value="512">AIRTEL 120GB - ₦'.$data_query[11].'</option>
		// ';

        $response = [
            [
                'name' => "AIRTEL 750MB",
                'price' => $data_query[0],
                'code' => 501,
                'id' => '',
                'val' => 750,
            ],
            [
                'name' => "AIRTEL 1.5GB",
                'price' => $data_query[1],
                'code' => 502,
                'id' => '',
                'val' => 1500,
            ],
            [
                'name' => "AIRTEL 2GB",
                'price' => $data_query[2],
                'code' => 503,
                'id' => '',
                'val' => 2000,
            ],
            [
                'name' => "AIRTEL 3GB",
                'price' => $data_query[3],
                'code' => 504,
                'id' => '',
                'val' => 3000,
            ],
            [
                'name' => "AIRTEL 4.5GB",
                'price' => $data_query[4],
                'code' => 505,
                'id' => '',
                'val' => 4500,
            ],
            [
                'name' => "AIRTEL 6GB",
                'price' => $data_query[5],
                'code' => 506,
                'id' => '',
                'val' => 6000,
            ],
            [
                'name' => "AIRTEL 10GB",
                'price' => $data_query[6],
                'code' => 507,
                'id' => '',
                'val' => 10000,
            ],
            [
                'name' => "AIRTEL 11GB",
                'price' => $data_query[7],
                'code' => 508,
                'id' => '',
                'val' => 11000,
            ],
            [
                'name' => "AIRTEL 20GB",
                'price' => $data_query[8],
                'code' => 509,
                'id' => '',
                'val' => 20000,
            ],
            [
                'name' => "AIRTEL 40GB",
                'price' => $data_query[9],
                'code' => 510,
                'id' => '',
                'val' => 40000,
            ],
            [
                'name' => "AIRTEL 75GB",
                'price' => $data_query[10],
                'code' => 511,
                'id' => '',
                'val' => 75000,
            ],
            [
                'name' => "AIRTEL 120GB",
                'price' => $data_query[11],
                'code' => 512,
                'id' => '',
                'val' => 120000,
            ],

        ];

    }

    // glo cg
    if ($type == "data" && $product == "glo-cg") {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT glocg_200, glocg_500, glocg_1, glocg_2, glocg_3, glocg_5, glocg_10 FROM glocgdata_plan WHERE id='$level'"));
			
        $response = [
            [
                'name' => "GLO-CG 200MB",
                'price' => $data_query[0],
                'code' => 901,
                'id' => '',
                'val' => 200,
            ],
            [
                'name' => "GLO-CG 500MB",
                'price' => $data_query[1],
                'code' => 902,
                'id' => '',
                'val' => 500,
            ],
            [
                'name' => "GLO-CG 1GB",
                'price' => $data_query[2],
                'code' => 903,
                'id' => '',
                'val' => 1000,
            ],
            [
                'name' => "GLO-CG 2GB",
                'price' => $data_query[3],
                'code' => 904,
                'id' => '',
                'val' => 2000,
            ],
            [
                'name' => "GLO-CG 3GB",
                'price' => $data_query[4],
                'code' => 905,
                'id' => '',
                'val' => 3000,
            ],

            [
                'name' => "GLO-CG 5GB",
                'price' => $data_query[5],
                'code' => 906,
                'id' => '',
                'val' => 5000,
            ],
            [
                'name' => "GLO-CG 10GB",
                'price' => $data_query[5],
                'code' => 907,
                'id' => '',
                'val' => 10000,
            ],

        ];

    }

    // 9mobile
    if ($type == "data" && $product == "9mobile") {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT mobile_500,mobile_15, mobile_2, mobile_3, mobile_45, mobile_11, mobile_150, mobile_40, mobile_75  FROM mobiledata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => "9MOBILE 500MB",
                'price' => $data_query[0],
                'code' => 401,
                'id' => '',
                'val' => 500,
            ],
            [
                'name' => "9MOBILE 1.5GB",
                'price' => $data_query[1],
                'code' => 402,
                'id' => '',
                'val' => 1500,
            ],
            [
                'name' => "9MOBILE 2GB",
                'price' => $data_query[2],
                'code' => 403,
                'id' => '',
                'val' => 2000,
            ],
            [
                'name' => "9MOBILE 3GB",
                'price' => $data_query[3],
                'code' => 404,
                'id' => '',
                'val' => 3000,
            ],
            [
                'name' => "9MOBILE 4.5GB",
                'price' => $data_query[4],
                'code' => 405,
                'id' => '',
                'val' => 4500,
            ],

            [
                'name' => "9MOBILE 11GB",
                'price' => $data_query[5],
                'code' => 406,
                'id' => '',
                'val' => 11000,
            ],
            [
                'name' => "9MOBILE 15GB",
                'price' => $data_query[6],
                'code' => 407,
                'id' => '',
                'val' => 15000,
            ],
            [
                'name' => "9MOBILE 40GB",
                'price' => $data_query[7],
                'code' => 408,
                'id' => '',
                'val' => 40000,
            ],
            [
                'name' => "9MOBILE 75GB",
                'price' => $data_query[8],
                'code' => 409,
                'id' => '',
                'val' => 75000,
            ],

        ];

    }


    
?>