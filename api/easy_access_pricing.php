<?php
    $response = [
        'name'=>'',
        'price'=>0,
        'code'=>'',
        'val'=>'',
    ];

    // Data
    if($type == 'data' && $product == 'mtn-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access125, easy_access126, easy_access127, easy_access45,easy_access46,easy_access47,easy_access48,easy_access49,easy_access88,easy_access89,easy_access90,easy_access141,easy_access142,easy_access143,easy_access144,easy_access145,easy_access146,easy_access147,easy_access148,easy_access149,easy_access150,easy_access151 FROM mtncgdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "MTN 50MB (CG) - 30days",
                'price' => $data_query[0],
                'code' => 125,
                'id'=>'easy_access125',
                'val'=>50,
            ],
            [
                'name' => "MTN 150MB (CG) - 30days",
                'price' => $data_query[1],
                'code' => 126,
                'id'=>'easy_access126',
                'val'=>150,
            ],
            [
                'name' => "MTN 250MB (CG) - 30days",
                'price' => $data_query[2],
                'code' => 127,
                'id'=>'easy_access127',
                'val'=>250,
            ],
            [
                'name' => "MTN 500MB (CG) - 30days",
                'val'=>500,
                'price' => $data_query[3],
                'code' => 45,
                'id'=>'easy_access45',
            ],
            [
                'name' => "MTN 1GB (CG) - 30days",
                'val'=>1000,
                'price' => $data_query[4],
                'code' => 46,
                'id'=>'easy_access46',
            ],
            [
                'name' => "MTN 2GB (CG) - 30days",
                'val'=>2000,
                'price' => $data_query[5],
                'code' => 47,
                'id'=>'easy_access47',
            ],
            [
                'name' => "MTN 3GB (CG) - 30days",
                'val'=>3000,
                'price' => $data_query[6],
                'code' => 48,
                'id'=>'easy_access48',
            ],
            [
                'name' => "MTN 5GB (CG) - 30days",
                'val'=>5000,
                'price' => $data_query[7],
                'code' => 49,
                'id' => 'easy_access49'
            ],
            [
                'name' => "MTN 10GB (CG) - 30days",
                'val'=>10000,
                'price' => $data_query[8],
                'code' => 88,
                'id' => 'easy_access88',
            ],
            [
                'name' => "MTN 12GB (CG) - 30days",
                'val'=>12000,
                'price' => $data_query[9],
                'code' => 89,
                'id' => 'easy_access89',
            ],
            [
                'name' => "MTN 15GB (CG) - 30days",
                'val' => 15000,
                'price' => $data_query[10],
                'code' => 90,
                'id' => 'easy_access90',
            ],
            [
                'name' => "MTN 20GB (CG) - 30days",
                'val' => 20000,
                'price' => $data_query[11],
                'code' => 141,
                'id' => 'easy_access141',
            ],
            [
                'name' => "MTN 25GB (CG) - 30days",
                'val' => 25000,
                'price' => $data_query[12],
                'code' => 142,
                'id' => 'easy_access142',
            ],
            [
                'name' => "MTN 30GB (CG) - 30days",
                'val' => 30000,
                'price' => $data_query[13],
                'code' => 143,
                'id' => 'easy_access143',
            ],
            [
                'name' => "MTN 40GB (CG) - 30days",
                'val' => 40000,
                'price' => $data_query[14],
                'code' => 144,
                'id' => 'easy_access144',
            ],
            [
                'name' => "MTN 50GB (CG) - 30days",
                'price' => $data_query[15],
                'val' => 50000,
                'code' => 145,
                'id' => 'easy_access145',
            ],
            [
                'name' => "MTN 60GB (CG) - 30days",
                'price' => $data_query[16],
                'val' => 60000,
                'code' => 146,
                'id' => 'easy_access146',
            ],
            [
                'name' => "MTN 70GB (CG) - 30days",
                'price' => $data_query[17],
                'val' => 70000,
                'code' => 147,
                'id' => 'easy_access147',
            ],
            [
                'name' => "MTN 75GB (CG) - 30days",
                'val' => 75000,
                'price' => $data_query[18],
                'code' => 148,
                'id' => 'easy_access148',
            ],
            [
                'name' => "MTN 80GB (CG) - 30days",
                'val' => 80000,
                'price' => $data_query[19],
                'code' => 149,
                'id' => 'easy_access149',
            ],
            [
                'name' => "MTN 90GB (CG) - 30days",
                'val' => 90000,
                'price' => $data_query[20],
                'code' => 150,
                'id' => 'easy_access150',
            ],
            [
                'name' => "MTN 100GB (CG) - 30days",
                'val' => 100000,
                'price' => $data_query[21],
                'code' => 151,
                'id' => 'easy_access151',
            ],

        ];
        
    }

    if($type == 'data' && $product == 'airtel-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access104, easy_access105, easy_access106, easy_access107,easy_access108, easy_access109, easy_access124, easy_access139,easy_access140 FROM airtelcgdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "AIRTEL 100MB (CG) - 7days",
                'val' => 100,
                'price' => $data_query[0],
                'code' => 104,
                'id'=>'easy_access104',
            ],
            [
                'name' => "AIRTEL 300MB (CG) - 7days",
                'price' => $data_query[1],
                'val' => 300,
                'code' => 105,
                'id'=>'easy_access105',
            ],
            [
                'name' => "AIRTEL 500MB (CG) - 30days",
                'val' => 500,
                'price' => $data_query[2],
                'code' => 106,
                'id'=>'easy_access106',
            ],
            [
                'name' => "AIRTEL 1GB (CG) - 30days",
                'val' => 1000,
                'price' => $data_query[3],
                'code' => 107,
                'id'=>'easy_access107',
            ],
            [
                'name' => "AIRTEL 2GB (CG) - 30days",
                'val' => 2000,
                'price' => $data_query[4],
                'code' => 108,
                'id'=>'easy_access108',
            ],
            [
                'name' => "AIRTEL 5GB (CG) - 30days",
                'val' => 5000,
                'price' => $data_query[5],
                'code' => 109,
                'id'=>'easy_access109',
            ],
            [
                'name' => "AIRTEL 10GB (CG) - 30days",
                'val' => 10000,
                'price' => $data_query[6],
                'code' => 124,
                'id'=>'easy_access124',
            ],
            [
                'name' => "AIRTEL 15GB (CG) - 30days",
                'price' => $data_query[7],
                'val' => 15000,
                'code' => 139,
                'id' => 'easy_access139'
            ],
            [
                'name' => "AIRTEL 20GB (CG) - 30days",
                'val' => 20000,
                'price' => $data_query[8],
                'code' => 140,
                'id' => 'easy_access140',
            ],
            
        ];
    }

    if($type == 'data' && $product == 'glo-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access158, easy_access159, easy_access160, easy_access161,easy_access162, easy_access163, easy_access164 FROM glocgdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "GLO 200MB (CG) - 14days",
                'val' => 200,
                'price' => $data_query[0],
                'code' => 158,
                'id'=>'easy_access158',
            ],
            [
                'name' => "GLO 500MB (CG) - 30days",
                'val' => 500,
                'price' => $data_query[1],
                'code' => 159,
                'id'=>'easy_access159',
            ],
            [
                'name' => "GLO 1GB (CG) - 30days",
                'val' => 1000,
                'price' => $data_query[2],
                'code' => 160,
                'id'=>'easy_access160',
            ],
            [
                'name' => "GLO 2GB (CG) - 30days",
                'val' => 2000,
                'price' => $data_query[3],
                'code' => 161,
                'id'=>'easy_access161',
            ],
            [
                'name' => "GLO 3GB (CG) - 30days",
                'val' => 3000,
                'price' => $data_query[4],
                'code' => 162,
                'id'=>'easy_access162',
            ],
            [
                'name' => "GLO 5GB (CG) - 30days",
                'val' => 500,
                'price' => $data_query[5],
                'code' => 163,
                'id'=>'easy_access163',
            ],
            [
                'name' => "GLO 10GB (CG) - 30days",
                'val' => 10000,
                'price' => $data_query[6],
                'code' => 164,
                'id'=>'easy_access164',
            ],
        ];
    }

    // SMEs
    if($type == 'sme' && $product == 'apimobile-sme'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access166, easy_access167, easy_access168, easy_access128,easy_access129, easy_access130, easy_access131, easy_access132,easy_access169,easy_access134,easy_access135,easy_access170,easy_access136,easy_access171,easy_access137,easy_access138,easy_access172,easy_access173,easy_access174,easy_access175,easy_access176 FROM mobilesmedata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => "9MOBILE 100MB (SME) - 30days",
                'val' => 100,
                'price' => $data_query[0],
                'code' => 166,
                'id'=>'easy_access166',
            ],
            [
                'name' => "9MOBILE 300MB (SME) - 30days",
                'val' => 300,
                'price' => $data_query[1],
                'code' => 167,
                'id'=>'easy_access167',
            ],
            [
                'name' => "9MOBILE 500MB (SME) - 30days",
                'val' => 500,
                'price' => $data_query[2],
                'code' => 168,
                'id'=>'easy_access168',
            ],
            [
                'name' => "9MOBILE 1GB (SME) - N190 30days",
                'val' => 1000,
                'price' => $data_query[3],
                'code' => 128,
                'id'=>'easy_access128',
            ],
            [
                'name' => "9MOBILE 1.5GB (SME) - 30days",
                'val' => 1500,
                'price' => $data_query[4],
                'code' => 129,
                'id'=>'easy_access129',
            ],
            [
                'name' => "9MOBILE 2GB (SME) - 30days",
                'val' => 2000,
                'price' => $data_query[5],
                'code' => 130,
                'id'=>'easy_access130',
            ],
            [
                'name' => "9MOBILE 2.5GB (SME) - 30days",
                'val' => 25000,
                'price' => $data_query[6],
                'code' => 131,
                'id' => 'easy_access131'
            ],

            [
                'name' => "9MOBILE 3GB (SME) - 30days",
                'val' => 3000,
                'price' => $data_query[7],
                'code' => 132,
                'id' => 'easy_access132',
            ],
            [
                'name' => "9MOBILE 4GB (SME) - 30days",
                'val' => 4000,
                'price' => $data_query[8],
                'code' => 169,
                'id' => 'easy_access169',
            ],
            [
                'name' => "9MOBILE 5GB (SME) - 30days",
                'val' => 5000,
                'price' => $data_query[9],
                'code' => 134,
                'id' => 'easy_access134',
            ],
            [
                'name' => "9MOBILE 6GB (SME) - 30days",
                'val' => 6000,
                'price' => $data_query[10],
                'code' => 135,
                'id' => 'easy_access135',
            ],
            [
                'name' => "9MOBILE 7.5GB (SME) - 30days",
                'val' => 7500,
                'price' => $data_query[11],
                'code' => 170,
                'id' => 'easy_access170',
            ],
            [
                'name' => "9MOBILE 10GB (SME) - 30days",
                'val' => 10000,
                'price' => $data_query[12],
                'code' => 136,
                'id' => 'easy_access136',
            ],
            [
                'name' => "9MOBILE 11GB (SME) - 30days",
                'val' => 11000,
                'price' => $data_query[13],
                'code' => 171,
                'id' => 'easy_access171',
            ],
            [
                'name' => "9MOBILE 15GB (SME) - 30days",
                'val' => 15000,
                'price' => $data_query[14],
                'code' => 137,
                'id' => 'easy_access137',
            ],
            [
                'name' => "9MOBILE 20GB (SME) - 30days",
                'val' => 20000,
                'price' => $data_query[15],
                'code' => 138,
                'id' => 'easy_access138',
            ],
            [
                'name' => "9MOBILE 25GB (SME) - 30days",
                'val' => 25000,
                'price' => $data_query[16],
                'code' => 172,
                'id' => 'easy_access172',
            ],
            [
                'name' => "9MOBILE 30GB (SME) - 30days",
                'val' => 30000,
                'price' => $data_query[17],
                'code' => 173,
                'id' => 'easy_access173',
            ],
            [
                'name' => "9MOBILE 40GB (SME) - 30days",
                'val' => 40000,
                'price' => $data_query[18],
                'code' => 174,
                'id' => 'easy_access174',
            ],
            [
                'name' => "9MOBILE 50GB (SME) - 30days",
                'val' => 50000,
                'price' => $data_query[19],
                'code' => 175,
                'id' => 'easy_access175',
            ],
            [
                'name' => "9MOBILE 100GB (SME) - 30days",
                'val' => 100000,
                'price' => $data_query[20],
                'code' => 176,
                'id' => 'easy_access176',
            ],
            
        ];

    }

    // Data card
    if ($type == 'datacard' && $product == 'mtn-data-card') {
        $data_query=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM mtndata_card_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => "MTN 1.5GB (DATACARD) - 30days",
                'val' => 1500,
                'price' => $data_query['easy_access165'],
                'code' => 165,
                'id' => 'easy_access165',
            ],

        ];
    }
    
?>