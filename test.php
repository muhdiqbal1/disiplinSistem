<html>
    <head>
        <meta charset="UTF-8">
        <title>LoginDB</title>
    </head>
    <body>

        <?php
        $con=  mysqli_connect("localhost", "root", "", "disiplin");

        if(!$con)
       {
           die('not connected');
       }
            $con=  mysqli_query($con, "select * from rekod");

       ?>
        <div>
            <td>Login Page Database</td>
         <table border="1">
            <th>First Name</th>
             <th>Last Name</th>
          

            </tr>

        <?php

             while($row=  mysqli_fetch_array($con))

             {
                 ?>
            <tr>
                <td><?php echo $row['Student_ID']; ?></td>
                <td><?php echo $row['KOD_KESALAHAN']; ?></td>

            </tr>
        <?php
             }
             ?>
             </table>
            </div>
    </body>
</html>

