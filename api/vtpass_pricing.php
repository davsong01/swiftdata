<?php
    $response = [
        'name'=>'',
        'price'=>0,
        'code'=>'',
        'val'=>'',
    ];

    // Data
    if($type == 'data' && $product == 'spectranet-data'){
   
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT spectranet1,spectranet2,spectranet3 FROM spectranetdata_plan WHERE id='$level'"));
        
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
        // $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT smile1,smile2,smile3 FROM smiledata_plan WHERE id='$level'"));

        $response = [
            [
                "variation_code"=> "413",
                "name"=> "2GB MidNite for 7days - 1,020 Naira",
                "variation_amount"=> "1020.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "414",
                "name"=> "3GB MidNite for 7days - 1,530 Naira",
                "variation_amount"=> "1530.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "415",
                "name"=> "3GB Weekend ONLY for 3days - 1,530 Naira",
                "variation_amount"=> "1530.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "airtime",
                "name"=> "Buy Airtime",
                "variation_amount"=> "0.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "624",
                "name"=> " 1GB FlexiDaily for 1days - 300 Naira",
                "variation_amount"=> "300.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "625",
                "name"=> " 2.5GB FlexiDaily for 2days - 500 Naira",
                "variation_amount"=> "500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "626",
                "name"=> "1GB FlexiWeekly for 7days - 500 Naira",
                "variation_amount"=> "500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "606",
                "name"=> "1.5GB Bigga for 30days - 1,000 Naira",
                "variation_amount"=> "1000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "627",
                "name"=> " 2GB FlexiWeekly  for 7days - 1,000 Naira",
                "variation_amount"=> "1000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "607",
                "name"=> "2GB Bigga for 30days - 1,200 Naira",
                "variation_amount"=> "1200.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "608",
                "name"=> "3GB Bigga for 30days - 1,500 Naira",
                "variation_amount"=> "1500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "628",
                "name"=> " 6GB FlexiWeekly  for 7days - 1,500 Naira",
                "variation_amount"=> "1500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "620",
                "name"=> "5GB Bigga for 30days - 2,000 Naira",
                "variation_amount"=> "2000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "609",
                "name"=> "6.5GB Bigga for 30days - 2,500 Naira",
                "variation_amount"=> "2500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "615",
                "name"=> "30GB Bigga for 30days - 8,000 Naira",
                "variation_amount"=> "8000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "616",
                "name"=> "40GB Bigga for 30days - 10,000 Naira",
                "variation_amount"=> "10000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "617",
                "name"=> "60GB Bigga for 30days - 13,500 Naira",
                "variation_amount"=> "13500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "618",
                "name"=> "75GB Bigga for 30days - 15,000 Naira",
                "variation_amount"=> "15000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "619",
                "name"=> "100GB Bigga for 30days - 18,000 Naira",
                "variation_amount"=> "18000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "604",
                "name"=> "200GB 365 for 365days - 70,000 Naira",
                "variation_amount"=> "70000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "665",
                "name"=> "90GB Jumbo for 60days - 20,000 Naira",
                "variation_amount"=> "20000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "666",
                "name"=> "160GB Jumbo for 90days - 34,000 Naira",
                "variation_amount"=> "34000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "667",
                "name"=> "200GB Jumbo for 120days - 40,000 Naira",
                "variation_amount"=> "40000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "664",
                "name"=> "125GB 365 for 365days - 50,000 Naira",
                "variation_amount"=> "50000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "673",
                "name"=> "500GB 365 for 365days - 100,000 Naira",
                "variation_amount"=> "100000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "674",
                "name"=> "1TB 365 for 365days - 120,000 Naira",
                "variation_amount"=> "120000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "687",
                "name"=> "15GB 365 for 365days - 9,000 Naira",
                "variation_amount"=> "9000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "688",
                "name"=> "35GB 365 for 365days - 19,000 Naira",
                "variation_amount"=> "19000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "668",
                "name"=> "130GB Bigga for 30days - 19,800 Naira",
                "variation_amount"=> "19800.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "689",
                "name"=> "70GB 365 for 365days - 32,000 Naira",
                "variation_amount"=> "32000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "508",
                "name"=> "International SmileVoice ONLY 23 for 3days - 200 Naira",
                "variation_amount"=> "200.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "509",
                "name"=> "International SmileVoice ONLY 60 for 7days - 500 Naira",
                "variation_amount"=> "500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "510",
                "name"=> "International SmileVoice ONLY 125 for 30days - 1,000 Naira",
                "variation_amount"=> "1000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "722",
                "name"=> "10GB Bigga for 30days - 3,000 Naira",
                "variation_amount"=> "3000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "723",
                "name"=> "15GB Bigga for 30days - 4,000 Naira",
                "variation_amount"=> "4000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "724",
                "name"=> "20GB Bigga for 30days - 5,000 Naira",
                "variation_amount"=> "5000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "725",
                "name"=> "25GB Bigga for 30days - 6,000 Naira",
                "variation_amount"=> "6000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "730",
                "name"=> "UnlimitedLite for 30days - 12,000 Naira",
                "variation_amount"=> "12000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "729",
                "name"=> "UnlimitedEssential for 30days - 18,000 Naira",
                "variation_amount"=> "18000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "726",
                "name"=> "Freedom 3Mbps for 30days - 25,000 Naira",
                "variation_amount"=> "25000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "727",
                "name"=> "Freedom 6Mbps for 30days - 30,000 Naira",
                "variation_amount"=> "30000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "728",
                "name"=> "Freedom BestEffort for 30days - 40,000 Naira",
                "variation_amount"=> "40000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "721",
                "name"=> "400GB Jumbo for 180days - 50,000 Naira",
                "variation_amount"=> "50000.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "747",
                "name"=> "SmileVoice ONLY 65 (New) for 30days - 575 Naira",
                "variation_amount"=> "575.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "748",
                "name"=> "SmileVoice ONLY 135 (New) for 30days - 1,150 Naira",
                "variation_amount"=> "1150.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "750",
                "name"=> "SmileVoice ONLY 150 (New) for 60days - 1,650 Naira",
                "variation_amount"=> "1650.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "752",
                "name"=> "SmileVoice ONLY 175 (New) for 90days - 2,200 Naira",
                "variation_amount"=> "2200.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "749",
                "name"=> "SmileVoice ONLY 430 (New) for 30days - 3,500 Naira",
                "variation_amount"=> "3500.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "751",
                "name"=> "SmileVoice ONLY 450 (New) for 60days - 4,450 Naira",
                "variation_amount"=> "4450.00",
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "753",
                "name"=> "SmileVoice ONLY 500 (New) for 90days - 5,500 Naira",
                "variation_amount"=> "5500.00",
                "fixedPrice"=> "Yes"
            ]
        ];
    }

?>