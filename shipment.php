<?php
    include('query.php');
    include('header.php');
?>
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">All Couriers</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Sender Address</th>
                                <th scope="col">Receiver Name</th>
                                <th scope="col">Receiver Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td scope="col"><button class="btn btn-outline-light">Update</button></td>
                                <td scope="col"><button class="btn btn-outline-light">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
<?php
    include('footer.php');
?>