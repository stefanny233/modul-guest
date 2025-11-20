@extends('layouts.dashboard.app')
@section('content')

<div class="container mt-4">
    <h3 class="fw-bold">Master RT</h3>
    <a href="{{ route('rt.create') }}" class="btn btn-success mb-3">Tambah RT</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>RT ID</th>
                <th>Nomor RT</th>
                <th>RW</th>
                <th>Ketua</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rts as $rt)
            <tr>
                <td>{{ $rt->rt_id }}</td>
                <td>{{ $rt->nomor_rt }}</td>
                <td>{{ optional($rt->rw)->nomor_rw ?? '-' }}</td>
                <td>{{ optional($rt->ketua)->nama ?? '-' }}</td>
                <td>{{ $rt->keterangan }}</td>
                <td>
                    <a href="{{ route('rt.edit', $rt->rt_id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus RT?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $rts->links() }}
</div>
@endsection
