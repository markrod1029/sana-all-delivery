 <!-- Main Sidebar Container -->
 <?php $today = date('Y-m-d'); ?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position:fixed;">
   <!-- Brand Logo -->

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <center>
       <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-style:none;">
         <div class="image">

           <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/admin.png'; ?>" class="img-circle elevation-2 d-flex " style="height:80px; width:80px; margin-left:60px;">

         </div>
       </div>

       <div class="info" style="position:relative; top:-24px; right:10px;">
         <h5 href="#" class="d-block"><?php echo $user['fname'] . ' ' . $user['lname'] ?></h5>
         <h6 href="#" class="d-block">Rider</h6>

       </div>
     </center>
     <nav class="my-3" style="font-size:17.6px;position:relative; top:-27px; ">
       <ul class="nav nav-pills nav-sidebar flex-column" style="color:white;" data-widget="treeview" role="menu">



         <li class="nav-item">
           <a href="home.php" class="nav-link">
             <i class="nav-icon fa fa-tachometer"></i>
             <p>Dashboard</p>
           </a>
         </li>








         <?php
          $id = $_SESSION['rider'];
          $sql = "SELECT 
                                            o.order_id, 
                                            c.customer_id, 
                                            o.orderDate, 
                                            o.total_q, 
                                            o.total_p, 
                                            o.orderStatus, 
                                            o.paymentMethod,
                                            o.rider_id
                                        FROM orders o
                                        JOIN customer c ON o.customer_id = c.id
                                        WHERE o.orderStatus NOT IN ('Delivered', 'Cancel', 'wait') AND o.rider_id = '$id'";
          $query = $conn->query($sql);
          $result1 = $query->num_rows;

          ?>


         <li class="nav-item has-treeview ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-desktop"></i>
             <p>
               Transaction<span class="ml-3 badge badge-danger"><?php echo $result1 ?></span>
             </p>
             <i class="right fas fa-angle-left"></i>

           </a>
           <ul class="nav nav-treeview">

             <?php
              $id = $_SESSION['rider'];
              $sql = " SELECT  o.order_id, 
                                            f.shopid AS shop_id, 
                                            c.customer_id, 
                                            o.orderDate, 
                                            o.total_q, 
                                            o.total_p, 
                                            o.orderStatus, 
                                            o.paymentMethod,
                                            o.rider_id
                                        FROM orders o
                                        JOIN customer c ON o.customer_id = c.id
                                        JOIN shops f ON o.shop_id = f.id
                                        WHERE  o.orderDate = '$today' AND o.orderStatus NOT IN ('Delivered', 'Cancel', 'wait') AND o.rider_id = '$id'";
              $query = $conn->query($sql);
              $result = $query->num_rows;

              ?>

             <li class="nav-item">
               <a href="today_order.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Today Order <span class="ml-3 badge badge-danger"><?php echo $result ?></span>
                 </p>
               </a>
             </li>



             <li class="nav-item">
               <a href="pending_order.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Pending Order <span class="ml-3 badge badge-danger"><?php echo $result1 ?></span></p>
               </a>
             </li>

             <li class="nav-item">
               <a href="cancel_order.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Cancel Order </p>
               </a>
             </li>

           </ul>
         </li>




         <li class="nav-item has-treeview ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-desktop"></i>
             <p>
               Report
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="report.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Deliver Report</p>
               </a>
             </li>


           </ul>
         </li>


         <li class="nav-item has-treeview ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-cogs"></i>
             <p>
               Settings
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="profile.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Profile Information</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="change.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Change Password</p>
               </a>
             </li>


             <li class="nav-item">
               <a href="../logout.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Logout</p>
               </a>
             </li>

           </ul>
         </li>



       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>


 <script>
   function changeStyle() {
     var element = document.getElementById("main-sidebar");
     element.style.display = "none";
   }
 </script>
 <script>
   $(function() {
     var url = window.location;
     // for single sidebar menu
     $('ul.nav-sidebar a').filter(function() {
       return this.href == url;
     }).addClass('active');

     // for sidebar menu and treeview
     $('ul.nav-treeview a').filter(function() {
         return this.href == url;
       }).parentsUntil(".nav-sidebar > .nav-treeview")
       .css({
         'display': 'block'
       })
       .addClass('menu-open').prev('a')
       .addClass('active');
   });
 </script>

 <style>
   .main-sidebar {
     padding-top: 0;
     background-color: #FDB21B;
     height: 190px;
     color: #ffff;
   }

   [class*=sidebar-dark-] .sidebar a {
     color: #fff;
   }

   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
     color: #fff;

   }

   .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
   .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
     background-color: #fff;
     color: #000;
   }
 </style>