
<!DOCTYPE html>
<html lang="en">

@include('admin.include.header')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                {{-- <img src="../../images/logo.svg" alt="logo"> --}}
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing</h6>
                            <form class="pt-3" method="POST" action="{{ route('registerUser') }}">
                                @csrf


                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg"
                                        id="exampleInputUsername1" placeholder="Name" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <span>
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email" :value="old('email')" required
                                        autocomplete="username" />
                                    <span>
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <span>
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-3">

                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="">SIGN UP</button>

                                    {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN UP</a> --}}
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="/login" class="text-primary">Login</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
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
