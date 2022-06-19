<?php include 'dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel_filters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<!------------------------------------ the form to collect file AND FILENAME starts  -->

    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" id='ef_card'>
                    <div class="card-header">
                        <h4 style=" text-align:center; margin:0px;">Excel filters</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <label for="filename_input">Enter filename:</label>
                            <input type="text" id="filename_input" name="filename_input">
                            <br><br>
                            <input type="file" name="import_file" id="import_btn" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary ">Import</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ---------------------------------the form to collect file AND FILENAME ends ------------------------->

   


<!-- -------------------------------------DISPLAYING THE NAMES OF ALREADY EXISITING FILES starts -->
            <div class="card">
                <div class="card-header">
                    <h4 style=" text-align:center; margin:0px;">Uploaded files</h4>
                </div>
                <div class="card-body">

                    <table class="table table-stripped hover">


                        <?php

                        $select = "SELECT distinct filename FROM excel_file_data; ";

                        $result = mysqli_query($conn, $select);

                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <tr>
                                <!-- <td><?php echo $row['new_filename']; ?></td> -->
                                <td><?php echo $row['filename']; ?></td>
                                <td><a href="open_file.php?filename=<?php echo $row['filename']; ?>">open</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- -------------------------------------DISPLAYING THE NAMES OF ALREADY EXISITING FILES ends -->

</body>

</html>