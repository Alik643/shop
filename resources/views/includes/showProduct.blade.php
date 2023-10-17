<script>
    window.productDel = "{{ route('products.destroy') }}"
</script>
<div class="show-product-block popup">
    <div class="title-and-close">
        <p class="text-white popup-title">title</p>
        <div class="show-product-block-actions">
            <div class="main-actions">
                @if(Gate::allows('admin'))
                    <span class="edit-product" data-id="">
                    <img src="{{ url('storage/images/Edit_fill.svg') }}" alt="edit">
                </span>
                    <form action="" method="post" class="delete-product">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <img src="{{ url('storage/images/Delete.svg') }}" alt="delete product">
                        </button>
                    </form>
                @endif
            </div>
            <span class="close-popup text-white">
                <img src="{{ url('storage/images/Close_round.png') }}" alt="close" title="">
            </span>
        </div>
    </div>
    <div class="show-product-details">
        <div class="keys">
            <p>Артикул</p>
            <p>Название</p>
            <p>Статус</p>
            <p>Атрибуты</p>
        </div>
        <div class="values">
            <p class="article"></p>
            <p class="name"></p>
            <p class="status"></p>
            <p class="attributes"></p>
        </div>
    </div>
</div>
