<?php
    include('query.php');
    include('header.php');
?>
    <!-- Table Start -->
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
                            <th scope="col">Agent Address</th>
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
                            <td><?php echo $agent['address']?></td>
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
    <!-- Table End -->
<?php
    include('footer.php');
?>