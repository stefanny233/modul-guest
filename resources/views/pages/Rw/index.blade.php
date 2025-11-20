@extends('layouts.dashboard.app')
@section('content')

<div class="container mt-4">
    <h3 class="fw-bold">Master RW</h3>
    <a href="{{ route('rw.create') }}" class="btn btn-success mb-3">Tambah RW</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>RW ID</th>
                <th>Nomor RW</th>
                <th>Ketua</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rws as $rw)
            <tr>
                <td>{{ $rw->rw_id }}</td>
                <td>{{ $rw->nomor_rw }}</td>
                <td>{{ optional($rw->ketua)->nama ?? '-' }}</td>
                <td>{{ $rw->keterangan }}</td>
                <td>
                    <a href="{{ route('rw.edit', $rw->rw_id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('rw.destroy', $rw->rw_id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus RW?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $rws->links() }}
</div>
@endsection
