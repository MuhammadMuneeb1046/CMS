<?php
    include('query.php');
    include('header.php');
?>
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Couriers</h6>
            </div>
            <?php
            if(isset($_SESSION['role_id'])){
                if($_SESSION['role_id'] == 1){
           

            ?>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Address</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Receiver Address</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <!-- <th scope="col">Action</th>
                            <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->query("select * from couriers ");
                        $allCouriers = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($allCouriers as $courier){
                        ?>
                        <tr>
                            <td><?php echo $courier['id']?></td>
                            <td><?php echo $courier['sender_name']?></td>
                            <td><?php echo $courier['sender_address']?></td>
                            <td><?php echo $courier['receiver_name']?></td>
                            <td><?php echo $courier['receiver_address']?></td>
                            <td><?php echo $courier['weight']?></td>
                            <td><?php echo $courier['status']?></td>
                            
                            <!-- <td><a href="updateCourier.php?id=<?php echo $courier['id']?>"><button class="btn btn-sm btn-primary">Update</button></a></td> -->
                            <?php
                            if($courier['status'] == 'pending'){
                            ?>
                            <form action="email.php" method="post">
                                <input type="hidden" name="uemail" value="<?php echo $courier['sender_email']?>">
                                <input type="hidden" name="id" value="<?php echo $courier['id']?>">
                             <td><button type="submit" name="sendEmail" class="btn btn-sm btn-primary">Approve</button></td>
                            <?php
                            }
                            ?>
                            </form>
                            <!-- <td><button class="btn btn-sm btn-primary">Delete</button></td> -->
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table><br>
                <a href="report.php"><button class="btn btn-sm btn-primary">Download Report</button></a>
            </div>
        </div>
    </div>
    <?php
    } }
    ?>
    <?php
    // <!-- Table End -->
    if(isset($_SESSION['role_id'])){
                if($_SESSION['role_id'] == 3){
           

            ?>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Address</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Receiver Address</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_SESSION['name'])){
                        $name = $_SESSION['name'];
                        $query = $pdo->prepare("select * from couriers  where sender_name = :name");
                        $query->bindParam('name',$name);
                        $query->execute();
                        $allCouriers = $query->fetchAll(PDO::FETCH_ASSOC);
                        // print_r(  $name );
                        foreach($allCouriers as $courier){
                        ?>
                        <tr>
                            <td><?php echo $courier['id']?></td>
                            <td><?php echo $courier['sender_name']?></td>
                            <td><?php echo $courier['sender_address']?></td>
                            <td><?php echo $courier['receiver_name']?></td>
                            <td><?php echo $courier['receiver_address']?></td>
                            <td><?php echo $courier['weight']?></td>
                            <td><?php echo $courier['status']?></td>
                            
                          
                        </tr>
                        <?php
                        }}
                        ?>
                    </tbody>
                </table><br>
                <a href="report.php"><button class="btn btn-sm btn-primary">Download Report</button></a>
            </div>
        </div>
    </div>
    <?php
    } }
    ?>
    <!-- Table End -->
<?php
    include('footer.php');
?>