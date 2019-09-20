<?php

function cart($item = 0, $quantity = 0, $add = 0, $remove = 0){
	if($add == 1){
		if($item != "" && $quantity != ""){
			switch ($item) {
				case 1:
					$item = "iPhone Xs MAX";
					if(empty($_SESSION['order1'])){
						$_SESSION['order1'] = array($item, $quantity);
					}else{
						$oldQuantity = $_SESSION['order1'][1];
						$endQuantity = $oldQuantity + $quantity;
						if($endQuantity < 0){
							$endQuantity = 0;
							$_SESSION['order1'] = array($item, $endQuantity);
						}else{
							$_SESSION['order1'] = array($item, $endQuantity);
						}
					}
					 
					break;
				case 2:
					$item = "One Plus 6T";
					if(empty($_SESSION['order2'])){
						$_SESSION['order2'] = array($item, $quantity);
					}else{
						$oldQuantity = $_SESSION['order2'][1];
						$endQuantity = $oldQuantity + $quantity;
						if($endQuantity < 0){
							$endQuantity = 0;
							$_SESSION['order2'] = array($item, $endQuantity);
						}else{
							$_SESSION['order2'] = array($item, $endQuantity);
						}
					}
					 
					break;
				case 3:
					$item = "Xiaomi Mi Mix 3";
					if(empty($_SESSION['order3'])){
						$_SESSION['order3'] = array($item, $quantity);
					}else{
						$oldQuantity = $_SESSION['order3'][1];
						$endQuantity = $oldQuantity + $quantity;
						if($endQuantity < 0){
							$endQuantity = 0;
							$_SESSION['order3'] = array($item, $endQuantity);
						}else{
							$_SESSION['order3'] = array($item, $endQuantity);
						}
					}
					break;
			}
		}

	}else if($remove){
		session_destroy();
		unset($_SESSION);
	}
}