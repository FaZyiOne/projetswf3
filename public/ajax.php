<?php
$select->getDoctrine()->query("SELECT * FROM reservation WHERE ville='$_POST[ville]' AND capacite='$_POST[capacite]'");
$info = $select;
