<?php

include('dbconfig.php');

require 'C:/xampp/htdocs/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];

    $file_name =$_GET['filename'];

    $new_filename = $_POST['filename_input'];
  
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "1";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $Age = $row['0'];
                $Country = $row['1'];
                $dept = $row['2'];

                $studentQuery = "INSERT INTO excel_file_data (`filename`, `name`, `age`, `country`) VALUES ('$new_filename','$Age','$Country', '$dept')";
                $result = mysqli_query($conn, $studentQuery);
                $msg = true;

            }
            else
            {
                $count = "1";
            }
        }
        if(isset($msg))
        {
            echo "<script>alert(Successfully Imported)<script>";
            header('Location: index.php');
            exit(0);
        }
        elseif(empty($msg))
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: index.php');
            exit(0);
        }       
    }
    else
    {
        echo "invalid file";
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php');
        exit(0);
    }
}
