<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi Homecare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 5px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        h2 {
            font-size: 18px;
            margin-top: 0;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi Homecare</h2>
    <h4>Tanggal: {{ $start_date }} - {{ $end_date }}</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>Perawat</th>
                <th>Jarak</th>
                <th>Waktu</th>
                <th>Pembayaran</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalData = 0;
                $totalBiaya = 0;
            @endphp
            @forelse($transaksiHomecare as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->pasien->name }}</td>
                    <td>{{ $row->perawat->name }}</td>
                    <td>{{ $row->jarak }} KM</td>
                    <td>{{ $row->waktu }}</td>
                    <td>{{ $row->metode_pembayaran }}</td>
                    <td>{{ 'Rp. ' . number_format($row->total_biaya, 0, ',', '.') }}</td>
                </tr>
                @php
                    $totalData++;
                    $totalBiaya += $row->total_biaya;
                @endphp
            @empty
                <td colspan="7" style="text-align:center;">Data tidak tersedia</td>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right text-bold">Total Biaya</td>
                <td class="text-bold">{{ 'Rp. ' . number_format($totalBiaya, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="footer">
        <p>Total data: {{ $totalData }}</p>
    </div>
</body>

</html>
