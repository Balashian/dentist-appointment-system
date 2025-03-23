<?php
if (basename($_SERVER["PHP_SELF"]) == basename(__FILE__)) {
    header("Location: ../../../index.php");
    exit();
}
?>
<table class="table mb-0 table-white">
    <thead>
        <tr>
            <th scope="col" class="text-primary"></th>
            <th scope="col" class="text-primary">NO</th>
            <th scope="col" class="text-primary">TCKN</th>
            <th scope="col" class="text-primary">Name Surname</th>
            <th scope="col" class="text-primary">Phone Number</th>
        </tr>
    </thead>
    <tbody>
        <!-- GET PATIENTS SECTION START -->
        <?php
        $sql = "SELECT * FROM patients ORDER BY name_surname";
        $result = $conn->query($sql);
        ?>
        <?php while ($musteri = $result->fetch_assoc()) { ?>

            <tr>
                <td>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#p_editModal<?php echo $musteri["id"] ?>">
                        Details
                    </button>
                    <div class="modal fade" id="p_editModal<?php echo $musteri["id"] ?>" tabindex="-1"
                        aria-labelledby="p_editModalLabel<?php echo $musteri["id"] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark"
                                        id="p_editModalLabel<?php echo $musteri["id"] ?>">
                                        Patient Informations</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3" style="display: none;">
                                            <input id="p_fID" name="p_fID" type="text" class="form-control"
                                                placeholder="Identity No" value="<?php echo $musteri["id"] ?>">
                                            <label for="p_fID">ID</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="p_fTC" name="p_fTC" type="text" class="form-control"
                                                placeholder="Identity No" value="<?php echo $musteri["tckn"] ?>">
                                            <label for="p_fTC">Identity No</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="p_fNS" name="p_fNS" type="text" class="form-control"
                                                placeholder="Name Surname" value="<?php echo $musteri["name_surname"] ?>">
                                            <label for="p_fNS">Name Surname</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="p_fBD" name="p_fBD" type="date" class="form-control"
                                                value="<?php echo $musteri["birth_date"] ?>">
                                            <label for="p_fBD">Birth Date</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="p_fTEL" name="p_fTEL" type="tel" class="form-control"
                                                placeholder="Phone Number" value="<?php echo $musteri["phone_number"] ?>">
                                            <label for="p_fTEL">Phone Number</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="p_fEM" name="p_fEM" type="email" class="form-control"
                                                placeholder="E-mail" value="<?php echo $musteri["e_mail"] ?>">
                                            <label for="p_fEM">E-mail</label>
                                        </div>
                                        <div class="form-floating">
                                            <input id="p_fADR" name="p_fADR" type="text" class="form-control"
                                                placeholder="Address" value="<?php echo $musteri["p_address"] ?>">
                                            <label for="p_fADR">Address</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger" name="p_dButton" value="Delete">
                                        <input type="submit" class="btn btn-primary" name="p_uButton" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-secondary">
                    <?php echo $musteri["id"] ?>
                </td>
                <td class="text-secondary">
                    <?php echo $musteri["tckn"] ?>
                </td>
                <td class="text-secondary">
                    <?php echo $musteri["name_surname"] ?>
                </td>
                <td class="text-secondary">
                    <?php echo $musteri["phone_number"] ?>
                </td>
            </tr>
        <?php } ?>
        <!-- GET PATIENTS SECTION END -->
    </tbody>
</table>