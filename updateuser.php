<?php
    include('query.php');
    include('header.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query=$pdo->prepare('select * from user where id = :id');
    $query->bindParam('id',$id);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
}
?>
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-12">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Add Agent</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="<?php echo $user['id']?>">
                            <input type="text" name="name" value="<?php echo $user['name']?>" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="address" value="<?php echo $user['address']?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" value="<?php echo $user['email']?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <button type="submit" name="updateuser" class="btn btn-primary py-3 w-100 mb-4">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    include('footer.php');
?>