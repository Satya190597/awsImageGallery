<?php
    $name = filter_input(INPUT_POST,"imageName");
    $description = filter_input(INPUT_POST,"imageDescription");
    $imageName = $_FILES["imageFile"]["name"];
    $imagePath = $_FILES["imageFile"]["tmp_name"];
    $destination = "../images/".$imageName;
    move_uploaded_file($imagePath, $destination);
    $destination = "images/".$imageName;
    $jsonData = array(
        "NAME" => $name,
        "DESCRIPTION" => $description,
        "URL" => $destination
    );
    $url = 'http://localhost:8081/awsImageGallery/api/controller/insert.php';
    $ch = curl_init($url);
    $payload = json_encode($jsonData);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

	
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

	
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	
    $result = curl_exec($ch);
    curl_close($ch);
    header("Location:../index.php");
?>