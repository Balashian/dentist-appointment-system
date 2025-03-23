<?php
include("common/header.php");
?>

<!-- ADD PATIENT SECTİON START -->
<div class="container-fluid text-center mt-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#p_addModal">
        Add Patient
    </button>
</div>
<!-- ADD PATIENT SECTION END -->

<!-- PATIENTS TABLE SECTION START -->
<div class="container-fluid">
    <div class="shadow container my-5 px-4 py-5 table-responsive text-nowrap bg-white rounded-3">
        <?php 
        include('common/tables/p_table.php');
        ?>
    </div>
</div>
<!-- PATIENTS TABLE SECTION END -->

<?php
include("common/footer.php");
?>