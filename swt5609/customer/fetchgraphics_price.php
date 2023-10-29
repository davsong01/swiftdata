<?php
    require ("session_controller.php");
    $level=$_GET['load_id'];
 
    $message = '<form method="POST" id="submit_form">
    <input type="hidden" value="' . $level . '" id="level">';

    $data_query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM graphics_planlist WHERE id='$level'"));

    $response = [
        [
            'name' => "CORPORATE",
            'price' => $data_query[1],
            'id'=>'corporate',
        ],
        [
            'name' => "INDIVIDUAL",
            'price' => $data_query[2],
            'id'=>'individual',
        ],
    ];

    foreach($response as $res){
        $message .= '<div>
            <label>' . $res['name'] . '</label>
            <input type="number" id="' . $res['id'] . '" class="form-control" value="' . $res['price'] . '" required>
        </div><br>';
    }
            
    $message.='<button class="btn btn-success" type="button" onclick="saveGRAPHICS()">Save</button></form>';

    $response=array(
        'status' => 'success',
        'data' => $message,
    );

    echo json_encode($response);
    exit();
    
