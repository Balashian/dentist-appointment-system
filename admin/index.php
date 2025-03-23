<?php
include("common/header.php");
?>
<div class="container my-5">
    <div class="row g-3 justify-content-center">
        <?php
        $isWeekEnd = 0;
        $weekEndAdder = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($isWeekEnd == 1) {
                $isWeekEnd = 0;
                $weekEndAdder++;
            }
            $j = $i + $weekEndAdder;
            $today = date("Y-m-d", strtotime(" +{$j} day"));
            $whichDay = date("l", strtotime($today));
            if ($whichDay == "Saturday" || $whichDay == "Sunday") {
                $isWeekEnd = 1;
                $i--;
                continue;
            }
            $sql = "SELECT * FROM meetings WHERE date=CURRENT_DATE()+{$j} ORDER BY date_time DESC";
            $result = $conn->query($sql);

            ?>
            <div class="col-12 col-md-4 col-lg text-center bg-white shadow rounded py-5 mx-2 mh-100 overflow-auto">
                <div class="col-12">
                    <h1 class="modal-title fs-5">
                        <?php echo "{$whichDay} ({$result->num_rows})" ?>
                    </h1>
                    <?php
                    while ($meeting = $result->fetch_assoc()) { ?>
                        <div class="col-12">
                            <button type="button" class="btn btn-outline-primary<?php if (date("Y-m-d h:i:s") >= date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($meeting["date_time"])))) { ?>
                                btn-outline-danger disabled
                                    <?php } ?> mt-3" data-bs-toggle="modal"
                                data-bs-target="#m_editModal<?php echo $meeting["id"] ?>">
                                <i class="fa-solid fa-user me-1"></i>
                                <?php echo $meeting["patient"] ?><br>
                                <?php echo date("d F Y", strtotime($meeting["date"])) ?><br>
                                <?php echo date("h:i", strtotime($meeting["time"])) ?>
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
                                                        placeholder="ID" value="<?php echo $meeting["id"] ?>">
                                                    <label for="m_id">ID</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input id="m_ns" name="m_tNS" type="text" class="form-control"
                                                        placeholder="Name Surname" value="<?php echo $meeting["patient"] ?>">
                                                    <label for="m_ns">Name Surname</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input id="m_op" name="m_tO" type="text" class="form-control"
                                                        placeholder="Operation" value="<?php echo $meeting["operation"] ?>">
                                                    <label for="m_op">Operation</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input id="m_opd" name="m_tOD" type="date" class="form-control"
                                                        value="<?php echo $meeting["date"] ?>">
                                                    <label for="m_opd">Operation Date</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input id="m_opt" type="time" list="times"
                                                        value="<?php echo $meeting["time"] ?>" name="m_tOT" step="3600"
                                                        class="form-control">
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
                                                <input type="submit" class="btn btn-danger" name="m_dButton" value="Delete">
                                                <input type="submit" class="btn btn-primary" name="m_uButton" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>


        <?php } ?>
    </div>