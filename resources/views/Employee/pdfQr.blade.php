<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 25px;
        }

        .table td,
        .table th {
            border: 1px solid #000000;
            text-align: left;
            font-weight: 400
        }

        .row {
        margin-left:-5px;
        margin-right:-5px;
        }
        
        .column {
        float: left;
        width: 50%;
        padding: 5px;
        }

        .column-table {
        float: left;
        width: 50%;
        padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
        content: "";
        clear: both;
        display: table;
        }

        .center {
            text-align: center;
        }
    </style>

    <title>{{ $title }}</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; text-align: center; margin-bottom: 90px;">{{ _('QR Loket') }}</div>

    <div class="center">
        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form'.$employee->id, 'QRCODE', 7, 7)}}" alt="barcode" />
    </div>
</body>

</html>