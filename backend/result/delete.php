<?php
    require '../connect.php';
    
    if( isset($_POST['reg_num']) )
    {
        $sql = "DELETE FROM students WHERE reg_num = '$_POST[reg_num]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Record Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=manage.php" );
        } 
        else 
        {    
            echo "Could not delete record. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=manage.php" );
        }
    }
    else
    {
        echo "DELETE REG NUMBER NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=manage.php" );
    }
?>