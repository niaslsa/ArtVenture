<!doctype html>
<html lang="en">
  <head>
    <style>
      .judul{
        text-align: center;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cetak Data Penyewaan</title>
  </head>
  <body>
    <h1 class="judul">
    Report Tabel Penyewaan
    </h1>
    <div class="container">
        <div class="row">
            <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>ID Penyewaan</th>
                <th>ID Lahan</th>
                <th>Nama Lahan</th>
                <th>Foto Lahan</th>
                <th>ID Properti</th>
                <th>Nama Properti</th>
                <th>Foto Properti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyewaan as $n)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $n->id_penyewaan }}</td>
                <td>{{ $n->id_lahan }}</td>
                <td>{{ $n->nama_lahan }}</td>
                <td>{{ $n->foto_lahan }}</td>
                <td>{{ $n->id_properti }}</td>
                <td>{{ $n->nama_properti }}</td>
                <td>{{ $n->foto_properti }}</td>
              
            </tr>
            @endforeach
        </tbody>
              </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>