<!-- Kalau Membuat UI untuk show jangan menggunakan tabel -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Obat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Detail Obat</h2>  
  @if($message)         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Medicines Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>Category Name</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $message -> generic_name}}</td>
            <td>{{ $message -> medicines_form}}</td>
            <td>{{ $message -> restriction_formula}}</td>
            <td>{{ $message -> description}}</td>
            <td>{{ $message -> kategori -> nama }}</td>
        </tr>
    </tbody>
  </table>
  @else
  <h2>Tidak ada Data</h2>
  @endif

</div>

</body>
</html>
