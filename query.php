<?php
    include('dbcon.php');
    session_start();
    // signin page
    if(isset($_POST["signin"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST['role'];
        if($email && $password  && $role){
            if( $role == 1){
                $query = $pdo->prepare("select * from register where email = :email && password = :password && role = :role " );
            }
        if( $role == 2 ){
            $query = $pdo->prepare("select * from register where email = :email && password = :password && role = :role " );
        }
        else if($role == 3){
            $query = $pdo->prepare("select * from register where email = :email && password = :password && role = :role " ); 
        }
            $query->bindParam('email',$email,PDO::PARAM_STR);
            $query->bindParam('password',$password,PDO::PARAM_STR);
            $query->bindParam('role',$role);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result){
                if( $result['status'] == 'active'){
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['role_id'] = $result['role'];
                    $_SESSION['status'] = $result['status'];
                    if($result['role'] == 1){
                        echo "<script>alert('".$result['role']."');
                        location.assign('index.php')</script>";
                    }
                else if($result['role'] == 2){
                        echo "<script>alert('".$result['role']."');
                        location.assign('courier.php')</script>";
                    }
                    else if($result['role'] == 3){
                        echo "<script>alert('".$result['role']."');
                        location.assign('agent.php')</script>";
                    }
                
                }
                else if($result['status'] == 'pending'){
                    echo "<script>alert('your request is pending');
                    location.assign('signin.php')</script>";
                
                }
            }
        }
        else{
            echo "<script>alert('invalid credentials')
            location.assign('signup.php')</script>";
       
        }
    }
    // signup page
    if(isset($_POST['register'])){
        $email = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
       
            $query = $pdo->prepare("insert into register (name ,email, password , role) values (:name,:email,:password , :role)" );
            $query->bindParam('name',$email,PDO::PARAM_STR);
            $query->bindParam('email',$email,PDO::PARAM_STR);
            $query->bindParam('password',$password,PDO::PARAM_STR);
            $query->bindParam('role',$role);
            $query->execute();
            echo "<script>alert('register successfully');
            location.assign('signin.php')</script>";
    }
    // add courier
    if (isset($_POST['addcourier'])) {
        $sendername = $_POST['sendername'];
        $senderaddress = $_POST['senderaddress'];
        $receivername = $_POST['receivername'];
        $receiveraddress = $_POST['receiveraddress'];
        $weight = $_POST['weight'];
        $city = $_POST['city'];
        $query = $pdo->prepare('insert into couriers(sender_name,sender_address,receiver_name,receiver_address,weight,city)
                values(:sendername,:senderaddress,:receivername,:receiveraddress,:weight,:city)');
        $query->bindParam('sendername',$sendername);
        $query->bindParam('senderaddress',$senderaddress);
        $query->bindParam('receivername',$receivername);
        $query->bindParam('receiveraddress',$receiveraddress);
        $query->bindParam('weight',$weight);
        $query->bindParam('city',$city);
        $query->execute();
        echo "<script>alert('Courier added successfully');
        location.assign('viewCourier.php');</script>";
    }
    // update courier
    if (isset($_POST['updatecourier'])) {
        $sendername = $_POST['sendername'];
        $senderaddress = $_POST['senderaddress'];
        $weight = $_POST['weight'];
        $city = $_POST['city'];
        $receiveraddress = $_POST['receiveraddress'];
        $receivername = $_POST['receivername'];
        $cid =$_POST['cid'];
        $query =$pdo->prepare("update couriers set sender_name= :sendername, sender_address = :senderaddress, weight= :weight, city= :city, receiver_address=:receiveraddress, receiver_name=:receivername  where id = :cid");
                  $query->bindParam('cid',$cid); 
                  $query->bindParam('sendername',$sendername);
                  $query->bindParam('senderaddress',$senderaddress);
                  $query->bindParam('weight',$weight);
                  $query->bindParam('city',$city);
                  $query->bindParam('receiveraddress',$receiveraddress);
                  $query->bindParam('receivername',$receivername);
                  $query->execute();
                  echo "<script>alert('Courier updated successfully');
                  location.assign('viewCourier.php');
                  </script>";
    }
    // add agent
    if (isset($_POST['addagent'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $addressagent = $_POST['agentaddress'];
        $query = $pdo->prepare('insert into register(name,email,password,address,role) values(:name,:email,:password,:addressagent,2)');
        $query->bindParam('name',$name);
        $query->bindParam('email',$email);
        $query->bindParam('password',$password);
        $query->bindParam('addressagent',$addressagent);
        $query->execute();
        echo "<script>alert('Agent added successfully');
        location.assign('viewAgent.php');</script>";
    }
    // update agent
    if (isset($_POST['updateagent'])) {
        $name = $_POST['name'];
        $agentaddress = $_POST['agentaddress'];
        $email = $_POST['email'];
        $aid =$_POST['aid'];
        $query =$pdo->prepare("update register set name= :name, address = :agentaddress, email= :email where id = :aid");
        $query->bindParam('aid',$aid); 
        $query->bindParam('name',$name);
        $query->bindParam('agentaddress',$agentaddress);
        $query->bindParam('email',$email);
        $query->execute();
        echo "<script>alert('Agent updated successfully');
                  location.assign('viewAgent.php');
                  </script>";
    }
    // updateuser
    if (isset($_POST['updateuser'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $id =$_POST['id'];
        $query =$pdo->prepare("update register set name= :name, address = :address, email= :email where id = :id");
                  $query->bindParam('id',$id); 
                  $query->bindParam('name',$name);
                  $query->bindParam('address',$address);
                  $query->bindParam('email',$email);
                  $query->execute();
                  echo "<script>alert('User updated successfully');
                  location.assign('customers.php');
                  </script>";
    }
    // contact
    if (isset($_POST['sendmessage'])) {
        $name = $_POST['name'];
        $message = $_POST['message'];
        $query= $pdo->prepare('insert into admin_data(name,message_detail)values(:name,:message)');
        $query->bindParam('name',$name);
        $query->bindParam('message',$message);
        $query->execute();
        echo "<script>alert('message sent');
        location.assign('index.php');</script>";
    }
    
?>


