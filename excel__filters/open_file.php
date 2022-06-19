<?php
session_start();
include 'dbconfig.php';
$filename = $_GET['filename'];

$_SESSION['fn'] = $filename;
// echo $filename;
if (!empty($filename)) {
  $query = "SELECT * from excel_file_data where filename ='" . $filename . "'";
  $sql = mysqli_query($conn, $query) or die('error');
  //$row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
  // echo "<pre>";
  // print_r($row);
  // echo "</pre>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../Export-Html-Table-To-Excel-Spreadsheet-using-jQuery-table2excel/src/jquery.table2excel.js"></script>
  <link rel="stylesheet" href="open_file.css">
</head>

<body>
  <div class="container">
    <div class="card">
      <table id="tester" class="table table-striped table-borderless ">

        <thead>
          <tr id="col_names">
            <!-- <th>col1</th> -->
            <th>Age</th>
            <th>Country</th>
            <th>Dept</th>
          </tr>
          <th>
            <select id='filter_name' onchange="filter_name(this.value);">
              <option value=''>-- Select --</option>
              <option value='asc'>asc_name</option>
              <option value='dsc'>dsc_name</option>
              <option value='dup'>dup_name</option>

            </select>
          </th>
          <th>
            <select id='filter_age' onchange="filter_age(this.value);">
              <option value=''>-- Select --</option>
              <option value='asc'>asc_age</option>
              <option value='dsc'>dsc_age</option>
              <option value='dup'>dup_age</option>

            </select>
          </th>
          <th>
            <select id='filter_country' onchange="filter_country(this.value);">
              <option value=''>-- Select --</option>
              <option value='asc'>asc_country</option>
              <option value='dsc'>dsc_country</option>
              <option value='dup'>dup_country</option>

            </select>
          </th>
        </thead>
        <tbody id="open_file_tbody">
         
        <?php while ($data = mysqli_fetch_array($sql)) : ?> 

<tr>
  <!-- <td><?php echo $data['filename'] ?></td> -->
  <td><?php echo $data['name'] ?></td>
  <td><?php echo $data['age'] ?></td>
  <td><?php echo $data['country'] ?></td>
</tr> 

<?php endwhile; ?>

           </tbody>
         
    </div>
    </table>
    <p id="print-ajax">  </p>
    <!--Result will print here-->
    <button class="btn-primary" id="export_btn">Export</button>

  </div>
  <script type="text/javascript">
    function filter_name(val) {
      $.ajax({
        type: 'post',
        url: 'open_file_ajax.php',
        datatype: 'json',
        data:{
          option_name: val
         
        },
        success: function(response) {
           
           $('#open_file_tbody').html(response);

        }
      });
    }

    function filter_age(val) {
      $.ajax({
        type: 'post',
        url: 'open_file_ajax.php',
        datatype: 'json',
        data:{
          option_age: val
         
        },
        success: function(response) {
           
           $('#open_file_tbody').html(response);
             
        }
      });
    }

    function filter_country(val) {
      $.ajax({
        type: 'post',
        url: 'open_file_ajax.php',
        datatype: 'json',
        data:{
          option_country: val
         
        },
        success: function(response) {
           
           $('#open_file_tbody').html(response);
             
        }
      });
    }
  </script>
</body>

</html>