<!DOCTYPE html>
<html>
    <head>
        <title>Crud opreation</title>
        <link rel="stylesheet" href="./SignUp.css">
        <style>
            .form{
                width: 290px;
                height: 280px;
            }
        </style>
    </head>
    <body>
        <?php
        require('./connection.php');
        if(isset($_POST['Login_button'])) {
            $_SESSION['validate']=false;
            $name=$_POST['name'];
            $password=$_POST['password'];
        
        $p=crud::conect()->prepare('SELECT *FROM crudtable WHERE name=:n AND pass=:p');
        $p->bindValue(':n', $name);
        $p->bindValue(':p', $password);
        $p->execute();
        $d=$p->fetchAll(PDO::FETCH_ASSOC);
        if($p->rowCount()> 0) {
            $_SESSION['name']=$name;
            $_SESSION['pass']=$password;
            $_SESSION['validate']=true;
            header('location:home.php');
        }else{
            echo 'Make sure that you are registered!';
        }
    }
        
        
        ?>
        <div class="form">
            <div class="title">
                <p>Login form</p> 
            </div>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="password" placeholder="Password">
                <input type="submit" value="Login" name="Login_button">
            </form>    
        </div>
    </body>
</html>