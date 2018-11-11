$query='CALL ex()';


        $stmt = mysqli_prepare($dbc, $query);
         mysqli_stmt_execute($stmt);

         echo "successful";
