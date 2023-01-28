@extends('layouts.master')
@section('title')
    Penilaian Objektivitas Kerja
@stop
@section('content')
    <div class="card p-2">
        <button type="button" class="btn btn-primary btn-sm d-block my-2 ml-auto" data-toggle="modal"
            data-target="#createObjektivitas">
            Tambah Data
        </button>
        @include('admin.objektivitas.create')
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Posisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->karyawan->nama }}</td>
                        <td class="text-capitalize">{{ $item->posisi->nama }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editObj-{{ $item->posisi->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            @if (in_array($item->id, $objDetail->pluck('objektivitas_id')->toArray()))
                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#showObj-{{ $item->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            @endif
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteObj-{{ $item->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('admin.objektivitas.edit')
                            @include('admin.objektivitas.show')
                            @include('admin.objektivitas.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
@push('js')
    <script>
        var posisi = {!! json_encode($posisi) !!}
        var karyawan = {!! json_encode($karyawan) !!}
        $('#karyawan').on('change', function() {
            var b = karyawan.find(e => e.id == this.value)
            var a = posisi.find(e => e.id == b.posisi_id)
            $('#posisi').val(a.nama);
            $('#posisi_id').val(a.id);
        });
    </script>
@endpush
