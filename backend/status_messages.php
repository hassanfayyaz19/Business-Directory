<?php

if (isset($_GET['status']) && $_GET['status'] == 200) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Operation Successfully Completed
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
} elseif (isset($_GET['status']) && $_GET['status'] == 422) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Please Enter Data In Both Fields
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
} elseif (isset($_GET['status']) && $_GET['status'] == 409) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Duplicate Data Detected
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
} ?>