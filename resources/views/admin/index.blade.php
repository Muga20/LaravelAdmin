<!DOCTYPE html>
<html lang="en">

  @include('admin.include.header')

  <body>
    
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
        @include('admin.layouts.nav')
      <!-- partial -->

        @include('admin.layouts.skin')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->

         @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              <div class="col-lg-12 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">E-Commerce Analytics</h4>
                    </div>
                    <div class="row">
                      <div class="col-lg-9">
                        <div class="d-sm-flex justify-content-between">
                          <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text pl-0" type="button" id="dropdownMenuSizeButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                            </button>
                           
                          </div>
                          <div>
                            <button type="button" class="btn btn-sm btn-light mr-2">Day</button>
                            <button type="button" class="btn btn-sm btn-light mr-2">Week</button>
                            <button type="button" class="btn btn-sm btn-light">Month</button>
                          </div>
                        </div>
                        <div class="chart-container mt-4">
                          <canvas id="ecommerceAnalytic"></canvas>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="text-success font-weight-bold">Inbound</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Current</div>
                            <div class="text-muted">38.34M</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Average</div>
                            <div class="text-muted">38.34M</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Maximum</div>
                            <div class="text-muted">68.14M</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">60th %</div>
                            <div class="text-muted">168.3GB</div>
                          </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                          <div class="d-flex justify-content-between mb-3">
                            <div class="text-success font-weight-bold">Outbound</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Current</div>
                            <div class="text-muted">458.77M</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Average</div>
                            <div class="text-muted">1.45K</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Maximum</div>
                            <div class="text-muted">15.50K</div>
                          </div>
                          <div class="d-flex justify-content-between">
                            <div class="font-weight-medium">60th %</div>
                            <div class="text-muted">45.5</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
          <!-- content-wrapper ends -->
          {{-- <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial --> --}}
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/admin/js/off-canvas.js"></script>
    <script src="/admin/js/hoverable-collapse.js"></script>
    <script src="/admin/js/template.js"></script>
    <script src="/admin/js/settings.js"></script>
    <script src="/admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="/admin/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/admin/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="/admin/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>