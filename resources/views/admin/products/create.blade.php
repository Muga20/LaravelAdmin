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
                                <h4 class="card-title">Create Products Form </h4>
                                <p class="card-price">
                                    Create Products
                                </p>

                                @if (Session::has('status'))
                                    <div class="alert alert-success">
                                        {{ Session::get('status') }}
                                    </div>
                                @endif

                                <form class="forms-sample" action="{{ route('storeProducts') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                                            placeholder="Name" value="{{ old('name') }}">

                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Price</label>
                                        <input type="number" name="price" class="form-control"
                                            id="exampleInputEmail3" placeholder="price"
                                            value="{{ old('price') }}">

                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Category</label>
                                        <select class="form-control"  name="category_id"  id="exampleSelectGender">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                            {{-- The $attributeValue field is/must be $validationRule --}}
                                            <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>File upload</label>

                                        <div class="input-group col-xs-12">
                                            <input type="file" class="form-control file-upload-info" name="image"
                                                id="exampleFormControlFile1" value="{{ old('image') }}">

                                        </div>


                                    </div>
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}
                                        </div>
                                    @enderror




                                    <div class="form-group">
                                        <label for="exampleTextarea1">Write Your Products Description  Here</label>
                                        <textarea class="form-control " name="description" id="exampleTextarea1" rows="4" value="{{ old('description') }}"></textarea>

                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


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
                    <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                            href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a
                            href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from
                        Bootstrapdash.com</span>
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
