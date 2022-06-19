<!-- <?php
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

 ?>  -->




<?php
session_start();
include 'dbconfig.php';

## empty variables
$filename = $_SESSION['fn'];
$searchQuery = '';
$searchsort = '';

        $name_sort='';
        $name_group='';

        $age_sort='';
        $age_group='';

        $country_sort='';
        $country_group='';
$cond = "";
$group_by = "";
$order_by = "";
$comma = "";
// echo $filename;
// $option_value = $_POST['option_value'];
// echo $option_value;
$option_name = (isset($_POST['option_name'])?$_POST['option_name']:'');
$option_age = (isset($_POST['option_age'])?$_POST['option_age']:'');
$option_country = (isset($_POST['option_country'])?$_POST['option_country']:'');
//---------------------------------------  --------------- filtering starts


if($option_name !=''){
    if($option_name == 'asc'){
        $searchsort .= "Order by name ";
    }
    if($option_name == 'dsc'){
        $searchsort .= "Order by name desc ";
    }
    if($option_name == 'dup'){
        $searchQuery .= "group by name ";
    }
}


if($option_age !=''){
    if($option_age == 'asc'){
        $searchsort .= "Order by age ";
    }
    if($option_age == 'dsc'){
        $searchsort .= "Order by age desc ";
    }
    if($option_age == 'dup'){
        $searchQuery .= "group by age ";
    }
}

if($option_country !=''){
    if($option_country == 'asc'){
        $searchsort.= "Order by country ";       
    }
    if($option_country == 'dsc'){
        $searchsort.= "Order by country desc ";       
    }
    if($option_country == 'dup'){
        $searchQuery .= "group by country ";
    }
}

//--------------------------------------- ---------------filtering ends



//--------------------------------------------- main query .... this will give out data in the main table starts
//   $empQuery = "SELECT * FROM `excel_file_data` where filename = '".$filename."' ".$name_group." ".$age_group." ".$country_group." ".$name_sort." ".$age_sort."".$country_sort." ";

   $empQuery = "SELECT * FROM `excel_file_data` where filename = '".$filename."' ".$searchsort."  ".$searchQuery." ";

   //             SELECT * FROM excel_file_data where filename = 'jojo' ORDER BY name DESC;
  $empRecords = mysqli_query($conn, $empQuery);



            while ($data = mysqli_fetch_array($empRecords)){ 
?>
       <tr>
       <!-- <td> <?php echo $data['filename'] ?></td>   -->
        <td>  <?php echo $data['name'] ?>  </td>  
         <td> <?php echo $data['age'] ?> </td>
         <td><?php echo $data['country']?> </td>  
       
         </tr>
              <?php } 
              
//---------------------------------------------main query this will give out data in the main table ends
        //  echo $empQuery ;             
         
        //   echo "   g       " ; 
          
          echo  $searchQuery; 
         
         
         
         ?>

