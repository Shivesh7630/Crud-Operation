<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./table.css">
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./connection.php');
            $p= crud::Selectdata();
            if (isset($_GET['id'])){
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if (count($p)> 0) 
                for ($i= 0; $i<count($p); $i++) {
            echo '<tr>';
            foreach ($p[$i] as $key=>$value){
                if ($key!= 'id'){
                    echo '<td>'.$value.'</td>';
                }
            }
            ?>

            <td><a href="users.php?id=<?php echo $p[$i]['id'] ?>">Delete</a></td>
            <td><a href="upDate.php">Edit</a></td>
            <?php
            echo '</tr>';
            }
            
    
    
    ?>
        </tbody>
    </table>
    <h3>NOTE</h3>
    <p>You have the capability to delete or edit your data as needed.</p>
</body>
</html>