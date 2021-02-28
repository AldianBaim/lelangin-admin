<div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama lelang</th>
                    <th>Nama peminat</th>
                    <th>Harga awal</th>
                    <th>Harga tawaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biddings as $bidding)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bidding->bidMaster->title}}</td>
                    <td>{{$bidding->user->username}}</td>
                    <td><span class="badge bg-success">Rp {{ number_format($bidding->BidMaster->product->first_price) }}</span></td>
                    <td><span class="badge bg-success">Rp {{ number_format($bidding->bid_price) }}</span></td>
                    <td>
                        <form wire:submit.prevent="changeWinner({{ $bidding->id }}, {{ $bidding->product_id }})">
                            <button type="submit" onclick="return confirm('Apakah anda yakin??')" class="badge bg-info" style="border: 0px;border-radius:0;margin-top: -1px">Pilih jadi pemenang <i class="bi-check"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $biddings->links() }}
        </div>
    </div>
</div>
