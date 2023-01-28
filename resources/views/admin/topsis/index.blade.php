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
                    <th>Nama</th>
                    <th>Hasil</th>
                    <th>Rangking</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $item)
                    <tr>
                        <td class="text-capitalize">{{ $item->nama }}</td>
                        <td class="text-capitalize">{{ $item->nama }}</td>
                        <td class="text-capitalize">{{ $item->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
