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
                                <h4 class="card-title">Messages Table</h4>
                                <p class="card-description">

                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    From
                                                </th>

                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Subject
                                                </th>
                                                <th>
                                                    Message
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        @foreach ($contacts as $contact)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $contact->name }}
                                                    </td>
                                                    <td>
                                                        {{ $contact->email }}
                                                    </td>
                                                    <td>
                                                        {{ $contact->subject }}
                                                    </td>

                                                    <td>
                                                        {{ $contact->message }}
                                                    </td>

                                                    <td>
                                                        {{ $contact->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                    
                                                        <form action="{{ route('deleteMessages', $contact) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
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
