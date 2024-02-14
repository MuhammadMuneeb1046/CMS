<?php
    include('query.php');
    include('header.php');
?>
<?php
    if(!isset($_SESSION['email'])){
        echo "<script>
        location.assign('signin.php') ;
        </script>";
    }
?>
            <!-- Courier Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Couriers</h6>
                    </div>
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
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from couriers");
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
                                    <td><a href="updateCourier.php?id=<?php echo $courier['id']?>"><button class="btn btn-sm btn-primary">Update</button></a></td>
                                    <td><button class="btn btn-sm btn-primary">Delete</button></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Courier Table End -->


            <!-- Agent View Start -->
            <div class="container-fluid pt-4 px-4"> 
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Agents</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Id</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Agent Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = $pdo->query("select * from register where role = 2");
                                $allagent = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($allagent as $agent){
                                ?>
                                <tr>
                                    <td><?php echo $agent['id']?></td>
                                    <td><?php echo $agent['name']?></td>
                                    <td><?php echo $agent['email']?></td>
                                    <td><?php echo $agent['status']?></td>
                                    <td><a href="updateagent.php?id=<?php echo $agent['id']?>"><button class="btn btn-sm btn-primary">Update</button></a></td>
                                    <td><button class="btn btn-sm btn-primary">Delete</button></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Agent View End -->

            <!-- Customer View Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Customers</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Id</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from register where role = 3");
                                $alluser = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($alluser as $user){
                                ?>
                                <tr>
                                    <td><?php echo $user['id']?></td>
                                    <td><?php echo $user['name']?></td>
                                    <td><?php echo $user['email']?></td>
                                    <td><?php echo $user['status']?></td>
                                    <td><a href="updateuser.php?id=<?php echo $user['id']?>"><button class="btn btn-sm btn-primary">Update</button></a></td>
                                    <td><button class="btn btn-sm btn-primary">Delete</button></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Customer View End -->


            <!-- Messages section Start -->
            <section id="message">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                            </div>
                            <?php
                                    $query = $pdo->query("select * from admin_data");
                                    $alldata = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($alldata as $data){
                                    ?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?php echo $data['name']?></h6>
                                        <small><?php echo $data['time']?></small>
                                    </div>
                                    <span><?php echo $data['message_detail']?></span>
                                </div>
                            </div>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- Messages section End -->


<?php
    include('footer.php');
?>