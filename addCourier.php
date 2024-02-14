<?php
    include('query.php');
    include('header.php');
?>
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-12">
                    <div class="bg-secondary rounded p-4 p-sm-5 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Add Courier</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="sendername" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Sender Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $_SESSION['email']?>" disabled>
                            <label for="floatingInput">Sender Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="senderaddress" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Sender Address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" name="receivername" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Receiver Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="receiveraddress" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Receiver Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="weight" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Weight</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="city" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">City</label>
                        </div>
                        <button type="submit" name="addcourier" class="btn btn-primary py-3 w-100 mb-4">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    include('footer.php');
?>