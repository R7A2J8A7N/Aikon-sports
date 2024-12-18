<?php
// Include database connection
include './include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $category = mysqli_real_escape_string($conn, $_POST['category_name']);
        $subcategories = $_POST['subcategory_names']; // Array of subcategory names

        foreach ($subcategories as $subcategory) {
            if (!empty($subcategory)) {
                $subcategory = mysqli_real_escape_string($conn, $subcategory);
                $sql = "INSERT INTO categories (subcategory_name, category_name) VALUES ('$subcategory', '$category')";
                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . mysqli_error($conn);
                    break;  // Stop on error
                }
            }
        }
        header("Location: subcategory.php");
    } elseif (isset($_POST['update'])) {
        // Update existing subcategory
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory_name']);
        $category = mysqli_real_escape_string($conn, $_POST['category_name']);
        $sql = "UPDATE categories SET subcategory_name='$subcategory', category_name='$category' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header("Location: subcategory.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} elseif (isset($_GET['delete'])) {
    // Delete subcategory
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    $sql = "DELETE FROM categories WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: subcategory.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch all categories and subcategories from the database
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$categories = [];

// Organize categories and their subcategories
while ($row = mysqli_fetch_assoc($result)) {
    $categories[$row['category_name']][] = $row;
}

$sr_no = 1;
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Sub Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">All Sub Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Add New Button -->
<a href="#" class="btn btn-primary mt-2 mb-3" style="float: right; margin-right:10px;" data-toggle="modal" data-target="#addProductModal">Add New +</a>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $category_sr_no = 1;
                    foreach ($categories as $category_name => $subcategories) {
                        $category_rows = count($subcategories);
                        $first_row = true;

                        foreach ($subcategories as $subcategory) {
                            echo "<tr>";

                            if ($first_row) {
                                echo "<td rowspan='$category_rows'>" . $category_sr_no++ . "</td>";
                                echo "<td rowspan='$category_rows'>" . $category_name . "</td>";
                                $first_row = false;
                            }

                            echo "<td>" . $subcategory['subcategory_name'] . "</td>";
                            echo "<td><button class='edit' data-toggle='modal' data-target='#editProductModal' data-id='" . $subcategory['id'] . "' data-subcategory='" . $subcategory['subcategory_name'] . "' data-category='" . $subcategory['category_name'] . "'>Edit</button></td>";
                            echo "<td><a href='?delete=" . $subcategory['id'] . "' class='delete' onclick='return confirmDelete()'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>


            </table>
        </div>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<!-- Modal for Adding Multiple Sub Categories -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Multiple Sub Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addSubCategoryForm" action="subcategory.php" method="POST">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_name" required>
                            <option value="">Select Category</option>
                            <?php
                            // Fetch categories from database
                            $sql = "SELECT * FROM categories GROUP BY category_name"; // Assuming distinct categories
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subcategory">Sub Category Names (Max 10)</label>
                        <div id="subcategories">
                            <input type="text" class="form-control" name="subcategory_names[]" required><br>
                            <input type="text" class="form-control" name="subcategory_names[]"><br>
                            <input type="text" class="form-control" name="subcategory_names[]"><br>
                            <input type="text" class="form-control" name="subcategory_names[]"><br>
                            <!-- <input type="text" class="form-control" name="subcategory_names[]"><br> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="add">Add Sub Categories</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Sub Category -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="subcategory.php" method="POST">
                    <div class="form-group">
                        <label for="edit-category">Category</label>
                        <select class="form-control" id="edit-category" name="category_name" required>
                            <option value="">Select Category</option>
                            <?php
                            // Fetch categories from the database
                            $sql = "SELECT * FROM categories GROUP BY category_name";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-subcategory">Sub Category Name</label>
                        <input type="text" class="form-control" id="edit-subcategory" name="subcategory_name" required>
                    </div>

                    <input type="hidden" id="edit-id" name="id">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update">Update Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this subcategory?");
    }

    $('#editProductModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var subcategory = button.data('subcategory');
        var category = button.data('category');

        var modal = $(this);
        modal.find('#edit-id').val(id);
        modal.find('#edit-subcategory').val(subcategory);
        modal.find('#edit-category').val(category);
    });
</script>