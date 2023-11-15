<?php
 if(isset($_POST['owner_name'],$_POST['bus_name'],$_POST['bus_number'],$_POST['rc_number']))
 {
    $owner_name = $_POST['owner_name'];
    $bus_name = $_POST['bus_name'];
    $bus_number = $_POST['bus_number'];
    $rc_number = $_POST['rc_number'];
    $conn = new mysqli('localhost', 'root','', 'projects');
    if ($conn->connect_error) 
    {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } 
    else 
    {
        $stmt = $conn->prepare("INSERT INTO bus_detail (owner_name, bus_name, bus_number, rc_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",$owner_name,$bus_name,$bus_number,$rc_number);
        $exeval = $stmt->execute();
        if($exeval)
        {
            echo "Registration successfully...";
        }
        else
        {
            echo "Registration failed..." .$stmt->error;
        }
        $stmt->error;
        $conn->close();
    }


     }    
else
{
    echo "required";
}    
?>
