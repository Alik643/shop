@extends('layouts.main')

@section('content')
    <script>
        window.productShow = "{{ route('products.show') }}"
    </script>
    @auth()
    <div class="add-product-button">Добавить</div>
    @endauth
    @if(session()->has('message'))
        <div class="one-time-message">
            {{ session('message') }}
        </div>
    @endif
    <table class="products">
        <thead>
        <tr>
            <th>АРТИКУЛ</th>
            <th>НАЗВАНИЕ</th>
            <th>СТАТУС</th>
            <th>АТРИБУТЫ</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->ARTICLE }}</td>
                <td>{{ $product->NAME }}</td>
                <td>
                    @if($product->STATUS)
                        Доступен
                    @else
                        Не доступен
                    @endif
                </td>
                <td>
                    @if($product->DATA)
                        @foreach($product->DATA as $k => $attr)
                            <p>{{ $k . ": " . $attr }}</p>
                        @endforeach
                    @endif
                </td>
                <td>
                    <img class="product-detail" data-id="{{ $product->id }}" src="{{ url('storage/images/detail.svg') }}" alt="detail">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('includes.addProduct')
    @include('includes.showProduct')
    @include('includes.editProduct')
@endsection
