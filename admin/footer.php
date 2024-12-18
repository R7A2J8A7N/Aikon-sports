

</div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="http://localhost/Aikon/">Ecomm Web</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 1.0 -->
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="dist/js/demo.js"></script> -->

<!-- PAGE SCRIPTS -->
<!-- <script src="dist/js/pages/dashboard2.js"></script> -->

<script>
  (function(){
    var path = window.location.href;
    $(".nav-link").each(function(){
      var href = $(this).attr('href');
      if(path == decodeURIComponent(href))
      {
        $(this).addClass('active');
        var parent = $(this).closest('.has-treeview');
        parent.addClass('menu-open');
        $(parent).find('.nav-link').first().addClass('active');
        console.log(parent);

      };

    });

  }());

</script>


<!------ subject jquery ----->

<script>

  $(document).ready(function(){
    $('#class').change(function(){
    // alert($(this).val());
    $.ajax({
      url:'ajax.php',
      type:'POST',
      data:{'class_id':$(this).val()},
      dataType:'json',
      success: function(response){
        if(response.count > 0){
          $('#section-container').show();
        }else{
          $('#section-container').hide();
        }
        $('#section').html(response.options);
      }
    })
    });
  });

</script>

</body>
</html>
