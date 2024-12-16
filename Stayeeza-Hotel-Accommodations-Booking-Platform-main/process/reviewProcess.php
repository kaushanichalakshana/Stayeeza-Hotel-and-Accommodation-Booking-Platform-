<?php
require_once "../Classes/Feedback.php";
use Classes\Feedback;

if (isset($_POST["rating"], $_POST["opinion"])) {
    if (!empty($_POST["rating"] && $_POST["opinion"])) {
        $rating =  $_POST["rating"];
        $opinion =  $_POST["opinion"];
        $uId =  $_POST["uId"];
        $hId =  $_POST["hId"];

        $feedback = new Feedback();
        $feedback->saveReview($uId,$rating,$opinion,$hId);
        // <?php echo $_GET["hId"];
        // <?php echo $_GET["uId"];

    }else{
        header("Location:../web-pages/add_review.php?error=1");
    }
}else{
    header("Location:../web-pages/add_review.php?error=1");
}
?>