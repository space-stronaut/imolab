@extends('layouts.admin')
@section('title')
    Transaction History
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Transaction
                </span>
                {{-- <span>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali</a>
                </span> --}}
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Pembelanjaan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{ $item->user->name }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td>
                                    Rp. {{format_uang($item->total)}}
                                </td>
                                <td class="text-uppercase">
                                    {{$item->status}}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-outline-success me-2">Detail</a>
                                    @if ($item->status == "menunggu konfirmasi")
                                    <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="dikemas">
                                        <button class="btn btn-success">Kemas</button>
                                    </form>
                                    @endif

                                    @if ($item->status == "dikemas" && $item->payment == "cod")
                                    <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="menunggu paket diambil">
                                        <button class="btn btn-success">Selesai Kemas</button>
                                    </form>
                                    @endif

                                    @if ($item->status == "dikemas" && $item->payment != "cod")
                                    <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="paket sedang diantar ke alamat tujuan">
                                        <button class="btn btn-success">Selesai Kemas</button>
                                    </form>
                                    @endif
                                    
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection