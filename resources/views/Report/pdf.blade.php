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
    <div style="font-size: 64px; color: '#dddddd'; text-align: center; margin-bottom: 50px;">{{ _('Daftar Hasil Penilaian') }}</div>

    <table class="table">
        <tr>
            <th style="text-align: center;"><strong>Nama</strong></th>
            <th style="text-align: center;"><strong>Score</strong></th>
            <th style="text-align: center;"><strong>Score</strong></th>
        </tr>
        @foreach($employee_evals as $evaluation)
        <tr>
            <td  style="text-align: center;">{{ $evaluation->employer->name }}</td>
            <td  style="text-align: center;">{{ $evaluation->score }}</td>
            <td  style="text-align: center;">{{ $evaluation->advice == null ? __('-') : $evaluation->advice }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>