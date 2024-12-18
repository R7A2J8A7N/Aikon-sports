<?php
session_start();
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit-Registered Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit-Registered Products</h3>
                            <a href="product-registered.php" class="btn btn-danger btn-sm float-right">BACK</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['user_id'])) {
                                                $user_id = $_GET['user_id'];
                                                $query = "SELECT * FROM `products` WHERE id='$user_id' LIMIT 1";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    $row = mysqli_fetch_assoc($query_run);
                                            ?>
                                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="">Product Name</label>
                                                        <input type="text" name="Productname" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter product name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sub Category</label>
                                                        <input type="text" name="subcategory" value="<?php echo $row['subcategory']; ?>" class="form-control" placeholder="Sub category" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control" placeholder="Price" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Product Image</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <p>Current image: <img src="<?php echo $row['image']; ?>" width="100px" alt="Product Image"></p>
                                                    </div>
                                            <?php
                                                } else {
                                                    echo '<h4>No record found!</h4>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="updateProduct" class="btn btn-info">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include('includes/script.php');
include('includes/footer.php');
?>
