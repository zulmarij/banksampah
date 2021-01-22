 <div class="container-fluid">
     <!-- Info boxes -->
     <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box">
                 <span class="info-box-icon bg-info elevation-1"><i class="fas fa-wallet"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Finance</span>
                     <span class="info-box-number">Rp. {{ number_format($finance['balance'], 0, ',', '.') }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Revenue</span>
                     <span class="info-box-number">Rp. {{number_format($sale, 0, ',', '.') }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-receipt"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Deposit</span>
                     <span class="info-box-number">{{ $deposit }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Users</span>
                     <span class="info-box-number">{{ $user }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->
 </div>
 <!--/. container-fluid -->
