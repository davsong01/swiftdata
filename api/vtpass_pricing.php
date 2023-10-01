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

    if ($type == 'data' && $product == 'smile-data') {
        $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT 
        smile1,smile2,smile3,smile4,smile5,smile6,smile7,smile8,smile9,smile10,smile11,smile12,smile13,smile14,smile15,smile16,smile17,smile18,smile19,smile20,smile21,smile22,smile23,smile24,smile25,smile26,smile27,smile28,smile29,smile30,smile31,smile32,smile33,smile34,smile35,smile36,smile37,smile38,smile39,smile40,smile41,smile42,smile43,smile44,smile45,smile46,smile47,smile48,smile49 FROM smiledata_plan WHERE id='$level'"));

        $response = [
            [
                "variation_code"=> "413",
                "name"=> "2GB MidNite for 7days",
                "variation_amount"=> $data_query[0],
                'val' => '2000',
                "fixedPrice"=> "Yes",
                'id' => 'smile1',
            ],
            [
                "variation_code"=> "414",
                "name"=> "3GB MidNite for 7days",
                "variation_amount"=> $data_query[1],
                'id' => 'smile2',
                'val' => '3000',
                "fixedPrice"=> "Yes",
            ],
            [
                "variation_code"=> "415",
                "name"=> "3GB Weekend ONLY for 3days",
                "variation_amount"=> $data_query[2],
                'id' => 'smile3',
                'val' => '3000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "624",
                "name"=> " 1GB FlexiDaily for 1days",
                "variation_amount" => $data_query[3],
                'id' => 'smile4',
                'val' => '1000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "625",
                "name"=> " 2.5GB FlexiDaily for 2days",
                "variation_amount" => $data_query[4],
                'id' => 'smile5',
                'val' => '2500',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "626",
                "name"=> "1GB FlexiWeekly for 7days",
                "variation_amount" => $data_query[5],
                'id' => 'smile6',
                'val' => '1000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "606",
                "name"=> "1.5GB Bigga for 30days",
                "variation_amount" => $data_query[6],
                'id' => 'smile7',
                'val' => '1500',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "627",
                "name"=> " 2GB FlexiWeekly  for 7days",
                "variation_amount" => $data_query[7],
                'id' => 'smile8',
                'val' => '2000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "607",
                "name"=> "2GB Bigga for 30days",
                "variation_amount" => $data_query[8],
                'id' => 'smile9',
                'val' => '2000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "608",
                "name"=> "3GB Bigga for 30days",
                "variation_amount" => $data_query[9],
                'id' => 'smile10',
                'val' => '3000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "628",
                "name"=> " 6GB FlexiWeekly  for 7days",
                "variation_amount" => $data_query[10],
                'id' => 'smile11',
                'val' => '6000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "620",
                "name"=> "5GB Bigga for 30days",
                "variation_amount" => $data_query[11],
                'id' => 'smile12',
                'val' => '5000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "609",
                "name"=> "6.5GB Bigga for 30days",
                "variation_amount" => $data_query[12],
                'id' => 'smile13',
                'val' => '6500',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "615",
                "name"=> "30GB Bigga for 30days",
                "variation_amount" => $data_query[13],
                'id' => 'smile14',
                'val' => '30000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "616",
                "name"=> "40GB Bigga for 30days",
                "variation_amount" => $data_query[14],
                'id' => 'smile15',
                'val' => '40000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "617",
                "name"=> "60GB Bigga for 30days",
                "variation_amount" => $data_query[15],
                'id' => 'smile16',
                'val' => '60000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "618",
                "name"=> "75GB Bigga for 30days",
                "variation_amount" => $data_query[16],
                'id' => 'smile17',
                'val' => '75000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "619",
                "name"=> "100GB Bigga for 30days",
                "variation_amount" => $data_query[17],
                'id' => 'smile18',
                'val' => '10000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "604",
                "name"=> "200GB 365 for 365days",
                "variation_amount" => $data_query[18],
                'id' => 'smile19',
                'val' => '200000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "665",
                "name"=> "90GB Jumbo for 60days",
                "variation_amount" => $data_query[19],
                'id' => 'smile20',
                'val' => '90000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "666",
                "name"=> "160GB Jumbo for 90days",
                "variation_amount" => $data_query[20],
                'id' => 'smile21',
                'val' => '160000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "667",
                "name"=> "200GB Jumbo for 120days",
                "variation_amount" => $data_query[21],
                'id' => 'smile22',
                'val' => '200000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "664",
                "name"=> "125GB 365 for 365days",
                "variation_amount" => $data_query[22],
                'id' => 'smile23',
                'val' => '125000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "673",
                "name"=> "500GB 365 for 365days",
                "variation_amount" => $data_query[23],
                'id' => 'smile24',
                'val' => '500000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "674",
                "name"=> "1TB 365 for 365days",
                "variation_amount" => $data_query[24],
                'id' => 'smile25',
                'val' => '1000000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "687",
                "name"=> "15GB 365 for 365days",
                "variation_amount" => $data_query[25],
                'id' => 'smile26',
                'val' => '150000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "688",
                "name"=> "35GB 365 for 365days",
                "variation_amount" => $data_query[26],
                'id' => 'smile27',
                'val' => '35000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "668",
                "name"=> "130GB Bigga for 30days",
                "variation_amount" => $data_query[27],
                'id' => 'smile28',
                'val' => '130000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "689",
                "name"=> "70GB 365 for 365days",
                "variation_amount" => $data_query[28],
                'id' => 'smile29',
                'val' => '70000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "508",
                "name"=> "International SmileVoice ONLY 23 for 3days",
                "variation_amount" => $data_query[29],
                'id' => 'smile30',
                'val' => '200',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "509",
                "name"=> "International SmileVoice ONLY 60 for 7days",
                "variation_amount" => $data_query[30],
                'id' => 'smile31',
                'val' => '500',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "510",
                "name"=> "International SmileVoice ONLY 125 for 30days",
                "variation_amount" => $data_query[31],
                'id' => 'smile32',
                'val' => '1000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "722",
                "name"=> "10GB Bigga for 30days",
                "variation_amount" => $data_query[32],
                'id' => 'smile33',
                'val' => '3000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "723",
                "name"=> "15GB Bigga for 30days",
                "variation_amount" => $data_query[33],
                'id' => 'smile34',
                'val' => '15000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "724",
                "name"=> "20GB Bigga for 30days",
                "variation_amount" => $data_query[34],
                'id' => 'smile35',
                'val' => '20000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "725",
                "name"=> "25GB Bigga for 30days",
                "variation_amount" => $data_query[35],
                'id' => 'smile36',
                'val' => '25000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "730",
                "name"=> "UnlimitedLite for 30days",
                "variation_amount" => $data_query[36],
                'id' => 'smile37',
                'val' => '12000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "729",
                "name"=> "UnlimitedEssential for 30days",
                "variation_amount" => $data_query[37],
                'id' => 'smile38',
                'val' => '1000000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "726",
                "name"=> "Freedom 3Mbps for 30days",
                "variation_amount" => $data_query[38],
                'id' => 'smile39',
                'val' => '25000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "727",
                "name"=> "Freedom 6Mbps for 30days",
                "variation_amount" => $data_query[39],
                'id' => 'smile40',
                'val' => '30000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "728",
                "name"=> "Freedom BestEffort for 30days",
                "variation_amount" => $data_query[40],
                'id' => 'smile41',
                'val' => '40000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "721",
                "name"=> "400GB Jumbo for 180days",
                "variation_amount" => $data_query[41],
                'id' => 'smile42',
                'val' => '50000',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "747",
                "name"=> "SmileVoice ONLY 65 (New) for 30days",
                "variation_amount" => $data_query[42],
                'id' => 'smile43',
                'val' => '547',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "748",
                "name"=> "SmileVoice ONLY 135 (New) for 30days",
                "variation_amount" => $data_query[43],
                'id' => 'smile44',
                'val' => '135',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "750",
                "name"=> "SmileVoice ONLY 150 (New) for 60days",
                "variation_amount" => $data_query[44],
                'id' => 'smile45',
                'val' => '150',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "752",
                "name"=> "SmileVoice ONLY 175 (New) for 90days",
                "variation_amount" => $data_query[45],
                'id' => 'smile46',
                'val' => '135',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "749",
                "name"=> "SmileVoice ONLY 430 (New) for 30days",
                "variation_amount" => $data_query[46],
                'id' => 'smile47',
                'val' => '430',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "751",
                "name"=> "SmileVoice ONLY 450 (New) for 60days",
                "variation_amount" => $data_query[47],
                'id' => 'smile48',
                'val' => '450',
                "fixedPrice"=> "Yes"
            ],
            [
                "variation_code"=> "753",
                "name"=> "SmileVoice ONLY 500 (New) for 90days",
                "variation_amount" => $data_query[48],
                'id' => 'smile49',
                'val' => '500',
                "fixedPrice"=> "Yes"
            ]
        ];
    }
?>