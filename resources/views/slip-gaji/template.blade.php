<div style="font-family: Arial, sans-serif; font-size: 12px;">
    <h2>Slip Gaji</h2>
    <p><strong>Nama:</strong> {{ $payroll->user->username }}</p>
    <p><strong>Bulan:</strong> {{ $payroll->bulan }}</p>

    <table style="width:100%; border-collapse: collapse;" border="1">
        <tr>
            <th>Komponen</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td>Rp {{ number_format($payroll->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Tunjangan</td>
            <td>Rp {{ number_format($payroll->tunjangan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td>Rp {{ number_format($payroll->bonus, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Potongan</td>
            <td>Rp {{ number_format($payroll->potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Gaji Bersih</th>
            <th>Rp {{ number_format($payroll->gaji_bersih, 0, ',', '.') }}</th>
        </tr>
    </table>

    <p style="margin-top:20px;">Tanggal Generate: {{ $now }}</p>
</div>
