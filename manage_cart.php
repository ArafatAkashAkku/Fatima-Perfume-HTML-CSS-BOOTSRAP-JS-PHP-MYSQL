<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Add_To_Cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Upc');
            if (in_array($_POST['Upc'], $myitems)) {
                echo "<script>
            alert('Item Already Added');
            window.location.href='index.php';
            </script>";
            }
            else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1, 'Upc' => $_POST['Upc'],);
            echo "<script>
        alert('Item Added');
        window.location.href='cart.php';
        </script>";
            }
        } else {
            $_SESSION['cart'][0 ] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1, 'Upc' => $_POST['Upc'],);
            echo "<script>
        alert('Item Added');
        window.location.href='cart.php';
        </script>";
        }
    }
    if (isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['Upc']==$_POST['Upc'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']==array_values($_SESSION['cart']);
                echo "<script>
            alert('Item Removed');
            window.location.href='cart.php';
            </script>";
            }
        }
    }
}
?>

