<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['E_Id'])){
        $data_missing[] = 'Energy Type';
    } else {
        $eid = trim($_POST['E_Id']);
    }
    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query = "SELECT * FROM Search WHERE E_Id='$eid' ";



         $response = @mysqli_query($dbc, $query);

         if($response){


          echo '<title>Search Result</title><style>
            p{
                    font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            body{
                background-image: url("waters.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }

          </style>
          <p align="center"><b>Search Successful</b></p>';
  
    echo '<style>
    table{
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
    }
    th{
  border-color: #000000;
  border-style: solid;


 
  font-size: 15px;
 
  color: #ffffff;

 }
 tr{
  padding: 10px;
  font-size: 16px;
  color: #000000;
  background: #D9E1E3    ;
  opacity: 0.9;
}


tr:hover{
  opacity: 1;
}

tr:first-child{
  opacity: 1;
}



</style>

<table align="center" cellspacing="5" cellpadding="8" border-style="20px solid" border-color="black" >
    <tr>
    <td align="left"><b>Energy Id</b></td>
    <td align="left"><b>Energy</b></td>
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Project Name</b></td>
    <td align="left"><b>Organization</b></td>
    <td align="left"><b>Product</b></td>
    </tr>';

    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['E_Id'] . '</td><td align="left">' .
      $row['Energy'] . '</td><td align="left">' .
      $row['Name'] . '</td><td align="left">' .
      $row['Project_name'] . '</td><td align="left">' . 
      $row['Organization'] . '</td><td align="left">' .
      $row['Product'] . '</td></tr>';
    }

    echo '</table>';
  } else {

    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
  }

  echo '<style>
  .d{
  margin: 15px;
  padding-top: 15px;
  padding-left: 20px;
  padding-right: 20px;
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 15px;
}
</style>
<p  align="center" class="d"><a href="search.php"><button>Back</button></a></p>';



  mysqli_close($dbc);
    } else {

         trigger_error("Enter a value to search");


        foreach($data_missing as $missing){

            echo "$missing not Entered<br /> Go Back and Enter Again";
        }
        


    }

}

?>