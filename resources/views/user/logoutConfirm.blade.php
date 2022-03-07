<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pizza Order System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container col-md-4 offest-4 mt-5">
        <div class="card shadow-lg p-1">
            <div class="card-header text-center text-danger">
                <h3>Logout Confirmation!</h3>
            </div>
            <div class="card-body fs-5 text-danger">
                Warning!
                <div class="text-black fs-6">This Changes Can Reach To Main Ui</div>
            </div>
            <div class="cart-footer border mt-5">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('user#logoutCancel') }}"><button class="btn btn-primary"
                            type="button">Cancel</button></a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class='btn btn-danger' type="submit" value="Confirm">
                    </form>

                </div>
            </div>
        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>
