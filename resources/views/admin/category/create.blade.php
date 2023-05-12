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

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">   Create Category Form </h4>
                  <p class="card-description">
                    Create Category 
                  </p>

                   @if(Session::has('status'))
                     <div class="alert alert-success">
                    {{Session::get('status')}}
                     </div>
                     @endif

                  <form class="forms-sample"  action="{{route('storeCategory')}}"     method="post" >
                         @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name </label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                       name="name"  value="{{old('name')}}" 
                      >
                      </div>
                       @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                      

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        {{-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
            </div>
          </footer> --}}
        <!-- partial -->
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
