@extends('layouts.master')
@section('title')
    Bobot
@stop
@section('content')
    <div class="card p-2">
        <button type="button" class="btn btn-primary btn-sm d-block my-2 ml-auto" data-toggle="modal"
            data-target="#createBobot">
            Tambah Bobot
        </button>
        @include('admin.Bobot.create')
        @include('admin.components.alert')
        <table id="table" class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>K1</th>
                    <th>K2</th>
                    <th>K3</th>
                    <th>KA</th>
                    <th>KB</th>
                    <th>KC</th>
                    <th>KD</th>
                    <th>KE</th>
                    <th>KF</th>
                    <th>KG</th>
                    <th>KH</th>
                    <th>KI</th>
                    <th>KJ</th>
                    <th>KK</th>
                    <th>KL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bobotKriteria as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->k1 }}</td>
                        <td>{{ $item->k2 }}</td>
                        <td>{{ $item->k3 }}</td>
                        <td>{{ $item->ka }}</td>
                        <td>{{ $item->kb }}</td>
                        <td>{{ $item->kc }}</td>
                        <td>{{ $item->kd }}</td>
                        <td>{{ $item->ke }}</td>
                        <td>{{ $item->kf }}</td>
                        <td>{{ $item->kg }}</td>
                        <td>{{ $item->kh }}</td>
                        <td>{{ $item->ki }}</td>
                        <td>{{ $item->kj }}</td>
                        <td>{{ $item->kk }}</td>
                        <td>{{ $item->kl }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editBobot-{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteBobot-{{ $item->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('admin.bobot.edit')
                            @include('admin.bobot.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@include('admin.components.datatable')
