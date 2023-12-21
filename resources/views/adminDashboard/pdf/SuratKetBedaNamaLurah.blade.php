<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            width: 120px;
            height: 150px;
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
                <img src="{{public_path('storage/asset/sleman.png')}}" id="foto" alt="Logo" height="75px" />
                <h1 class="text-center">PEMERINTAH KABUPATEN SLEMAN</h1>
                <p class="text-center">KAPONEWON GAMPING</p>
                <h1 class="text-center">LURAH AMBARKETAWANG</h1>
                <h1 class="text-center"><img src="{{public_path('storage/asset/aksara.png')}}" id="foto2" alt="Logo" /></h1>
                <p class="text-center">Jalan Wates KM 5, Ambarketawang, Gamping, Sleman,55294</p>
                <p class="text-center">Telepon (0274) 797496</p>
                <p class="text-center">Laman: https://ambarketawang.sidesimanis.slemankab.go.id</p>
            </div>
            <div class="divider py-1 bg-dark mb-3 mt-2"></div>
            <div class="header2">
                <h1 class="text-center">SURAT KETERANGAN BEDA NAMA</h1>
                <p class="text-center">NOMOR: {{$surat->no_surat_skbn}}/Ket/Amb/XI/{{ date('Y') }}</p>
            </div>
            <p class="mt-2">Yang bertanda tangan dibawah ini:</p>
            <table class="font-12">
                <tr>
                    <td width="200px">A. Nama</td>
                    <td width="10px">:</td>
                    <td>Sumaryanto</td>
                </tr>
                <tr>
                    <td width="200px">B. Jabatan</td>
                    <td width="10px">:</td>
                    <td>Lurah</td>
                </tr>
            </table>
            <p class="mt-2">Berdasarkan data pemohon, dengan ini Pemerintah Kalurahan Ambarketawang menerangkan bahwa:</p>
            <table class="font-12">
                <tr>
                    <td width="200px">A. Nama</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->nama}}</td>
                </tr>
                <tr>
                    <td width="200px">B. NIK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->nik}}</td>
                </tr>
                <tr>
                    <td width="200px">C. NO KK</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->no_kk}}</td>
                </tr>
                <tr>
                    <td width="200px">D. Tempat, Tanggal Lahir</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->tempat_lahir}}, {{ $surat->pend->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td width="200px">F. Agama</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->agama}}</td>
                </tr>
                <tr>
                    <td width="200px">E. Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->padukuhan}}, RT {{ $surat->pend->rt}} / RW {{ $surat->pend->rw}}</td>
                </tr>
            </table>
            <br>
            <p>adalah orang yang sama dengan yang tertulis di ............................. sama dengan data :</p>
            <table class="font-12">
                <tr>
                    <td width="200px">A. Nama</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->nama}}</td>
                </tr>
                <td width="200px">B. Tempat, Tanggal Lahir</td>
                <td width="10px">:</td>
                <td>{{$surat->pend->tempat_lahir}}, {{ $surat->pend->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td width="200px">C. Alamat</td>
                    <td width="10px">:</td>
                    <td>{{$surat->pend->padukuhan}}, RT {{ $surat->pend->rt}} / RW {{ $surat->pend->rw}}</td>
                </tr>
                <tr>
                    <td width="200px">D. Keperluan</td>
                    <td width="10px">:</td>
                    <td>{{$surat->keperluan_skbn}}</td>
                </tr>
            </table>
            <p class="mb-2 mt-2">Demikian surat keterangan ini kami buat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.</p>
            <div class="tandatangan">

                <br>

                <p style="padding-bottom:100px">
                    Ambarketawang, ......................... {{ date('Y') }}</br>
                    Lurah Ambarketawang</p>


                <p>Sumaryanto</p>
            </div>
        </div>
    </div>
</body>

</html>