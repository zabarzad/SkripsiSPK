@extends('layouts.master')
@section('title')
    Penilaian Disiplin
@stop
@section('content')
    <div class="card p-2">
        <button type="button" class="btn btn-primary btn-sm d-block my-2 ml-auto" data-toggle="modal"
            data-target="#createDisiplin">
            Tambah Data
        </button>
        @include('admin.disiplin.create')
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Presentase Kehadiran</th>
                    <th>Nilai Penampilan</th>
                    <th>Nilai Kebersihan Ruang Kerja</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disiplin as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->karyawan->nama }}</td>
                        @foreach ($penilaian as $p)
                            @if ($p->karyawan_id == $item->karyawan_id)
                                <td>{{ $p->kehadiran }}%</td>
                                <td>{{ $p->seragam }}</td>
                                <td>{{ $p->kebersihan }}</td>
                            @endif
                        @endforeach
                        <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editDisiplin-{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteDisiplin-{{ $item->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('admin.disiplin.edit')
                            @include('admin.disiplin.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
