<?php
if (basename($_SERVER["PHP_SELF"]) == basename(__FILE__)) {
    header("Location: ../../../index.php");
    exit();
}
?>
<table id="example" class="table mb-0 table-white">
    <thead>
        <tr>
            <th scope="col" class="text-primary"></th>
            <th scope="col" class="text-primary">Name Surname</th>
            <th scope="col" class="text-primary">Date</th>
            <th scope="col" class="text-primary">Time</th>
        </tr>
    </thead>
    <tbody>
        <!-- GET PATIENTS SECTION START -->
        <?php
        $sql = "SELECT * FROM meetings ORDER BY date_time DESC";
        $result = $conn->query($sql);
        ?>
        <?php while ($meeting = $result->fetch_assoc()) { ?>

            <tr>
                <td>
                    <button type="button" class="btn btn-outline-success <?php $isPast = 0;
                    if (date("Y-m-d h:i:s") >= date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($meeting["date_time"])))) {
                        $isPast = 1; ?>
                            btn-outline-danger
                            <?php } ?>" data-bs-toggle="modal"
                        data-bs-target="#m_editModal<?php echo $meeting["id"] ?>">
                        Details
                    </button>
                    <div class="modal fade" id="m_editModal<?php echo $meeting["id"] ?>" tabindex="-1"
                        aria-labelledby="m_editModalLabel<?php echo $meeting["id"] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark"
                                        id="m_editModalLabel<?php echo $meeting["id"] ?>">
                                        Meeting Informations</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3" style="display: none;">
                                            <input id="m_id" name="m_tID" type="number" class="form-control"
                                                placeholder="ID" value="<?php echo $meeting["id"] ?>" <?php
                                                   if ($isPast == 1) { ?>disabled<?php }
                                                   ?>>
                                            <label for="m_id">ID</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="m_ns" name="m_tNS" type="text" class="form-control"
                                                placeholder="Name Surname" value="<?php echo $meeting["patient"] ?>" <?php
                                                   if ($isPast == 1) { ?>disabled<?php }
                                                   ?>>
                                            <label for="m_ns">Name Surname</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="m_op" name="m_tO" type="text" class="form-control"
                                                placeholder="Operation" value="<?php echo $meeting["operation"] ?>" <?php
                                                   if ($isPast == 1) { ?>disabled<?php }
                                                   ?>>
                                            <label for="m_op">Operation</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="m_opd" name="m_tOD" type="date" class="form-control"
                                                value="<?php echo $meeting["date"] ?>" <?php
                                                   if ($isPast == 1) { ?>disabled<?php }
                                                   ?>>
                                            <label for="m_opd">Operation Date</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="m_opt" type="time" list="times"
                                                value="<?php echo $meeting["time"] ?>" name="m_tOT" step="3600"
                                                class="form-control" <?php
                                                if ($isPast == 1) { ?>disabled<?php }
                                                ?>>
                                            <datalist id="times">
                                                <option value="01:00:00">
                                                <option value="02:00:00">
                                                <option value="03:00:00">
                                                <option value="04:00:00">
                                                <option value="05:00:00">
                                                <option value="06:00:00">
                                                <option value="07:00:00">
                                                <option value="08:00:00">
                                                <option value="09:00:00">
                                                <option value="10:00:00">
                                                <option value="11:00:00">
                                                <option value="12:00:00">
                                                <option value="13:00:00">
                                                <option value="14:00:00">
                                                <option value="15:00:00">
                                                <option value="16:00:00">
                                                <option value="17:00:00">
                                                <option value="18:00:00">
                                                <option value="19:00:00">
                                                <option value="20:00:00">
                                                <option value="21:00:00">
                                                <option value="22:00:00">
                                                <option value="23:00:00">
                                                <option value="00:00:00">
                                            </datalist>
                                            <label for="m_fOT">Operation Time</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger" name="m_dButton" value="Delete" <?php
                                        if ($isPast == 1) { ?>disabled<?php }
                                        ?>>
                                        <input type="submit" class="btn btn-primary" name="m_uButton" value="Save" <?php
                                        if ($isPast == 1) { ?>disabled<?php }
                                        ?>>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-secondary">
                    <?php echo $meeting["patient"] ?>
                </td>
                <td class="text-secondary">
                    <?php echo $meeting["date"] ?>
                </td>
                <td class="text-secondary">
                    <?php echo $meeting["time"] ?>
                </td>
            </tr>
        <?php } ?>
        <!-- GET PATIENTS SECTION END -->
    </tbody>
</table>