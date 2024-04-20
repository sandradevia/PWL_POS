<!DOCTYPE html>
<html>
    <head>
        <title>Data Level Pengguna</title>
    </head>
    <body>
        <h1>Data Level Pengguna</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Kode Level</th>
                <th>Nama Level</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <th>{{ $d->level_id }}</th>
                <th>{{ $d->level_kode }}</th>
                <th>{{ $d->level_nama }}</th>
            </tr>
            @endforeach
        </table>
    </body>
</html>