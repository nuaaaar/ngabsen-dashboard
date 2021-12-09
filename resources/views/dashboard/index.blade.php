@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('style')
    <style>
        .text-default{
            color: #727E8C !important;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;        }
        .text-default:hover{
            color: #475F7B !important
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Welcome</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Selamat datang di dashboard aplikasi NGABSEN, kamu bisa mengelola data karyawan lengkap beserta data absensinya.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
