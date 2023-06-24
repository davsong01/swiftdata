<?php
    $response = [
        'name'=>'',
        'price'=>'',
        'code'=>'',
    ];

    if($type == 'data' && $product == 'mtn-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gongzo_data280, gongzo_data281, gongzo_data282, gongzo_data283,gongzo_data284,gongzo_data285,gongzo_data286,gongzo_data287,gongzo_data288 FROM mtncgdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "MTN 500MB (CG) - 30days",
                'price' => $data_query[0],
                'code' => 280,
                'id'=>'gongzo_data280',
                'val' => '500',
            ],
            [
                'name' => "MTN 1GB (CG) - 30days",
                'price' => $data_query[1],
                'code' => 281,
                'id'=>'gongzo_data281',
                'val' => '1000',

            ],
            [
                'name' => "MTN 2GB (CG) - 30days",
                'price' => $data_query[2],
                'code' => 282,
                'id'=>'gongzo_data282',
                'val' => '2000',
            ],
            [
                'name' => "MTN 3GB (CG) - 30days",
                'price' => $data_query[3],
                'code' => 283,
                'id'=>'gongzo_data283',
                'val' => '3000',

            ],
            [
                'name' => "MTN 5GB (CG) - 30days",
                'price' => $data_query[4],
                'code' => 284,
                'id'=>'gongzo_data284',
                'val' => '5000',

            ],
            [
                'name' => "MTN 10GB (CG) - 30days",
                'price' => $data_query[5],
                'code' => 285,
                'id'=>'gongzo_data285',
                'val' => '10000',

            ],
            [
                'name' => "MTN 15GB (CG) - 30days",
                'price' => $data_query[6],
                'code' => 286,
                'id'=>'gongzo_data286',
                'val' => '15000',
            ],
            [
                'name' => "MTN 20GB (CG) - 30days",
                'price' => $data_query[7],
                'code' => 287,
                'id' => 'gongzo_data287',
                'val' => '20000',
            ],
            [
                'name' => "MTN 40GB (CG) - 30days",
                'price' => $data_query[8],
                'code' => 288,
                'id' => 'gongzo_data288',
                'val' => '40000',
            ],
        ];
        
    }

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

    if($type == 'data' && $product == 'airtel-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gongzo_data312, gongzo_data313, gongzo_data314, gongzo_data315,gongzo_data317, gongzo_data318, gongzo_data319 FROM airtelcgdata_plan WHERE id='$level'"));
    
        $response = [
            [
                'name' => "AIRTEL CG 500MB - 7days",
                'price' => $data_query[0],
                'code' => 312,
                'id'=>'gongzo_data312',
                'val'=>'500',
            ],
            [
                'name' => "AIRTEL CG 1GB - 30days",
                'price' => $data_query[1],
                'code' => 313,
                'id'=> 'gongzo_data313',
                'val'=>'1000',

            ],
            [
                'name' => "AIRTEL CG 2GB - 30days",
                'price' => $data_query[2],
                'code' => 314,
                'id'=> 'gongzo_data314',
                'val'=>'2000',
            ],
            [
                'name' => "AIRTEL CG 5GB - 30days",
                'price' => $data_query[3],
                'code' => 315,
                'id'=>'gongzo_data315',
                'val'=>'5000',

            ],
            [
                'name' => "AIRTEL CG 10GB - 30days",
                'price' => $data_query[4],
                'code' => 317,
                'id'=> 'gongzo_data317',
                'val'=>'10000',

            ],
            [
                'name' => "AIRTEL CG 300MB - 1 DAY",
                'price' => $data_query[5],
                'code' => 318,
                'id'=> 'gongzo_data318',
                'val'=>'300',

            ],
            [
                'name' => "AIRTEL CG 200MB - 1 DAY",
                'price' => $data_query[6],
                'code' => 319,
                'id'=> 'gongzo_data319',
                'val'=>'200',

            ],
        ];

    }

    if($type == 'data' && $product == 'glo-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT gongzo_data321, gongzo_data322, gongzo_data323,gongzo_data324,gongzo_data325, gongzo_data326, gongzo_data327,gongzo_data337 FROM glocgdata_plan WHERE id='$level'"));
        // 321 	GLO 	CORPORATE GIFTING 	₦225 	1.0 GB 	MONTHLY
        // 322 	GLO 	CORPORATE GIFTING 	₦450 	2.0 GB 	MONTHLY
        // 323 	GLO 	CORPORATE GIFTING 	₦690 	3.0 GB 	MONTHLY
        // 324 	GLO 	CORPORATE GIFTING 	₦1125 	5.0 GB 	MONTHLY
        // 325 	GLO 	CORPORATE GIFTING 	₦2300 	10.0 GB 	MONTHLY
        // 326 	GLO 	CORPORATE GIFTING 	₦125 	500.0 MB 	14 DAYS
        // 327 	GLO 	CORPORATE GIFTING 	₦150 	500.0 MB 	MONTHLY
        // 337 	GLO 	CORPORATE GIFTING 	₦50 	200.0 MB 	14DAYS
        $response = [
            [
                'name' => "GLO (CG) 1.0 GB - 30days",
                'price' => $data_query[0],
                'code' => 321,
                'id'=>'gongzo_data321',
            ],
            [
                'name' => "GLO (CG) 2.0 GB - 30days",
                'price' => $data_query[1],
                'code' => 322,
                'id'=>'gongzo_data322',
            ],
            [
                'name' => "GLO (CG) 3.0 GB - 30days",
                'price' => $data_query[2],
                'code' => 323,
                'id'=>'gongzo_data323',
            ],
            [
                'name' => "GLO (CG) 5.0 GB - 30days",
                'price' => $data_query[3],
                'code' => 324,
                'id'=>'gongzo_data324',
            ],
            [
                'name' => "GLO (CG) 10.0 GB - 30days",
                'price' => $data_query[4],
                'code' => 325,
                'id'=>'gongzo_data325',
            ],
            [
                'name' => "GLO (CG) 500MB (CG) - 14days",
                'price' => $data_query[5],
                'code' => 326,
                'id'=>'gongzo_data326',
            ],
            [
                'name' => "GLO 500MB (CG) - 30days",
                'price' => $data_query[6],
                'code' => 327,
                'id'=>'gongzo_data327',
            ],
            [
                'name' => "GLO 200MB (CG) - 14days",
                'price' => $data_query[7],
                'code' => 337,
                'id' => 'gongzo_data337',
            ],
        ];
    }

    if($type == 'sme' && $product == 'apimobile-sme'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access166, easy_access167, easy_access168, easy_access128,easy_access129, easy_access130, easy_access131, easy_access132,easy_access169,easy_access134,easy_access135,easy_access170,easy_access136,easy_access171,easy_access137,easy_access138,easy_access172,easy_access173,easy_access174,easy_access175,easy_access176 FROM mobilesmedata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "9MOBILE 100MB (SME) - 30days",
                'price' => $data_query[0],
                'code' => 166,
                'id'=>'easy_access166',
            ],
            [
                'name' => "9MOBILE 300MB (SME) - 30days",
                'price' => $data_query[1],
                'code' => 167,
                'id'=>'easy_access167',
            ],
            [
                'name' => "9MOBILE 500MB (SME) - 30days",
                'price' => $data_query[2],
                'code' => 168,
                'id'=>'easy_access168',
            ],
            [
                'name' => "9MOBILE 1GB (SME) - N190 30days",
                'price' => $data_query[3],
                'code' => 128,
                'id'=>'easy_access128',
            ],
            [
                'name' => "9MOBILE 1.5GB (SME) - 30days",
                'price' => $data_query[4],
                'code' => 129,
                'id'=>'easy_access129',
            ],
            [
                'name' => "9MOBILE 2GB (SME) - 30days",
                'price' => $data_query[5],
                'code' => 130,
                'id'=>'easy_access130',
            ],
            [
                'name' => "9MOBILE 2.5GB (SME) - 30days",
                'price' => $data_query[6],
                'code' => 131,
                'id' => 'easy_access131'
            ],

            [
                'name' => "9MOBILE 3GB (SME) - 30days",
                'price' => $data_query[7],
                'code' => 132,
                'id' => 'easy_access132',
            ],
            [
                'name' => "9MOBILE 4GB (SME) - 30days",
                'price' => $data_query[8],
                'code' => 169,
                'id' => 'easy_access169',
            ],
            [
                'name' => "9MOBILE 5GB (SME) - 30days",
                'price' => $data_query[9],
                'code' => 134,
                'id' => 'easy_access134',
            ],
            [
                'name' => "9MOBILE 6GB (SME) - 30days",
                'price' => $data_query[10],
                'code' => 135,
                'id' => 'easy_access135',
            ],
            [
                'name' => "9MOBILE 7.5GB (SME) - 30days",
                'price' => $data_query[11],
                'code' => 170,
                'id' => 'easy_access170',
            ],
            [
                'name' => "9MOBILE 10GB (SME) - 30days",
                'price' => $data_query[12],
                'code' => 136,
                'id' => 'easy_access136',
            ],
            [
                'name' => "9MOBILE 11GB (SME) - 30days",
                'price' => $data_query[13],
                'code' => 171,
                'id' => 'easy_access171',
            ],
            [
                'name' => "9MOBILE 15GB (SME) - 30days",
                'price' => $data_query[14],
                'code' => 137,
                'id' => 'easy_access137',
            ],
            [
                'name' => "9MOBILE 20GB (SME) - 30days",
                'price' => $data_query[15],
                'code' => 138,
                'id' => 'easy_access138',
            ],
            [
                'name' => "9MOBILE 25GB (SME) - 30days",
                'price' => $data_query[16],
                'code' => 172,
                'id' => 'easy_access172',
            ],
            [
                'name' => "9MOBILE 30GB (SME) - 30days",
                'price' => $data_query[17],
                'code' => 173,
                'id' => 'easy_access173',
            ],
            [
                'name' => "9MOBILE 40GB (SME) - 30days",
                'price' => $data_query[18],
                'code' => 174,
                'id' => 'easy_access174',
            ],
            [
                'name' => "9MOBILE 50GB (SME) - 30days",
                'price' => $data_query[19],
                'code' => 175,
                'id' => 'easy_access175',
            ],
            [
                'name' => "9MOBILE 100GB (SME) - 30days",
                'price' => $data_query[20],
                'code' => 176,
                'id' => 'easy_access176',
            ],
            
        ];


    // 166 => 100MB (SME) - N28 30days, 
    // 167 => 300MB (SME) - N63 30days, 
    // 168 => 500MB (SME) - N96 30days, 
    // 128 => 1GB (SME) - N190 30days, 
    // 129 => 1.5GB (SME) - N285 30days, 
    // 130 => 2GB (SME) - N380 30days, 
    // 131 => 2.5GB (SME) - N485 30days, 
    // 132 => 3GB (SME) - N570 30days, 
    // 169 => 4GB (SME) - N760 30days, 
    // 134 => 5GB (SME) - N950 30days,
    //  135 => 6GB (SME) - N1140 30days, 
    //  170 => 7.5GB (SME) - N1425 30days, 
    //  136 => 10GB (SME) - N1900 30days, 
    //  171 => 11GB (SME) - N2090 30days, 
    //  137 => 15GB (SME) - N2850 30days, 
    //  138 => 20GB (SME) - N3800 30days, 
    //  172 => 25GB (SME) - N4750 30days, 
    //  173 => 30GB (SME) - N5700 30days, 
    //  174 => 40GB (SME) - N7600 30days, 
    //  175 => 50GB (SME) - N9500 30days, 
    //  176 => 100GB (SME) - N19000 30days,
    }
    
?>