<?php  
session_start();
include('config/dbcon.php');

// Add Product Function
function addProduct($conn) {
    if (isset($_POST['addProduct'])) {
        $Productname = $_POST['product_name'] ?? null;
        $subcategory = $_POST['subcategory'] ?? null;
        $price = $_POST['price'] ?? null;

        if ($Productname && $subcategory && $price && isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $upload_dir = "uploads/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $target_file = $upload_dir . basename($image_name);
            if (move_uploaded_file($image_tmp_name, $target_file)) {
                $stmt = $conn->prepare("INSERT INTO `products` (name, subcategory, price, image) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssds", $Productname, $subcategory, $price, $target_file);

                if ($stmt->execute()) {
                    $_SESSION['status'] = "Product Added Successfully!";
                } else {
                    $_SESSION['status'] = "Product registration failed: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $_SESSION['status'] = "Failed to upload image.";
            }
        } else {
            $_SESSION['status'] = "Please fill all fields and upload a valid image.";
        }

        header('Location: Product-registered.php');
        exit;
    }
}

// Update Product Function
function updateProduct($conn) {
    if (isset($_POST['updateProduct'])) {
        $user_id = $_POST['user_id'] ?? null;
        $Productname = $_POST['Productname'] ?? null;
        $subcategory = $_POST['subcategory'] ?? null;
        $price = $_POST['price'] ?? null;
        $image = $_FILES['image'] ?? null;

        if ($user_id && $Productname && $subcategory && $price) {
            if ($image && $image['error'] === 0) {
                $image_name = time() . "_" . basename($image['name']);
                $target_dir = "uploads/";
                $target_file = $target_dir . $image_name;

                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                if (move_uploaded_file($image['tmp_name'], $target_file)) {
                    $query = "UPDATE `products` SET name = ?, subcategory = ?, price = ?, image = ? WHERE id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssdsi", $Productname, $subcategory, $price, $target_file, $user_id);
                } else {
                    $_SESSION['status'] = "Image upload failed!";
                    header('Location: Product-registered.php');
                    exit;
                }
            } else {
                $query = "UPDATE `products` SET name = ?, subcategory = ?, price = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssdi", $Productname, $subcategory, $price, $user_id);
            }

            if ($stmt->execute()) {
                $_SESSION['status'] = "Product updated successfully!";
            } else {
                $_SESSION['status'] = "Failed to update the product.";
            }

            $stmt->close();
            header('Location: Product-registered.php');
            exit;
        } else {
            $_SESSION['status'] = "All fields are required!";
            header('Location: Product-registered.php');
            exit;
        }
    }
}

// Delete Product Function
function deleteProduct($conn) {
    if (isset($_POST['DeleteUserbtn'])) {
        $user_id = $_POST['delete_id'] ?? null;

        if ($user_id) {
            $stmt = $conn->prepare("DELETE FROM `products` WHERE id = ?");
            $stmt->bind_param("i", $user_id);

            if ($stmt->execute()) {
                $_SESSION['status'] = "Product Deleted Successfully!";
            } else {
                $_SESSION['status'] = "Product deletion failed: " . $stmt->error;
            }
            $stmt->close();
            header('Location: Product-registered.php');
            exit;
        } else {
            $_SESSION['status'] = "Invalid product ID!";
            header('Location: Product-registered.php');
            exit;
        }
    }
}

// Call the functions based on actions
addProduct($conn);
updateProduct($conn);
deleteProduct($conn);
?>
