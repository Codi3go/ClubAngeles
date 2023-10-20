<?php include("../components/header_generic.php") ?>
<?php include("../components/navbar.php") ?>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h3 class="wtext">Sanctions</h3>
            <table id="example" class="table table-dark table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../connection/DBConnection.php");
                    $connection = new PDODatabaseConnection("localhost", "bikcode", "12345", "Angeles");
                    $statement = $connection->getConnection()->prepare("SELECT sa.*, st.name, st.lastname FROM sanctions sa INNER JOIN student st ON sa.student_id = st.id INNER JOIN user us ON us.id = st.user_id INNER JOIN role ro ON ro.id = us.role_id
                        ");
                    $statement->execute();
                    $data = $statement->fetchAll();
                    if (sizeof($data) != 0) {
                        foreach ($data as $sanction) {
                            echo "
                                <tr>
                                    <th scope='row'>" . $sanction["id"] . "</th>
                                    <td>" . $sanction["name"] . "</td>
                                    <td>" . $sanction["lastname"] . "</td>
                                    <td>" . $sanction["description"] . "</td>
                                    <td>" . $sanction["date"] . "</td>
                                </tr>
                                ";
                        }
                        $connection->closeConnection();
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php include("../components/footer_generic.php") ?>