@extends('layouts.dashboard')

@section('title', 'Riwayat Absensi')

@section('style')
    <style>
        .table-pegawai td{
            padding-left: 12px;
            padding-right: 12px;
            text-align: justify;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Data Pegawai</span>
                </div>
                <div class="card-body">
                    <table class="w-100 table-pegawai">
                        <tr>
                            <td rowspan="4" style="width: 1%"><img src="{{ $attendance->user->foto_diri }}" height="128px"></td>
                            <td class="align-top">Nama</td>
                            <td class="align-top">{{ $attendance->user->nama }}</td>
                        </tr>
                        <tr>
                            <td class="align-top">NIK</td>
                            <td class="align-top">{{ $attendance->user->nik }}</td>
                        </tr>
                        <tr>
                            <td class="text-nowrap align-top" style="width: 1%">Jenis Kelamin</td>
                            <td class="text-capitalize align-top">{{ $attendance->user->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="align-top">Alamat</td>
                            <td class="align-top">{{ $attendance->user->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Foto Selfie</span>
                </div>
                <div class="card-body">
                    <img src="{{ $attendance->image }}"  class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Detail Presensi</span>
                </div>
                <div class="card-body">
                    <table class="w-100 table-pegawai">
                        <tr>
                            <td class="align-top text-nowrap" style="width: 1%">Tanggal & Waktu</td>
                            <td class="align-top text-capitalize">{{ $attendance->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="align-top">Status</td>
                            <td class="align-top text-capitalize">{{ $attendance->status }}</td>
                        </tr>
                        @if ($attendance->is_late)
                            <tr>
                                <td class="align-top">Keterangan</td>
                                <td class="align-top text-capitalize"><span class="text-danger">Terlambat</span></td>
                            </tr>
                        @endif
                        @if ($activity != null)
                        <tr>
                            <td class="align-top">Aktivitas</td>
                            <td class="align-top text-capitalize" style="white-space: pre-line">{!! $activity->descriptions !!}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if ($("a[href='{{ route('dashboard.attendance.index') }}']")[0])
        {
            $("a[href='{{ route('dashboard.attendance.index') }}']").closest("li").addClass("active");
        }
    </script>
@endsection
