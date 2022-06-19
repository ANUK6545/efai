<?php include 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_files</title>
    
</head>
<body>
<div class="conatiner">
    <h2>Select the file you want</h2>
    <div class="card">
    <table>
     
    <tr>
           
          <th>Excel files</th>
                     
        </tr>
       
        <?php
         $select = "SELECT distinct filename FROM excel_file_data; ";

         $result = mysqli_query($conn,$select);

         while($row = mysqli_fetch_array($result)){

        ?>
        
        <tr>
            <td><?php echo $row['filename']; ?></td>
            <td><a href="open_file.php?filename=<?php echo $row['filename']; ?>">open</a></td>
        </tr>
        
        <?php
         }
         ?>


    </table>
    </div>
</div>

</body>
</html>
