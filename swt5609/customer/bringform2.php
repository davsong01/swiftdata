<?php
require ("session_controller.php");
$data=$_GET['data'];

if ($data != ""){


$message='
<form id="form-data">


<div>
<label>Email Address:</label>
<input type="text" id="" value="'.$data.'" class="form-control" required>
<input type="hidden" id="staff_email" value="'.$data.'" class="form-control" required>
</div>

<br/>

    <label>ACCESS TO FINANCE *</label>
    <select class="form-control" id="access_finance" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO LOCK/UNLOCK *</label>
    <select class="form-control" id="access_lock" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO TRANSACTIONS *</label>
    <select class="form-control" id="access_history" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE USER *</label>
    <select class="form-control" id="access_users" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE STAFF *</label>
    <select class="form-control" id="access_staff" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE APIUSER *</label>
    <select class="form-control" id="access_apiusers" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE AUTOMATION *</label>
    <select class="form-control" id="access_automate" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE PICES *</label>
    <select class="form-control" id="access_price" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
    <label>ACCESS TO MANAGE NOTIFICATION *</label>
    <select class="form-control" id="access_message" required>

    <option value="0">NO</option>
    <option value="1">YES</option>
    </select>

    <br/>
<button class="btn btn-success" type="button" onclick="saveUPDATESTAFF()">UPDATE</button>

</form>
';

$response=array(
'status' => 'success',
'data' => $message,
);

echo json_encode($response);
exit();
}

?>