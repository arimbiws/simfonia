<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
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
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Unit</th>
                <th>Pembeli</th>
                <th>Harga</th>
                <th>Tgl Pembelian</th>
                <th>Tgl Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $t)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $t->product->nama ?? 'Produk Dihapus' }}</td>
                <td>{{ $t->product->unit->nama_unit ?? '-' }}</td>
                <td>{{ $t->buyer->name ?? 'N/A' }}</td>
                <td>Rp{{ number_format($t->total_harga, 0, ',', '.') }}</td>
                <td>
                    {{ $t->booking ? \Carbon\Carbon::parse($t->booking->tanggal_mulai)->format('d M Y') : \Carbon\Carbon::parse($t->created_at)->format('d M Y') }}
                </td>
                <td>
                    {{ $t->booking ? \Carbon\Carbon::parse($t->booking->tanggal_kembali)->format('d M Y') : '-' }}
                </td>
                <td>{{ $t->status_transaksi ? 'SUCCESS' : 'PENDING' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>