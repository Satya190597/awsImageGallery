<html>
    <head>
        <title>Upload Your Image</title>
        <?php include_once 'phpscript/get.php'; ?>
        <link href="style/style.css" rel="stylesheet" />
    </head>
    <body>
    <center>
        <div class="wrapper">
            <div>
                <image src="images/logo.png" width="17%" height="10%"/>
            </div>
            <div class="formDiv">
                <form method="POST" action="phpscript/upload.php" enctype="multipart/form-data">
                    <table class="formTable">
                        <tr>
                            <td><b>Name</</td>
                            <td><input type="text" placeholder="Name" name="imageName" required style="width:100%"/></td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td><input type="text" placeholder="Description" name="imageDescription" required style="width:100%"/></td>
                        </tr>
                        <tr>
                            <td><b>Image</b></td>
                            <td><input type="file" name="imageFile" required /></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="upload" value="Upload" class="button"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div>
                <table>
                 <?php
                    $object = new GetImages();
                    $array = $object->getAllImages();
                    $count = 1;
                    foreach ($array as $value) 
                    {
                        if($count==1)
                        {
                            echo "<tr>";
                            
                        }
                        if($count<=5)
                        {
                            echo "<td>";
                            echo "<table>";
                            echo "<tr><td style='color: #283747'><b>".$value["NAME"]."</b></td></tr>";
                            echo "<tr><td><image src='".$value["URL"]."' width='200px' height='140px' class='imageBlock'/></td></tr>";
                            echo "<tr><td style='color: #0b5345'><b>".$value["DESCRIPTION"]."</b></td></tr>";
                            echo "<tr><td style='color: #922b21'><b>".$value["DATE"]."</b></td></tr>";
                            echo "</table>";
                            echo "</td>";
                            $count=$count+1;
                            if($count>5)
                            {
                                $count=1;
                                echo"</tr>";
                            }
                        }

                    }

                 ?>
                </table>
            </div>
        </div>
    </center>
    </body>
</html>