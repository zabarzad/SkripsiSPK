@extends('layouts.master')
@section('title')
    Hasil Metode WP
@stop
@section('content')
    <div class="card p-2">
        <a href="{{ route('wp.proses') }}" type="button" class="btn btn-primary btn-sm d-block my-2 ml-auto">
            Sinkronisasi
        </a>
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Nama</th>
                    <th>Alternatif S</th>
                    <th>Alternatif V</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $item)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->karyawan->nama }}</td>
                        <td class="text-capitalize">{{ $item->alternatif_s }}</td>
                        <td class="text-capitalize">{{ $item->alternatif_v }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
