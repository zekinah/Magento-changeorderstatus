<?php
include_once "app/Mage.php";
umask(0);
Mage::app();

    ## Function to set Order status and state
    function setOrderStatus($orderID,$orderStatus) {
        $listOfstatus = array('new','processing','complete','closed','canceled','holded','unholded');
        $status = "";
        try {
            foreach($listOfstatus as $confirmstatus) {
                if ($confirmstatus == $orderStatus) {
                    $status = $confirmstatus;
                    $order = Mage::getModel('sales/order')->load($orderID);
                    $order->setData('state', $status );
                    $order->setStatus($status);
                    $order->addStatusHistoryComment('Order was set to '.ucwords($status).' by our automation tool.',$status)->setIsVisibleOnFront(false);
                    $order->setIsCustomerNotified(false);
                    $order->save();
                    return true;
                }  else if ($orderStatus == 'unholded') {
                    $order = Mage::getModel('sales/order')->load($orderID);
                    if($order->canUnhold()) {
                        $order->unhold()->save();
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        } catch(Exception $e){
            echo $e->getMessage();
            echo "<br>";
            return false;
        }
    }

     ## Function to to start
    function main() {
        echo '<form action="magento-changestatus.php" method="POST">
            Enter Order Id
            <input type="number" name="txt_orderID">
            <select name="opt_stat">
                <option>Choose status</option>
                <option value="new" >Pending</option>
                <option value="processing" >Processing</option>
                <option value="complete" >Complete</option>
                <option value="closed" >Close</option>
                <option value="canceled" >Cancel</option>
                <option value="holded" >Hold</option>
                <option value="unholded" >UnHold</option>
            </select>
            <button type="submit" name="btn_update">Update</button>
        </form>';

        extract($_POST);

        if(isset($btn_update)){
            $order_id = $txt_orderID;
            $pullStatus = $opt_stat;
            switch ($pullStatus) {
                case 'new':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                case 'processing':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                case 'complete':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                case 'closed':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                case 'canceled':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                case 'holded':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                case 'unholded':
                    $getStatus = setOrderStatus($order_id,$pullStatus);
                    break;
                default:
                    echo "Please do the instruction properly <br>";
                    echo "Updating status FAILED. <br>";
                    break;
            }
            if ($getStatus) {
                echo "Changing the order status of ".$order_id." into ".strtoupper($pullStatus)." <br>";
                echo "The order status is successfully changed";
            } else {
                echo "The order status is cannot be changed";
            }
            $status = "";
        } else {
            echo "No currently changed order status";
        }

    }

    main();

 ?>