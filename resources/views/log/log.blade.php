@extends('layout.layout')
@section('title', 'Log Activity')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Activity</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Log Activity</h2>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $logs as $l)
        <tr>
            <td>{{ $l->id_logs }}</td>
            <td>{{ $l->logs }}</td>
        </tr>
        @endforeach
        <!-- Add more rows as needed -->
    </tbody>
</table>

</body>
</html>
@endsection