<?php
include('../admin/include/config.php');

// Add Category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCategory'])) {
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryname']);

    if (!empty($categoryName)) {
        $query = "INSERT INTO categories (category_name) VALUES ('$categoryName')";
        if (mysqli_query($conn, $query)) {
            header("Location: category.php?success=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Category name cannot be empty.";
    }
}

// Update Category
if (isset($_POST['updateCategory'])) {
    $categoryId = $_POST['editCategoryId'];
    $categoryName = mysqli_real_escape_string($conn, $_POST['editCategoryName']);

    if (!empty($categoryName)) {
        $query = "UPDATE categories SET category_name = '$categoryName' WHERE id = $categoryId";
        if (mysqli_query($conn, $query)) {
            header("Location: category.php?updated=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Category name cannot be empty.";
    }
}

// Delete Category
if (isset($_GET['deleteId'])) {
    $categoryId = $_GET['deleteId'];

    $query = "DELETE FROM categories WHERE id = $categoryId";
    if (mysqli_query($conn, $query)) {
        header("Location: category.php?deleted=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">All Categories</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Add New Button -->
    <a href="#" class="btn btn-primary mt-2 mb-3" style="float: right;" data-toggle="modal" data-target="#addCategoryModal">Add New +</a>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Category Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Updated Query with GROUP BY
                    $query = "SELECT * FROM categories GROUP BY category_name ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $srNo = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$srNo}</td>
                                <td>{$row['category_name']}</td>
                                <td>
                                    <button class='btn btn-warning btn-sm editBtn' data-id='{$row['id']}' data-name='{$row['category_name']}' data-toggle='modal' data-target='#editCategoryModal'>Edit</button>
                                </td>
                                <td>
                                    <a href='category.php?deleteId={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this category?\")'>Delete</a>
                                </td>
                            </tr>";
                            $srNo++;
                        }
                    } else {
                        echo "<tr><td colspan='4'>No Categories Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="category.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="categoryname" id="categoryName" class="form-control" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addCategory" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="category.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="editCategoryId" id="editCategoryId">
                    <div class="form-group">
                        <label for="editCategoryName">Category Name</label>
                        <input type="text" name="editCategoryName" id="editCategoryName" class="form-control" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateCategory" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- JavaScript for Edit Modal -->
<script>
document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');

        document.getElementById('editCategoryId').value = id;
        document.getElementById('editCategoryName').value = name;
    });
});
</script>
