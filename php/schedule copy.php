<?php 
include '../conn/conn.php';
$db = new DatabaseHandler();
// echo '<pre>';
// var_dump($_POST);
$sy = $_POST['sy'];
$semester = $_POST['semester'];
$section = $_POST['section'];

$conditions = ['sy= "'.$sy.'"',
'semester= "'.$semester.'"',
'section= "'.$section.'"',
];
$sql = $db->getAllRowsFromTableWhere('tb_scheduled',$conditions);
// var_dump($sql);
$row1='<table  class="table table-hover">
<thead>
    <tr>
        <th>Academic Year</th>
        <th>Semester</th>
        <th>Program & Section</th>
    </tr>
</thead>
<tbody >';
$row2='
<table class="table table-hover">
    <thead>
        <tr>
            <th>MIS Code</th>
            <th>Subject</th>
            <th>Professor</th>
            <th>Room</th>
            <th>Hours & Minutes</th>
        </tr>
    </thead>
    <tbody>
';
$count=0;



    foreach ($sql as $row ) {
    $profFName = $db->getIdByColumnValue('tb_professor','profID',$row['prof'],'profFName');
    $profMname = $db->getIdByColumnValue('tb_professor','profID',$row['prof'],'profMname');
    $profLname = $db->getIdByColumnValue('tb_professor','profID',$row['prof'],'profLname');
    // ---------------------------
    $timeDiffSeconds = 0; // Initialize with zero duration
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sMonday'],$row['eMonday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sTuesday'],$row['eTuesday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sWednesday'],$row['eWednesday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sThursday'],$row['eThursday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sFriday'],$row['eFriday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sSaturday'],$row['eSaturday']);
    $timeDiffSeconds += getTimeDifferenceInSeconds($row['sSunday'],$row['eSunday']);
    // Convert total seconds to hours and minutes
    $hours = floor($timeDiffSeconds / 3600);
    $minutes = floor(($timeDiffSeconds % 3600) / 60);
    // ---------------------------

    // GET START & END

    $time1 = strtotime("13:00");
    $time2 = strtotime("12:00");

    if ($time1 < $time2) {
        echo "13:00 is smaller";
    } elseif ($time1 > $time2) {
        echo "12:00 is smaller";
    } else {
        echo "Both times are equal";
    }

    // GET START & END

    $profName = $profFName.' '.$profMname.' '.$profLname;
    if($row['prof']=="TBA"){
        $profName ="TBA";
    }
    if($count==0){
        $row1 .="<tr>
                    <th>".$row['sy']."</th>
                    <th>".$row['semester']."</th>
                    <th>".strtoupper($row['course']).'/'.$row['section']."</th>
                </tr>";
    }
    $row2 .="
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['subject']."</td>
            <td>".$profName."</td>
            <td>".$row['room']."</td>
            <td>".sprintf('%02d', $hours).":".sprintf('%02d', $minutes)."</td>
        </tr>
    ";
    
    $count++;
   
}
$row1.="  </tbody></table>";
$row2 .="</tbody></table>";

echo $row1.$row2;
?>


<?php 
function getTimeDifference($startTime, $endTime) {
    $startDateTime = DateTime::createFromFormat('H:i', $startTime);
    $endDateTime = DateTime::createFromFormat('H:i', $endTime);

    // Calculate the difference
    $interval = $startDateTime->diff($endDateTime);

    // Return the difference
    return $interval;
}
function getTimeDifferenceInSeconds($startTime, $endTime) {
    if($startTime!="" && $endTime!=""){
        $startDateTime = DateTime::createFromFormat('H:i', $startTime);
        $endDateTime = DateTime::createFromFormat('H:i', $endTime);
        $interval = $startDateTime->diff($endDateTime);
        return $interval->h * 3600 + $interval->i * 60 + $interval->s;
    }else{
        return 0;
    }
   
}
?>