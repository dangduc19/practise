<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 20/08/2015
 * Time: 10:06
 */

/**
 * @return array
 */
public function getFilename()
{
   $filename = $_SERVER["SCRIPT_NAME"];
    $filename= explode("/",$filename);
    $index = count($filename)-1;
    $filename = $filename[$index];
    return $filename;

}
public function getInfoUserByID($id)
{
    global $db;
    $sql = "SELECT * FROM user WHERE user_id='$id'";
    $user = $db->prepare($sql);
    $user->execute();
    $user = $user->fetch();
    return $user;
}

public function getCategory()
{
    global $db;
    $sql = "SELECT * FROM category";
    $category = $db->prepare($sql);
    $category->execute();
    $category = $category->fetch();
    return $category;
}

public function getCategoryById($id)
{
    global $db;
    $sql = "SELECT * FROM category WHERE category_id='$id'";
    $category = $db->prepare($sql);
    $category->execute();
    $category = $category->fetch();
    return $category;
}

public function getProduct()
{
    global $db;
    $sql = "SELECT * FROM product,category WHERE product.product_idcategory = category.category_id";
    $product= $db->prepare($sql);
    $product->execute();
    $product = $product->fetch();
    return $product;
}

public function getProductById($id)
{
    global $db;
    $sql = "SELECT * FROM product WHERE product.product_idcategory";
    $product = $db->prepare($sql);
    $product->execute();
    $product = $product->fetch();
    return $product;
}

public function getProductByCategory($id)
{
    global $db;
    $sql = "SELECT * FROM product WHERE product.productidcategory='$id'";
    $product = $db->prepare($sql);
    $product->execute();
    $product = $product->fetch();
    return $product;
}

public function getProductNew()
{
    global $db;
    $sql ="SELECT * FROM product ORDER BY product_id LIMIT 0,5";
    $product = $db->prepare($sql);
    $product->execute();
    $product = $product->fetchAll();
    return $product;
}

public function get10ProductNew()
{
    global $db;
    $sql = "SELECT * FROM product ORDER BY product_id LIMIT 0,10";
    $product = $db->prepare($sql);
    $product->execute();
    $product = $product ->fetchAll();
    return $product;
}
public function getUser()
{
    global $db;
    $sql = "SELECT * FROM user";
    $user = $db->prepare($sql);
    $user->execute();
    $user = $user->fetchAll();
    return $user;
}

public function getUserById($id)
{
    global $db;
    $sql = "SELECT * FROM user WHER user_id='$id'";
    $user = $db->prepare($sql);
    $user->execute();
    $user = $user->fetch();
    return $user;
}

public function adminLogin($username,$password)
{
    global $db;
    $user = $db->prepare("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $user->execute();
    $user = $user->fetch();
    if($username = $user['username'] && $password = $user['password'] && $username != "")
    {
        if($user['permission'] =="adm")
        {
            $_SESSION['ssid'] = $user['user_id'];
            $ssid = $_SESSION['ssid'];
            $msg = "<span class='success'>Login Succes</span>";
        }
    }
}
public function userLogin()
{
    global $db;
    $user = $db->prepare("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $user->execute();
    $user = $user->fetch();
    if($username = $user['username'] && $password = $user['password'] && $username != "")
    {

            $_SESSION['ssid'] = $user['user_id'];
            $ssid = $_SESSION['ssid'];

    }
}

public function reUrl($url);
{
    echo "<script>location.href='".$url."'</script>";
}

public function getMaxOrderId()
{
    global $db;
    $sql = "SELECT * FROM `oreder` ORDER BY order_id DESC LIMIT 0,5";
    $idmax = $db->prepare($sql);
    $idmax->execute();
    $idmax = $idmax->fetch();
    $idmax = $idmax[0];
    if($idmax < 0 || $idmax == "" || $idmax == NULL)
    {
        $idmax= 1;
        return $idmax;
    }
    else
    {
        $idmax += 1;
        return $idmax;
    }
}

public function crTime();
{
    return date("Y-m-d");
}

public function getContact()
{
    global $db;
    $sql = "SELECT * FROM contact";
    $contact = $db->prepare($sql);
    $contact->execute();
    $contact = $contact->fetchAll();
    return $contact;
}

public function getContactById($id)
{
    global $db;
    $sql = "SELECT * FROM contact WHERE contact_id='$id'";
    $contact = $db->prepare($sql);
    $contact->execute();
    $contact = $contact->fetch()
}

public function getOrder()
{
    global $db;
    $sql = "SELECT * FROM order";
    $order = $db->prepare($sql);
    $order ->execute();
    $order = $order->fetch();
    return $order;
}

public function getOrderById($id)
{
    global $db;
    $sql = "SELECT * FROM oreder WHERE order_id='$id'";
    $order = $db->prepare($sql);
    $order->execute();
    $order = $order->fetch();
    return $order;
}

public function getOrderTest()
{
    global $db;
    $sql = "SELECT * FROM `order`,`orderdetail`,`user` WHERE order.order_id = orderdetail.detai_idorder
AND order.order_iduser = user.user_id";
    $order = $db->prepare($sql);
    $order->execute();
    $order = $order->fetch();
    return $order;
}