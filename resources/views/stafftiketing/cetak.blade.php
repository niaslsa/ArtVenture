<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #09090b;
        color: white;
        }
    </style>
</head>
<body>
    <div>
        <br>
        <h1>Tabel Report Staff Tiketing</h1>
        <br>
        <table id="customers">
            <tr class="">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kontak</th>
            </tr>
            @foreach ($StaffTiketing as $s)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $s->nama_st }}</td>
                <td>{{ $s->kontak_st }}</td>
            </tr>
        @endforeach
        </table>
    </div>
</body>