<?php
    $db_host        = 'shalevportal.ml';
    $db_user        = 'hey';
    $db_pass        = 'Ss12345678*';
    $db_database    = 'unity'; 
    $db_port        = '2086';

    $link = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
    //check connection

    $sql = $_POST['sql'];           //with ?
    $argument = $_POST['args'];     //with array - according to number of ?
    
    $argument = explode(',',$argument);
    $type = "";

    for ($count=0; $count < substr_count($sql, '?'); $count++) { 
        $type .= "s";
    }

    $result = $link->prepare($sql);
    
    $result->bind_param($type, ...$argument); //call_user_func_array(array($stmt, 'bind_param'), $params);
    $result->execute();
    $result1 = $result->get_result();
        
    while($row = $result1->fetch_row()) {
        // var_dump($row);
        echo implode(",",$row);
        echo ";";
    }

    // PDO vs mysqli
    //prepare :
    // $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
    // $stmt->bindParam(':name', $name);
    // $stmt->bindParam(':value', $value);
    // $stmt->execute();
    
    //prepare ?
    // $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (?, ?)");
    // $stmt->bindParam(1, $name);
    // $stmt->bindParam(2, $value);
    // $stmt->execute();

    //prepare array []
    // $stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?, ?");
    // $stmt->execute([$name, $value]);    


    // MYSQLI
    // $link = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
    // $result = $link->query($namecheckquery);
    // while ($row = $result1->fetch_array(MYSQLI_NUM)) {}
    // while($row = $result->fetch_row()) {
    //     var_dump($row)
    //     $uname[] = $row[0];
    //     $level[] = $row[1];
    //     $score[] = $row[2];
    //     $since[] = $row[3];
    //     $numberofrows += 1;
    // }
    
      
    //$dataresult = mysqli_query($link, $namecheckquery) or die("name check query failed");
    //mysqli_num_rows($namecheck)> 0;exit();

?>