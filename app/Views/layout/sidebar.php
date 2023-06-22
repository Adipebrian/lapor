 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #95E1D3; color:#000;">
   <!-- Brand Logo -->
   <a href="<?= base_url() ?>" class="brand-link text-center">
     <span class="brand-text font-weight-bold">SIPPOLSUB</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?= base_url() ?>/assets/img/user/<?= user()->image ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="<?= base_url() ?>/user" class="d-block"><?= user()->username ?></a>
       </div>
     </div>


     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <?php if (has_permission('manage-all')) : ?>
           <li class="nav-header"><b>ADMINISTRATOR</b></li>
           <li class="nav-item  <?= ($uri->getSegment(1) == "admin") ? 'menu-open' : '' ?>">
             <a href="<?= base_url() ?>/admin" class="nav-link  <?= ($uri->getSegment(1) == "admin") ? 'active' : '' ?>">
               <i class="nav-icon fas fa-users-cog"></i>
               <p>
                 Administrator
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?= base_url() ?>/admin/index" class="nav-link <?= ($uri->getSegment(2) == "index"  && $uri->getSegment(1) == "admin") ? 'active' : '' ?>">
                   <?= ($uri->getSegment(2) == "index" && $uri->getSegment(1) == "admin") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                   <p>Login Activity</p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?= base_url() ?>/admin/user" class="nav-link  <?= ($uri->getSegment(2) == "user") ? 'active' : '' ?>">
                   <?= ($uri->getSegment(2) == "user") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                   <p>User</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?= base_url() ?>/admin/role" class="nav-link  <?= ($uri->getSegment(2) == "role") ? 'active' : '' ?>">
                   <?= ($uri->getSegment(2) == "role") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                   <p>Role</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php endif; ?>


         <li class="nav-header"><b>PENGADUAN</b></li>
         <li class="nav-item <?= ($uri->getSegment(1) == "lapor"&& $uri->getSegment(2) == "data" ||$uri->getSegment(2) == "data_admin") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "lapor"&& $uri->getSegment(2) == "data"||$uri->getSegment(2) == "data_admin") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-address-card"></i>
             <p>
               Pengaduan
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
              <?php if(has_permission('admin-jurusan')): ?>
               <a href="<?= base_url() ?>/lapor/data_admin" class="nav-link <?= ($uri->getSegment(2) == "data_admin") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "data_admin") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Data</p>
               </a>
               <?php else: ?>
               <a href="<?= base_url() ?>/lapor/data" class="nav-link <?= ($uri->getSegment(2) == "data") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "data") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Data</p>
               </a>
               <?php endif; ?>
             </li>
           </ul>
         </li>

         <?php if(has_permission('admin-jurusan') || has_permission('manage-all') || has_permission('w-admin-jurusan')): ?>
         <li class="nav-header"><b>LAPORAN</b></li>
         <li class="nav-item  <?= ($uri->getSegment(1) == "lapor" && $uri->getSegment(2) == "laporan") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "lapor" && $uri->getSegment(2) == "laporan") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-file"></i>
             <p>
               Laporan
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= base_url() ?>/lapor/laporan" class="nav-link <?= ($uri->getSegment(2) == "laporan") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "data") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Pengaduan</p>
               </a>
             </li>
           </ul>
         </li>
         <?php endif; ?>
         <li class="nav-header"><b>USER</b></li>
         <li class="nav-item  <?= ($uri->getSegment(1) == "user") ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= ($uri->getSegment(1) == "user") ? 'active' : '' ?>">
             <i class="nav-icon fas fa-user-alt"></i>
             <p>
               Profile
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= base_url() ?>/user/index" class="nav-link <?= ($uri->getSegment(2) == "index" && $uri->getSegment(1) == "user") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "index" && $uri->getSegment(1) == "user") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Profile</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url() ?>/user/iframe" class="nav-link <?= ($uri->getSegment(2) == "iframe") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "iframe") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Iframe</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url() ?>/logout" class="nav-link <?= ($uri->getSegment(1) == "logout") ? 'active' : '' ?>">
                 <?= ($uri->getSegment(2) == "logout") ? '<i class="far fa-solid fa-circle-dot nav-icon"></i>' : '<i class="far fa-circle nav-icon"></i>' ?>
                 <p>Logout</p>
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