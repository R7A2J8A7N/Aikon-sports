<?php
include('../admin/include/config.php');

// Add Product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $subCategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $productName = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand_name']);

    // New and Featured Product type selection
    $productType = isset($_POST['productType']) ? $_POST['productType'] : '';
    $newArrival = ($productType == 'new-arrival') ? 1 : 0;
    $featuredProduct = ($productType == 'featured-product') ? 1 : 0;

    // Handle File Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] <= $maxSize) {
            $imageUploadPath = 'uploads/' . uniqid() . '_' . $imageName;

            // Move file to the directory
            if (move_uploaded_file($imageTmpPath, $imageUploadPath)) {
                $image = $imageUploadPath;

                // Insert Product into Database
                $query = "INSERT INTO products (category, subcategory, name, description, size, price, brand_name, image, is_new_arrival, is_featured) 
                          VALUES ('$category', '$subCategory', '$productName', '$description', '$size', '$price', '$brand', '$image', '$newArrival', '$featuredProduct')";
                if (mysqli_query($conn, $query)) {
                    header("Location: product.php?success=1");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type or file too large.";
        }
    }
}

// Update Product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProduct'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['editProductId']);
    $category = mysqli_real_escape_string($conn, $_POST['editCategory']);
    $subCategory = mysqli_real_escape_string($conn, $_POST['editSubcategory']);
    $productName = mysqli_real_escape_string($conn, $_POST['editProductName']);
    $description = mysqli_real_escape_string($conn, $_POST['editDescription']);
    $size = mysqli_real_escape_string($conn, $_POST['editSize']);
    $price = mysqli_real_escape_string($conn, $_POST['editPrice']);
    $brand = mysqli_real_escape_string($conn, $_POST['editBrand']);

    // Handle File Upload
    if (isset($_FILES['editImage']) && $_FILES['editImage']['error'] == 0) {
        $imageTmpPath = $_FILES['editImage']['tmp_name'];
        $imageName = $_FILES['editImage']['name'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        if (in_array($_FILES['editImage']['type'], $allowedTypes) && $_FILES['editImage']['size'] <= $maxSize) {
            $imageUploadPath = 'uploads/' . uniqid() . '_' . $imageName;

            // Move file to the directory
            if (move_uploaded_file($imageTmpPath, $imageUploadPath)) {
                $image = $imageUploadPath;

                // Update Product in Database
                $query = "UPDATE products SET category = '$category', subcategory = '$subCategory', name = '$productName', description = '$description', size = '$size', price = '$price', brand_name = '$brand', image = '$image' WHERE id = $productId";
                if (mysqli_query($conn, $query)) {
                    header("Location: product.php?updated=1");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        }
    } else {
        // Update without image
        $query = "UPDATE products SET category = '$category', subcategory = '$subCategory', name = '$productName', description = '$description', size = '$size', price = '$price', brand_name = '$brand' WHERE id = $productId";
        if (mysqli_query($conn, $query)) {
            header("Location: product.php?updated=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Delete Product
if (isset($_GET['deleteId'])) {
    $productId = mysqli_real_escape_string($conn, $_GET['deleteId']);
    $query = "DELETE FROM products WHERE id = $productId";
    if (mysqli_query($conn, $query)) {
        header("Location: product.php?deleted=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch categories from the database
$categories = [];
$categoryQuery = "SELECT DISTINCT category_name FROM categories";
$categoryResult = mysqli_query($conn, $categoryQuery);
while ($row = mysqli_fetch_assoc($categoryResult)) {
    $categories[] = $row['category_name'];
}

// Fetch subcategories based on selected category (optional, can be done via AJAX)
$subcategories = [];
if (isset($_POST['category'])) {
    $selectedCategory = mysqli_real_escape_string($conn, $_POST['category']);
    $subcategoryQuery = "SELECT subcategory_name FROM categories WHERE category_name = '$selectedCategory'";
    $subcategoryResult = mysqli_query($conn, $subcategoryQuery);
    while ($row = mysqli_fetch_assoc($subcategoryResult)) {
        $subcategories[] = $row['subcategory_name'];
    }
}

if (isset($_GET['category'])) {
    $selectedCategory = mysqli_real_escape_string($conn, $_GET['category']);
    $subcategoryQuery = "SELECT subcategory_name FROM categories WHERE category_name = '$selectedCategory'";
    $subcategoryResult = mysqli_query($conn, $subcategoryQuery);

    $subcategories = [];
    while ($row = mysqli_fetch_assoc($subcategoryResult)) {
        $subcategories[] = $row['subcategory_name'];
    }

    echo json_encode($subcategories);
    exit();
}

// Display products
$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">All Products</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Add New Button -->
    <a href="#" class="btn btn-primary mt-2 mb-3" style="float: right;" data-toggle="modal" data-target="#addProductModal">Add New +</a>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Brand Name</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $srNo = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$srNo}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['subcategory']}</td>
                                <td>{$row['name']}</td>
                                <td <td>{$row['description']}</td>
                                <td>{$row['size']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['brand_name']}</td>
                                <td><img src='{$row['image']}' alt='Product Image' width='50'></td>
                                <td>
                                    <button class='btn btn-warning btn-sm editBtn' 
                                        data-id='{$row['id']}' 
                                        data-category='{$row['category']}' 
                                        data-subcategory='{$row['subcategory']}'
                                        data-product='{$row['name']}' 
                                        data-description='{$row['description']}' 
                                        data-size='{$row['size']}' 
                                        data-price='{$row['price']}' 
                                        data-brand='{$row['brand_name']}' 
                                        data-image='{$row['image']}' 
                                        data-toggle='modal' 
                                        data-target='#editProductModal'>Edit</button>
                                </td>
                                <td>
                                    <a href='product.php?deleteId={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
                                </td>
                            </tr>";
                            $srNo++;
                        }
                    } else {
                        echo "<tr><td colspan='10'>No Products Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="">Select Type</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subcategory">Select Sub Category:</label>
                        <select id="subcategory" name="subcategory" class="form-control">
                            <option value="0">Select Subcategory</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" name="name" id="productName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="productType">Select Product Type:</label>
                        <select name="productType" class="form-control">
                            <option value="0">Select Type</option>
                            <option value="new-arrival">New Arrival</option>
                            <option value="featured-product">Featured Product</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" name="size" id="size" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" name="brand_name" id="brand_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="product.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="editProductId" id="editProductId">

                    <div class="form-group">
                        <label for="editCategory">Category</label>
                        <select id="editCategory" name="editCategory" class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editSubcategory">Select Sub Category:</label>
                        <select id="editSubcategory" name="editSubcategory" class="form-control">
                            <option value="0">Select Subcategory</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editProductName">Product Name</label>
                        <input type="text" name="editProductName" id="editProductName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea name="editDescription" id="editDescription" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="editSize">Size</label>
                        <input type="text" name="editSize" id="editSize" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editPrice">Price</label>
                        <input type="number" name="editPrice" id="editPrice" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editBrand">Brand Name</label>
                        <input type="text" name="editBrand" id="editBrand" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editImage">Product Image</label>
                        <input type="file" name="editImage" id="editImage" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" name="updateProduct" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- JavaScript -->
<script>
    // Set modal form fields for editing
    document.querySelectorAll('.editBtn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const product = e.target.dataset;

            // Set values for the modal fields
            document.getElementById('editProductId').value = product.id;
            document.getElementById('editCategory').value = product.category;
            document.getElementById('editProductName').value = product.product;
            document.getElementById('editDescription').value = product.description;
            document.getElementById('editSize').value = product.size;
            document.getElementById('editPrice').value = product.price;
            document.getElementById('editBrand').value = product.brand;

            const selectedCategory = product.category;
            const subCategorySelect = document.getElementById('editSubcategory');
            subCategorySelect.innerHTML = '<option value="0">Select Subcategory</option>'; // Clear existing options

            // Fetch and populate subcategories based on selected category
            if (selectedCategory) {
                fetch('product.php?category=' + selectedCategory)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function(subcategory) {
                            const option = document.createElement('option');
                            option.value = subcategory;
                            option.textContent = subcategory;
                            subCategorySelect.appendChild(option);
                        });

                        // Set the subcategory value
                        subCategorySelect.value = product.subcategory; // Set the subcategory value
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                    });
            }
        });
    });

    document.getElementById('category').addEventListener('change', function() {
        var category = this.value;
        var subCategorySelect = document.getElementById('subcategory');
        subCategorySelect.innerHTML = '<option value="0">Select Subcategory</option>'; // Clear existing options

        if (category) {
            fetch('product.php?category=' + category)
                .then(response => response.json())
                .then(data => {
                    data.forEach(function(subcategory) {
                        var option = document.createElement('option');
                        option.value = subcategory;
                        option.textContent = subcategory;
                        subCategorySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching subcategories:', error);
                });
        }
    });
</script>