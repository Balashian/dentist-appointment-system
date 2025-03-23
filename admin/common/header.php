<?php
if (basename($_SERVER["PHP_SELF"]) == basename(__FILE__)) {
    header("Location: ../../index.php");
    exit();
}
session_start();
include("../config.php");
if (!(isset($_SESSION["id"]) && $_SESSION["user_name"])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teeth Clinic</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/beb9a053e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/main.js"></script>

</head>

<body style="background-color: #f2f7ff;">
    <?php
    /********** SAVE MEETING START **********/
    if (isset($_POST["m_sButton"])) {

        $m_fNS = $_POST["m_fNS"];
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
    /********** SAVE MEETING END **********/

    /********** SAVE PATIENT START **********/
    if (isset($_POST["p_sButton"])) {

        $p_fTC = $_POST["p_fTC"];
        $p_fNS = $_POST["p_fNS"];
        $p_fBD = $_POST["p_fBD"];
        $p_fTEL = $_POST["p_fTEL"];
        $p_fEM = $_POST["p_fEM"];
        $p_fADR = $_POST["p_fADR"];

        $sql = "INSERT INTO `patients`(`tckn`, `name_surname`, `birth_date`, `phone_number`, `e_mail`, `p_address`) 
    VALUES ('$p_fTC','$p_fNS','$p_fBD','$p_fTEL','$p_fEM','$p_fADR')";

        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isAOK1("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isAOK0("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }
    /********** SAVE PATIENT END **********/

    /********** UPDATE MEETING START **********/
    if (isset($_POST["m_uButton"])) {

        $m_tNS = $_POST["m_tNS"];
        $m_tO = $_POST["m_tO"];
        $m_tOD = $_POST["m_tOD"];
        $m_tOT = $_POST["m_tOT"];

        $sql = "UPDATE `meetings` SET `patient`='$m_tNS',`operation`='$m_tO',`date`='$m_tOD',`time`='$m_tOT' WHERE id={$_POST['m_tID']}";

        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isUOK1("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isUOK0("meeting");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }
    /********** UPDATE MEETING END **********/

    /********** DELETE MEETING START **********/
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
    /********** DELETE MEETING END **********/

    /********** UPDATE PATIENT START **********/
    if (isset($_POST["p_uButton"])) {

        $p_fTC = $_POST["p_fTC"];
        $p_fNS = $_POST["p_fNS"];
        $p_fBD = $_POST["p_fBD"];
        $p_fTEL = $_POST["p_fTEL"];
        $p_fEM = $_POST["p_fEM"];
        $p_fADR = $_POST["p_fADR"];

        $sql = "UPDATE `patients` SET `tckn`='$p_fTC',`name_surname`='$p_fNS',`birth_date`='$p_fBD',`phone_number`='$p_fTEL',`e_mail`='$p_fEM',`p_address`='$p_fADR' WHERE id={$_POST['p_fID']}";

        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isUOK1("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isUOK0("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }
    /********** UPDATE PATIENT END **********/

    /********** DELETE PATIENT START **********/
    if (isset($_POST["p_dButton"])) {
        $sql = "DELETE FROM patients WHERE `patients`.`id` = {$_POST['p_fID']}";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">'
                , 'isDOK1("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        } else {
            echo '<script type="text/javascript">'
                , 'isDOK0("patient");'
                , '</script>';
            header("Refresh:1");
            exit();
        }
    }
    /********** DELETE PATIENT END **********/

    ?>
    <!-- NAVBAR SECTION START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-primary">Teeth Clinic</a>

            <!-- NAVBAR-TOGGLE SECTION START -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- NAVBAR-TOGGLE SECTION END -->

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="index.php"><i class="fa-solid fa-house me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link pe-1 text-primary" href="meetings.php"><i
                                    class="fa-solid fa-calendar-days me-1"></i>Meetings</a>
                            <a type="button" class="nav-link px-0 active text-secondary" data-bs-toggle="modal"
                                data-bs-target="#m_addModal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>

                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link pe-1 text-primary" href="patients.php"><i
                                    class="fa-solid fa-user me-1"></i>Patients</a>
                            <a type="button" class="nav-link px-0 active text-secondary" data-bs-toggle="modal"
                                data-bs-target="#p_addModal">
                                <i class="fa-solid fa-plus"></i>
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
                            <select name="m_fNS" id="m_fNS" class="form-select" required>
                                <?php
                                $sql = "SELECT name_surname FROM patients ORDER BY name_surname";
                                $result = $conn->query($sql);
                                ?>
                                <?php while ($patient = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $patient['name_surname'] ?>">
                                        <?php echo $patient['name_surname'] ?>
                                    </option>
                                <?php } ?>
                            </select>
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


    <div class="modal fade" id="p_addModal" tabindex="-1" aria-labelledby="p_addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="p_addModalLabel">Add Patient</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input id="p_fTC" name="p_fTC" type="text" class="form-control" placeholder="Identity No"
                                minlength="11" maxlength="11" required>
                            <label for="p_fTC">Identity No</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="p_fNS" name="p_fNS" type="text" class="form-control" placeholder="Name Surname"
                                required>
                            <label for="p_fNS">Name Surname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="p_fBD" name="p_fBD" type="date" max="<?= date('Y-m-d'); ?>" class="form-control"
                                required>
                            <label for="p_fBD">Birth Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="p_fTEL" name="p_fTEL" type="tel" class="form-control" placeholder="Phone Number"
                                required>
                            <label for="p_fTEL">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="p_fEM" name="p_fEM" type="email" class="form-control" placeholder="E-mail"
                                required>
                            <label for="p_fEM">E-mail</label>
                        </div>
                        <div class="form-floating">
                            <input id="p_fADR" name="p_fADR" type="text" class="form-control" placeholder="Address"
                                required>
                            <label for="p_fADR">Address</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="p_sButton" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- NAVBAR SECTION END -->