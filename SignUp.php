<!DOCTYPE html>
<html>
    <head>
        <title>Crud opreation</title>
        <link rel="stylesheet" href="./SignUp.css">
    </head>
    <body>
        <?php
            require('./connection.php');
            if (isset($_POST['SignUp_button'])) {
                $name = $_POST['name'];
                $Lastname = $_POST['Lastname'];
                $Email = $_POST['Email'];
                $password = $_POST['password'];
                $ConformPassword = $_POST['Confpasword'];
                if (!empty($_POST['name'])&& !empty($_POST['Lastname'])&& !empty($_POST['Email'])&& !empty($_POST['password'])){
                    if ($password == $ConformPassword){
                        $p=crud::conect()->prepare('INSERT INTO crudtable(name,LastName,email,pass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n',$name);
                $p->bindValue(':l',$Lastname);
                $p->bindValue(':e',$Email);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'Successfuly!';
                    }else{
                        echo 'Password does not match';
                    }
                }

            }       
        ?>
        <div class="form">
            <div class="title">
                <p>Sign Up form</p> 
            </div>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="Lastname" placeholder="Last name">
                <input type="text" name="Email" placeholder="Email">
                <input type="text" name="password" placeholder="Password">
                <input type="text" name="Confpasword" placeholder="Conform password">
                <input type="submit" value="Sign Up" name="SignUp_button">
            </form>    
        </div>
    </body>
</html>