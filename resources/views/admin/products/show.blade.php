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


                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">products Table </h4>
                                <p class="card-description">

                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> Product Name </th>
                                                <th> Product Image </th>
                                                <th> Product Price </th>
                                                <th>Category </th>
                                                <th> Time Published</th>
                                                <th> Published By </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        @foreach ($products as $product)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $product->name }}
                                                    </td>
                                                    <td class="py-1">
                                                        <img src="{{ asset($product->image) }}" alt="image" />
                                                    </td>

                                                  

                                                    <td>
                                                        Ksh {{ $product->price }}
                                                    </td>

                                                    <td>
                                                        {{ $product->category->name }}
                                                    </td>

                                                    <td>
                                                        {{ $product->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        {{ $product->user->name }}
                                                    </td>
                                                    <td class="d-flex">
                                                        @if (auth()->user()->id === $product->user_id)
                                                            <button type="button" class="btn btn-secondary">
                                         <a href="{{ route('editProducts', $product) }}">Edit</a>
                                                            </button>
                                                            <form action="{{ route('deleteProducts', $product) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>

                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
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
