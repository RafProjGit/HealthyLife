<?php

    $paziente = $_POST['selectPaziente'];
    $data = $_POST['datetimeVisita'];
    $ora = $_POST['selectOra'];
    $minuti = $_POST['selectMinuti'];
    $messaggio = $_POST['textMessaggio'];
    $sqlInsert="INSERT INTO Visita (idVisita,idMedico,idPaziente,data,orario,note) VALUES ('" . uniqid() . "','" ."wes@outlook.it" . "','" .$paziente ."','" . $data ."','". $ora ."','" . $messaggio . "')";
    $db=mysqli_connect("127.0.0.1","root","","healthylife");
    if (!$db)
    {
        die('Could not connect: ' . mysqli_error($db));
    }

    mysqli_query($db,$sqlInsert);
    $num = mysqli_affected_rows($db);
    if ($num>0)
        echo "Visita Inserita";
    else
        echo "Visita non inserita";
    mysqli_close($db);
?>