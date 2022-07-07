<?php

      //do dont change this
      if(isset($_POST['numMonths'])){
        $_SESSION['months'] = $_POST['numMonths'];
        exit($_SESSION['months']);
      }


