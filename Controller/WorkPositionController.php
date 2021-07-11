<?php
    require_once "../../Model/WorkPositionModel.php";

    $workPositionModel = new WorkPositionModel();

    function ShowWorkPosition() {
        $data = $GLOBALS["workPositionModel"]->SelectWorkPosition();

        return ($data);
    }

    ShowWorkPosition();
?>