<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keluhan Pengguna</title>

    <style>

        *{
            box-sizing: border-box;
        }

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1e293b;
            padding: 20px;
        }

        h1{
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
        }

        .sub{
            margin-top: 6px;
            color: #64748b;
            font-size: 13px;
        }

        .badge{
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-open{
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-process{
            background: #fef3c7;
            color: #d97706;
        }

        .badge-resolved{
            background: #dcfce7;
            color: #16a34a;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        thead{
            background: #f8fafc;
        }

        th{
            border: 1px solid #cbd5e1;
            padding: 12px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            color: #334155;
        }

        td{
            border: 1px solid #e2e8f0;
            padding: 12px;
            vertical-align: top;
            font-size: 11px;
        }

        tbody tr:nth-child(even){
            background: #f8fafc;
        }

        .message{
            max-width: 250px;
            line-height: 1.5;
        }

        .footer{
            margin-top: 30px;
            text-align: right;
            color: #94a3b8;
            font-size: 11px;
        }

    </style>
</head>

<body>

    <h1>Laporan Keluhan Pengguna</h1>

    <p class="sub">
        PediaFlorist Pro —
        {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d F Y H:i') }} WIB
    </p>

    <table>

        <thead>

            <tr>
                <th width="5%">No</th>
                <th width="18%">Nama User</th>
                <th width="20%">Email</th>
                <th width="15%">Topik</th>
                <th width="10%">Urgensi</th>
                <th width="22%">Pesan</th>
                <th width="10%">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($complaints as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->user->name ?? 'User Tidak Ditemukan' }}
                    </td>

                    <td>
                        {{ $item->user->email ?? '-' }}
                    </td>

                    <td>
                        {{ $item->topic }}
                    </td>

                    <td>
                        {{ ucfirst($item->urgency) }}
                    </td>

                    <td class="message">
                        {{ $item->message }}
                    </td>

                    <td>

                        @if($item->status == 'Open')

                            <span class="badge badge-open">
                                OPEN
                            </span>

                        @elseif($item->status == 'Process')

                            <span class="badge badge-process">
                                PROCESS
                            </span>

                        @else

                            <span class="badge badge-resolved">
                                RESOLVED
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" style="text-align:center; padding:30px; color:#94a3b8;">
                        Belum ada data keluhan pengguna.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">
        Generated automatically by PediaFlorist Pro System
    </div>

</body>
</html>
