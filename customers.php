<?php
    include('query.php');
    include('header.php');
?>
    <!-- Table Start -->
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
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->
<?php
    include('footer.php');
?>