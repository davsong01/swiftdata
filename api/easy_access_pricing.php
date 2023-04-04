<?php
    $response = [
        'name'=>'',
        'price'=>'',
        'code'=>'',
    ];
    
    if($type == 'data' && $product == 'mtn-cg'){
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT easy_access125, easy_access126, easy_access127, easy_access45,easy_access46,easy_access47,easy_access48,easy_access49,easy_access88,easy_access89,easy_access90,easy_access141,easy_access142,easy_access143,easy_access144,easy_access145,easy_access146,easy_access147,easy_access148,easy_access149,easy_access150,easy_access151 FROM mtncgdata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => "MTN 50MB (CG) - 30days",
                'price' => $data_query[0],
                'code' => 125,
                'id'=>'easy_access125',
            ],
            [
                'name' => "MTN 150MB (CG) - 30days",
                'price' => $data_query[1],
                'code' => 126,
                'id'=>'easy_access126',
            ],
            [
                'name' => "MTN 250MB (CG) - 30days",
                'price' => $data_query[2],
                'code' => 127,
                'id'=>'easy_access127',
            ],
            [
                'name' => "MTN 500MB (CG) - 30days",
                'price' => $data_query[3],
                'code' => 45,
                'id'=>'easy_access45',
            ],
            [
                'name' => "MTN 1GB (CG) - 30days",
                'price' => $data_query[4],
                'code' => 46,
                'id'=>'easy_access46',
            ],
            [
                'name' => "MTN 2GB (CG) - 30days",
                'price' => $data_query[5],
                'code' => 47,
                'id'=>'easy_access47',
            ],
            [
                'name' => "MTN 3GB (CG) - 30days",
                'price' => $data_query[6],
                'code' => 48,
                'id'=>'easy_access48',
            ],
            [
                'name' => "MTN 5GB (CG) - 30days",
                'price' => $data_query[7],
                'code' => 49,
                'id' => 'easy_access49'
            ],
            [
                'name' => "MTN 10GB (CG) - 30days",
                'price' => $data_query[8],
                'code' => 88,
                'id' => 'easy_access88',
            ],
            [
                'name' => "MTN 12GB (CG) - 30days",
                'price' => $data_query[9],
                'code' => 89,
                'id' => 'easy_access89',
            ],
            [
                'name' => "MTN 15GB (CG) - 30days",
                'price' => $data_query[10],
                'code' => 90,
                'id' => 'easy_access90',
            ],
            [
                'name' => "MTN 20GB (CG) - 30days",
                'price' => $data_query[11],
                'code' => 141,
                'id' => 'easy_access141',
            ],
            [
                'name' => "MTN 25GB (CG) - 30days",
                'price' => $data_query[12],
                'code' => 142,
                'id' => 'easy_access142',
            ],
            [
                'name' => "MTN 30GB (CG) - 30days",
                'price' => $data_query[13],
                'code' => 143,
                'id' => 'easy_access143',
            ],
            [
                'name' => "MTN 40GB (CG) - 30days",
                'price' => $data_query[14],
                'code' => 144,
                'id' => 'easy_access144',
            ],
            [
                'name' => "MTN 50GB (CG) - 30days",
                'price' => $data_query[15],
                'code' => 145,
                'id' => 'easy_access145',
            ],
            [
                'name' => "MTN 60GB (CG) - 30days",
                'price' => $data_query[16],
                'code' => 146,
                'id' => 'easy_access146',
            ],
            [
                'name' => "MTN 70GB (CG) - 30days",
                'price' => $data_query[17],
                'code' => 147,
                'id' => 'easy_access147',
            ],
            [
                'name' => "MTN 75GB (CG) - 30days",
                'price' => $data_query[18],
                'code' => 148,
                'id' => 'easy_access148',
            ],
            [
                'name' => "MTN 80GB (CG) - 30days",
                'price' => $data_query[19],
                'code' => 149,
                'id' => 'easy_access149',
            ],
            [
                'name' => "MTN 90GB (CG) - 30days",
                'price' => $data_query[20],
                'code' => 150,
                'id' => 'easy_access150',
            ],
            [
                'name' => "MTN 100GB (CG) - 30days",
                'price' => $data_query[21],
                'code' => 151,
                'id' => 'easy_access151',
            ],

        ];
        
    }
?>