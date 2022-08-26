 <?= $this->extend('templates/templates'); ?>


 <?= $this->section('konten'); ?>

 <!-- konten -->
 <div class="konten">
   <div class=" mt-5 text-center">
     <h1>SISTEM INFORMASI E-ARSIP <BR>RUMAH BAHASA</BR></h1>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-4 col-sm-6 mb-4 ml-auto">
       <img class="img-fluid" src="/img/surat.png" alt="Responsive image">
     </div>

     <!-- text -->
     <div class="col-lg-6 col-sm-3  my-auto mx-2">
       <h3 class="font-weight-bold">
         Ribet Mengatur Surat ?
       </h3>
       <p class="text-justify"> Sistem Informasi E-Arsip ini membantu Anda dalam mengatur kegiatan transaksi surat Mulai dari pembuatan urat keluar hingga menyediakan laporan dari surat tersebut.</p>
     </div>
     <!-- akhir text -->
   </div>
   <!-- akhir row -->



   <!-- Content Row -->
   <div class="row">

     <!-- text -->

     <!-- text -->
     <div class="col-lg-5 col-sm-3 mx-auto">
       <h3 class="font-weight-bold">
         Laporan Surat
       </h3>
       <p class="text-justify">Berisikan data jumlah surat masuk dan keluar <br> yang terjadi pada Rumah Bahasa.</p>

     </div>
     <!-- akhir text -->

     <!-- card -->
     <!-- Earnings (Monthly) Card Example -->
     <div class="col-lg-3 col-sm-3 mb-4 mx-2">
       <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                 Jumlah Surat Masuk</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk; ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-envelope fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-lg-3 col-sm-3 mb-4 mx-2">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                 Jumlah Surat Keluar</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_keluar; ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- akhir card  -->

   </div>
   <!-- akhir row -->



 </div>
 <!-- akhir konten -->
 <?= $this->endsection('konten'); ?>