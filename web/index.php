<?php
  $MSISDN = $_GET['msisdn'];
  $SESSION_ID =$_GET['sessionid'];
  $NETWORKID = $_GET['network'];
  $MODE = $_GET['mode'];
  $DATA = $_GET['userdata'];
  $USERNAME= $_GET[‘username’];
  $TRAFFIC_ID= $_GET['trafficid'];
  //$OTHER= $_GET[‘other’];
  $RESPONSE_DATA = "";

  // split text response from user into array
  $STRING_DATA = explode("*", $DATA);

  // get ussd level number
  $LEVEL = count($STRING_DATA);

  if ($MODE=="start"){
    $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|Welcome to Regional Maritime University^Buy RMU Application Voucher^1.Ghanaian Student (GHC 200)^2.Foreign Student(GHC 500)|$USERNAME |$TRAFFIC_ID|$OTHER";
  }
  else{
    if ($DATA=="1"){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Enter your email to receive the voucher|$USERNAME |$TRAFFIC_ID|$OTHER ";
    }

    elseif ($STRING_DATA[0] == 1 && $STRING_DATA[1] == 1 && $LEVEL == 2){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Options^1.Press 1 to proceed to payment|$USERNAME |$TRAFFIC_ID|$OTHER ";
    }

    elseif ($STRING_DATA[0] == 1 && $STRING_DATA[1] == 1 && $LEVEL == 3){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Options^Enter your MoMo PIN|$USERNAME |$TRAFFIC_ID|$OTHER ";
    }

    elseif ($DATA=="2"){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Enter your email to receive the voucher|$USERNAME |$TRAFFIC_ID|$OTHER";
    }

    elseif ($STRING_DATA[0] == 1 && $STRING_DATA[1] == 2 && $LEVEL == 2){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Options^1.Press 1 to proceed to payment|$USERNAME |$TRAFFIC_ID|$OTHER";
    }

    elseif ($STRING_DATA[0] == 1 && $STRING_DATA[1] == 2 && $LEVEL == 2){
      $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Options^Enter your MoMo PIN|$USERNAME |$TRAFFIC_ID|$OTHER";
    }
  }
  
  echo $RESPONSE_DATA;
  echo $LEVEL;
?>