<?php
    include('query.php');
    include('header.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('select * from couriers where id= :id');
    $query->bindParam('id',$id);
    $query->execute();
    $courier = $query->fetch(PDO::FETCH_ASSOC);
}
?>
        <!-- Table Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-12">
                    <div class="bg-secondary rounded p-4 p-sm-5 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Update Courier</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="cid" value="<?php echo $courier['id']?>">
                            <input type="text" value="<?php echo $courier['sender_name']?>" name="sendername" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Sender Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $courier['sender_address']?>" name="senderaddress" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Sender Address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" value="<?php echo $courier['receiver_name']?>" name="receivername" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Receiver Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $courier['receiver_address']?>" name="receiveraddress" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Receiver Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" value="<?php echo $courier['weight']?>" name="weight" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Weight</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $courier['city']?>" name="city" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">City</label>
                        </div>
                        <button type="submit" name="updatecourier" class="btn btn-primary py-3 w-100 mb-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Table End -->
<?php
    include('footer.php');
?>