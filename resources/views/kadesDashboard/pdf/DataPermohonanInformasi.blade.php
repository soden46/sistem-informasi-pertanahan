<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-size: 12px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        .table,
        .td,
        .th,
        thead {
            border: 1px solid black;
            text-align: center
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-success {
            color: green
        }

        .text-danger {
            color: red
        }

        .fw-bold {
            font-weight: bold
        }

        .tandatangan {
            text-align: center;
            margin-left: 400px;

        }

        #foto {
            float: left;
            width: 65px;
            height: 73px;
            background: transparent;
        }

        #foto2 {
            justify-content: center;
            width: 60%;
            height: 30px;
            background: transparent;
        }

        .header h1 {
            font-size: 18px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 1px;
        }

        .header p {
            font-size: 13px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 1px;
        }

        .header2 h1 {
            font-size: 14px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 2px;
            text-decoration: underline;
        }

        .header2 p {
            font-size: 12px;
            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            top: 2px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="header">
                <img src="{{public_path('storage/asset/sragen.webp')}}" id="foto" alt="Logo" width="45px" />
                <h1 class="text-center">PERMOHONAN INFORMASI TANAH</h1>
                <h1 class="text-center">DESA GENEGDUWUR, KECAMATAN GEMOLONG, KABUPATEN SRAGEN</h1>
            </div>
            <div class="divider py-1 bg-dark mb-3 mt-2"></div>
            <p class="text-center">Nomor: {{$no_surat->nomor}}</p>
            <table class="font-12">
                <tr>
                    <td width="200px">TANGGAL</td>
                    <td width="10px">:</td>
                    <td>{{date('d/m/Y',strtotime($data->tgl_pemohon))}}</td>
                </tr>
                <tr>
                    <td width="200px">ID PEMOHON</td>
                    <td width="10px">:</td>
                    <td>{{$data->id_pemohon}}</td>
                </tr>
                <tr>
                    <td width="200px">NAMA PEMOHON</td>
                    <td width="10px">:</td>
                    <td>{{$data->nama_pemohon}}</td>
                </tr>
                <tr>
                    <td width="200px">NO KTP</td>
                    <td width="10px">:</td>
                    <td>{{$data->no_ktp}}</td>
                </tr>
                <tr>
                    <td width="200px">ALAMAT</td>
                    <td width="10px">:</td>
                    <td>{{$data->alamat}}</td>
                </tr>
                <tr>
                    <td width="200px">TELEPON</td>
                    <td width="10px">:</td>
                    <td>{{$data->telepon}}</td>
                </tr>
                <tr>
                    @foreach($jenis_informasi as $jenis)
                    <td width="200px">JENIS PERMOHONAN</td>
                    <td width="10px">:</td>
                    <td>{{ $jenis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td width="200px">JENIS TANAH</td>
                    <td width="10px">:</td>
                    <td>{{$data->jenis_tanah}}</td>
                </tr>
            </table>
            <div class="tandatangan">

                <br>

                <p style="padding-bottom:100px">
                    Genengduwur, ......................... {{ date('Y') }}</br>
                    Mengetahui</br>
                    Kepala Desa Genengduwur</p>


                <p>Sri Lestari, S.H.</p>
            </div>
        </div>
    </div>
</body>

</html>