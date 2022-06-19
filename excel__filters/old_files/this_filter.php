<?php
include 'dbconfig.php';

## FILTER VALUES
$filter_name = $_POST['filter_name'];
$filter_age = $_POST['filter_age'];
$filter_country = $_POST['filter_country'];



## empty variables
$file_name =$_GET['filename'];
$searchQuery = '';
$cond = "";
$group_by = "";
$order_by = "";
$comma = "";
// $asc = "";
// $dsc ="";
// $dup ="";

if ($filter_country != '') {
  // if($filter_country == 'asc'){
  //     $cond .= $order_by.$comma."country";
  // }
  // if($filter_country == 'dsc'){
  //     $cond .= $order_by.$comma."country".$dsc ;
  // }
  // elseif($filter_country == 'dup'){
  //     $cond .= $group_by.$comma."country" ;
  // }
  // else{
  //     echo "filter country error";
  // }
  echo "filter country";
}
if ($filter_age != '') {
  // if($filter_age == 'asc'){
  //     $cond .= $order_by.$comma."age";
  // }
  // elseif($filter_age == 'dsc'){
  //     $cond .= $order_by.$comma."age".$dsc ;
  // }
  // elseif($filter_age == 'dup'){
  //     $cond .= $group_by.$comma."age" ;
  // }
  // else{
  //     echo "filter age error";
  // }
  echo "filter age";
}

if ($filter_name != '') {
  // if($filter_name == 'asc'){
  //     $cond .= $order_by.$comma."name";
  // }
  // elseif($filter_name == 'dsc'){
  //     $cond .= $order_by.$comma."name".$dsc ;
  // }
  // elseif($filter_name == 'dup'){
  //     $cond .= $group_by.$comma."name" ;
  // }
  // else{
  //     echo "filter name error";
  // }
  echo "filter name";
}

?>


<script>
    $(document).ready(function() {
      $('.filter_class').on('change', function(){

        console.log($('#filter_name').val());
        return false;
        $.ajax({
          'method' : 'POST',
          'url': 'this_filter.php',   
          'data': function(data) {

            var filter_name = document.getElementById('filter_name').val();
        var filter_age = document.getElementById('filter_age').val();
        var filter_country = document.getElementById('filter_country').val();

            // Append to data
            data.filter_name = filter_name;
            data.filter_age = filter_age;
            data.filter_country = filter_country;
          }
        });
    });
    });
  </script> 
   
