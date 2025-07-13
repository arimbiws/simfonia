<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        h2 {
            text-align: center;
            margin-bottom: 0;
        }

        .small {
            font-size: 10px;
        }
    </style>
</head>

<body>

    <h2>Laporan Data Pengguna</h2>
    @if (!empty($filters['role']) || !empty($filters['tipe']) || !empty($filters['search']))
    <p><strong>Filter:</strong>
        @if ($filters['role']) Role = {{ ucfirst($filters['role']) }} | @endif
        @if ($filters['tipe']) Tipe = {{ ucfirst($filters['tipe']) }} | @endif
        @if ($filters['search']) Pencarian = "{{ $filters['search'] }}" @endif
    </p>
    @endif

    <p class="small">Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Tipe</th>
                <th>NIK/NIM</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->tipe_pembeli ?? '-' }}</td>
                <td>{{ $user->nik_nim }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>{{ $user->alamat }}</td>
                <td> {{ $user->created_at ? $user->created_at->format('d-m-Y') : '-' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>