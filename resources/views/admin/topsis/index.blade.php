@extends('layouts.master')
@section('title')
    Hasil Metode WP
@stop
@section('content')
    <div class="card p-2">
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th class="text-center">Ranking</th>
                    <th>Nama</th>
                    <th>Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $item)
                    <tr>
                        <td width="12%" class="text-center"> {{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->karyawan->nama }}</td>
                        <td class="text-capitalize">{{ $item->nilai_preferensi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
