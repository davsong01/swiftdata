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
                'name' => "MTN SME 500MB",
                'price' => $data_query[0],
                'code' => 125,
                'id'=>'',
                'val'=>500,
            ],
            [
                'name' => "MTN-SME 1GB",
                'price' => $data_query[1],
                'code' => 125,
                'id'=>'',
                'val'=>1000,
            ],
            [
                'name' => "MTN-SME 2GB",
                'price' => $data_query[2],
                'code' => 125,
                'id'=>'',
                'val'=>2000,
            ],
            [
                'name' => "MTN-SME 3GB",
                'price' => $data_query[3],
                'code' => 125,
                'id' => '',
                'val' => 3000,
            ],
            [
                'name' => "MTN-SME 5GB",
                'price' => $data_query[4],
                'code' => 125,
                'id' => '',
                'val' => 5000,
            ],
            [
                'name' => "MTN-SME 10GB",
                'price' => $data_query[5],
                'code' => 125,
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

    
?>