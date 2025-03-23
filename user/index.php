<?php
session_start();
if (!(isset($_SESSION["tc"]) && $_SESSION["user_name"] && $_SESSION["s_name_surname"])) {
    header("Location: ../index.php");
    exit();
}
include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teeth Clinic</title>
    <script src="https://kit.fontawesome.com/beb9a053e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../admin/js/main.js"></script>
    <?php
    if (isset($_POST["m_sButton"])) {

        $m_fNS = $_SESSION["s_name_surname"];
        $m_fO = $_POST["m_fO"];
        $m_fOD = $_POST["m_fOD"];
        $m_fOT = $_POST["m_fOT"];
        $m_fODT = "{$m_fOD} {$m_fOT}";

        $sql = "INSERT INTO `meetings`(`patient`, `operation`, `date`, `time`, `date_time`) 
    VALUES ('$m_fNS','$m_fO','$m_fOD','$m_fOT','$m_fODT')";

        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isAOK1("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isAOK0("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }

    if (isset($_POST["m_dButton"])) {
        $sql = "DELETE FROM meetings WHERE `meetings`.`id` = {$_POST['m_tID']}";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isDOK1("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isDOK0("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }
    ?>
</head>

<body style="padding-top: 56px; background-color: #f2f7ff;">
    <nav class="navbar navbar-expand navbar-dark bg-white shadow fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">
                <?php echo $_SESSION["s_name_surname"] ?>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <div class="btn-group">
                            <a type="button" class="nav-link px-0 active text-success" data-bs-toggle="modal"
                                data-bs-target="#m_addModal">
                                <i class="fa-solid fa-calendar-days me-1"></i>New Meeting
                            </a>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-lg-2 text-danger" href="../login/logout.php"><i
                                class="fa-solid fa-power-off"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="m_addModal" tabindex="-1" aria-labelledby="m_addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="m_addModalLabel">Add Meeting</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input id="m_fNS" name="m_fNS" type="text" class="form-control" placeholder="Operation"
                                value="<?= $_SESSION["s_name_surname"] ?>" disabled>
                            <label for="m_fNS">Patient</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="m_fO" name="m_fO" type="text" class="form-control" placeholder="Operation"
                                required>
                            <label for="m_fO">Operation</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="m_fOD" name="m_fOD" type="date" min="<?= date('Y-m-d'); ?>" class="form-control"
                                placeholder="Operation Date" required>
                            <label for="m_fOD">Operation Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="m_fOT" list="times" value="09:00" min="09:00" max="17:00" name="m_fOT"
                                type="time" step="3600" class="form-control" placeholder="Operation Time" required>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="m_sButton" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-3 justify-content-center">
            <?php
            $p = $_SESSION["s_name_surname"];
            $sql = "SELECT * FROM meetings WHERE patient='$p' AND date>=CURRENT_DATE()";
            $result = $conn->query($sql);
            ?>
            <div class="col-12 col-md-6 text-center bg-white shadow rounded py-5 mx-2 mh-100 overflow-auto">
                <h1 class="modal-title fs-5 text-dark">
                    Meetings
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
                                                    placeholder="Name Surname" value="<?php echo $meeting["patient"] ?>"
                                                    disabled>
                                                <label for="m_ns">Name Surname</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input id="m_op" name="m_tO" type="text" class="form-control"
                                                    placeholder="Operation" value="<?php echo $meeting["operation"] ?>"
                                                    disabled>
                                                <label for="m_op">Operation</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input id="m_opd" name="m_tOD" type="date" class="form-control"
                                                    value="<?php echo $meeting["date"] ?>" disabled>
                                                <label for="m_opd">Operation Date</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input id="m_opt" type="time" list="times"
                                                    value="<?php echo $meeting["time"] ?>" disabled name="m_tOT" step="3600"
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

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
</body>

</html>