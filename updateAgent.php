<?php
    include('query.php');
    include('header.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('select * from agent where id= :id');
    $query->bindParam('id',$id);
    $query->execute();
    $agent = $query->fetch(PDO::FETCH_ASSOC);
}
?>
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-12">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Update Agent</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="aid" value="<?php echo $agent['id']?>">
                            <input type="text" value="<?php echo $agent['name']?>" name="name" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $agent['address']?>" name="agentaddress" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $agent['email']?>" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <button type="submit" name="updateagent" class="btn btn-primary py-3 w-100 mb-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    include('footer.php');
?>