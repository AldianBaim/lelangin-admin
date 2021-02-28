<div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama petugas</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officers as $officer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $officer->name }}</td>
                    <td>{{ $officer->role->name }}</td>
                    <td>
                        <form wire:submit.prevent="changeAccess({{$officer->id}})">
                            @if($officer->role_id == 2)
                            <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="badge bg-primary" style="border: 0">Jadikan admin</button>
                            @else
                            <button type="submit" class="badge bg-success" style="border: 0" disabled>admin <i class="bi-check"></i></button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $officers->links() }}
        </div>
    </div>
</div>
