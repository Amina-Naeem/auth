<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Wish</title>
    <link href="{{ asset('/customeAuth/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/customeAuth/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ strtoupper(Auth::user()->name) }} WishList </h1>
                        </div>
                        <div>
                        <a href="/addWishView" class="btn btn-success p-1">
                            Make New Wish
                        </a>
                    </div>
<table class="table table-striped">
<thead>
<tr>
    <th>No.</th>
    <th>Wish</th>
    <th>Fulfilled</th>
</tr>
</thead>
    <tbody>
    @foreach($wishes as $wish)
        <tr>
            <td>{{$wish->no}}</td>
            <td>{{$wish->wish}}</td>
            <td>{{$wish->fulfilled}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
