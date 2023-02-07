@extends('layouts.master')
@section('title')
    Penilaian Kemampuan Umum
@stop
@section('content')
    <div class="card p-2">
        <button type="button" class="btn btn-primary btn-sm d-block my-2 ml-auto" data-toggle="modal"
            data-target="#createKemampuan">
            Tambah Data
        </button>
        @include('admin.kemampuan.create')
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tahun</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kemampuan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->karyawan->nama }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>
                            {{-- <button class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editKemampuan-{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button> --}}
                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#showKemampuan-{{ $item->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteKemampuan-{{ $item->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            {{-- @include('admin.kemampuan.edit') --}}
                            @include('admin.kemampuan.show')
                            @include('admin.kemampuan.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
