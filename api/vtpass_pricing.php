<?php
    $response = [
        'name'=>'',
        'price'=>0,
        'code'=>'',
        'val'=>'',
    ];

    // Data
    if($type == 'data' && $product == 'spectranet-data'){
   
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT spectranet1,spectranet2,spectranet3,spectranet4 FROM spectranetdata_plan WHERE id='$level'"));
        
        $response = [
            [
                'name' => $environment == 'local' ? "Spectranet N5000" : "Spectranet N5000",
                'variation_code' => $environment == 'local' ? "vt-5000" : "vt-5000",
                'price' => $data_query[0],
                'val'=>5000,
                'id'=> 'spectranet1',
            ],
            [
                'name' => $environment == 'local' ? "Spectranet N7000" : "Spectranet N7000",
                'variation_code' => $environment == 'local' ? "vt-7000" : "vt-7000",
                'price' => $data_query[1],
                'val' => 7000,
                'id' => 'spectranet2',
            ],
            [
                'name' => $environment == 'local' ? "Spectranet N10000" : "Spectranet N10000",
                'variation_code' => $environment == 'local' ? "vt-10000" : "vt-10000",
                'price' => $data_query[2],
                'val' => 10000,
                'id' => 'spectranet3',

            ],
        ];
        
    }

    if ($type == 'data' && $product == 'smile') {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT smile1,smile2,smile3 FROM smiledata_plan WHERE id='$level'"));

        $response = [
            [
                'name' => $environment == 'local' ? "smile N5000" : "smile N5000",
                'variation_code' => $environment == 'local' ? "" : "413",
                'price' => $data_query[0],
                'val' => 5000,
            ],
            [
                'name' => $environment == 'local' ? "smile N7000" : "smile N7000",
                'variation_code' => $environment == 'local' ? "" : "414",
                'price' => $data_query[1],
                'val' => 7000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "415",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "Buy Airtime" : "Buy Airtime",
                'variation_code' => $environment == 'local' ? "" : "airtime",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "624",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "625",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "626",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "606",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "627",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "607",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "608",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "628",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "620",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "609",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "615",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "616",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "617",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "618",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "619",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "604",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "665",
                'price' => $data_query[2],
                'val' => 10000,
            ],
            [
                'name' => $environment == 'local' ? "smile N10000" : "smile N10000",
                'variation_code' => $environment == 'local' ? "" : "619",
                'price' => $data_query[2],
                'val' => 10000,
            ],

        ];
    }

    
    
?>