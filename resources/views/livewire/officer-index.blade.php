<div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officers as $officer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$officer->name}}</td>
                    <td>{{$officer->email}}</td>
                    <td>{{$officer->phone_number}}</td>
                    <td>{{$officer->role->name}}</td>
                    <td>
                        <a href="" class="badge bg-light-primary">Ubah</a>
                        <a href="" class="badge bg-light-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
