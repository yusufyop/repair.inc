<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Pemesanan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Repair.inc</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="d-flex">
        <a href="profil.php"> <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/45f8f027-ab1f-4fdd-aa1f-a1eec3a113e4/de4fxss-10c12562-e487-40f4-8972-f0ea54ac59c3.png/v1/fill/w_726,h_816,strp/spongebob_face__meme__by_cmors12_de4fxss-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD04MTYiLCJwYXRoIjoiXC9mXC80NWY4ZjAyNy1hYjFmLTRmZGQtYWExZi1hMWVlYzNhMTEzZTRcL2RlNGZ4c3MtMTBjMTI1NjItZTQ4Ny00MGY0LTg5NzItZjBlYTU0YWM1OWMzLnBuZyIsIndpZHRoIjoiPD03MjYifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.WI7j6SVxPiNbZ8kmFLEztqkiqgvXADoxyhjL85sQ_aM" height="30" alt="no img" class="mr-3"></a>
        <label class=" nav-item dropdown">
          <label class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Yususf
          </label>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </label>
      </div>
  </nav>

  <div class="card mx-auto mt-5" style="width: 50rem;">
    <div class="card-body">
      <div class="card-header bg-transparent">
        <h2 class="card-title text-center mb-3">Jasa Service</h2>
      </div>

      <form action="">
        <div class="mt-3">
          <h5>Keluhan Pelanggan</h5>
        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            Checked checkbox
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            Checked checkbox
          </label>
        </div>



        <div class="row mt-4">
          <h5>Layanan yang dibutuhkan</h5>
          <div class="col">
            <label for="">Layanan 1</label>
          </div>
          <div class="col-auto">
            <select class="form-select" aria-label="Default select example">
              <option selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <label for="">Layanan 2</label>
          </div>
          <div class="col-auto">
            <select class="form-select" aria-label="Default select example">
              <option selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
        </div>

        <div class="mt-4">
          <h5>Layanan Tambahan (Opsional)</h5>
          <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="mt-4">
          <h5>Tempat Tinggal</h5>
          <textarea class="form-control" aria-label="With textarea"></textarea>
          </head>
        </div>

        <div class="mt-4">
          <h5>Apakah mitra perlu membawa perlatan tambahan ?</h5>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Default radio
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Default checked radio
            </label>
          </div>
          <h6 class="mt-2">Jika, iya</h6>
          <input type="text" class="form-control" placeholder="" aria-label="Username">
        </div>



        <div class="mt-4">
          <h5>Hari Pemesanan Layanan</h5>
          <input class="form-control" type="date" value="" id="example-date-input">

        </div>

        <div class="mt-4">
          <h5>Jam pemesanan</h5>
          <input class="form-control" type="time" value="" id="example-time-input">

        </div>
      </form>

    </div>




    <body>
      <div id="map"></div>

      <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly" async></script>




  </div>


  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>