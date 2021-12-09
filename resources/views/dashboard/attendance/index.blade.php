@extends('layouts.dashboard')

@section('title', 'Riwayat Absensi')

@section('style')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Riwayat Absensi</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table datatable table-responsive" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 1%" class="text-nowrap">Tanggal & Waktu</th>
                                        <th style="width: 15%">Nama</th>
                                        <th style="width: 1%">Status</th>
                                        <th class="text-center" style="width: 1%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td></td>
                                            <td class="text-nowrap">
                                                {{ $attendance->created_at }}
                                                @if ($attendance->is_late)
                                                    <span class="small text-danger d-block">(Terlambat)</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $attendance->user->nama }}</td>
                                            <td class="text-center text-nowrap text-capitalize">{{ $attendance->status }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('dashboard.attendance.show', $attendance->id) }}" class="btn btn-warning">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection
