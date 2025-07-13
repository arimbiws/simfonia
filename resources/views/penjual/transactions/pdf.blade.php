<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi Penjual</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi Penjual</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Unit</th>
                <th>Pembeli</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tgl Pembelian</th>
                <th>Tgl Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $i => $o)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $o->product->nama ?? '-' }}</td>
                <td>{{ $o->product->unit->nama_unit ?? '-' }}</td>
                <td>{{ $o->buyer->name ?? '-' }}</td>
                <td>Rp{{ number_format($o->total_harga, 0, ',', '.') }}</td>
                <td>{{ $o->status_transaksi ? 'SELESAI' : 'PENDING' }}</td>
                <td>{{ $o->booking ? \Carbon\Carbon::parse($o->booking->tanggal_mulai)->format('d M Y') : $o->created_at->format('d M Y') }}</td>
                <td>{{ $o->booking ? \Carbon\Carbon::parse($o->booking->tanggal_kembali)->format('d M Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>