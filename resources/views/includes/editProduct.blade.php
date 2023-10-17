<div class="edit-product-block popup">
    <div class="title-and-close">
        <p class="text-white popup-title">Добавить продукт</p>
        <span class="close-popup text-white"><img src="{{ url('storage/images/Close_round.png') }}" alt="close" title=""></span>
    </div>
    <div class="post-details">
        <form class="product-action-form" action="{{ route('products.update') }}" method="post">
            @method('patch')
            @csrf
            <label>
                <span class="fz9">Артикул</span>
                @error("ARTICLE")
                <p class="text-danger"> {{ $message }}</p>
                @enderror
                <input type="text" name="ARTICLE">
            </label>
            <label>
                <span class="fz9">Название</span>
                @error("NAME")
                <p class="text-danger"> {{ $message }}</p>
                @enderror
                <input type="text" name="NAME">
            </label>
            <label>
                <p class="fz9">Статус</p>
                @error("STATUS")
                <span> {{ $message }}</span>
                @enderror
                <input type="hidden" name="STATUS" value="1">
                <div class="availability-status">
                    <p class="selected-version">
                        <span class="selected-version-text">Доступен</span>
                        <span><img src="{{ url('storage/images/Expand_down.png') }}" alt="expand" title=""></span>
                    </p>
                    <div class="status-versions">
                        <p class="status-version active-status-version" data-val="1">Доступен</p>
                        <p class="status-version" data-val="0">Не доступен</p>
                    </div>
                </div>
            </label>
            <input type="hidden" name="DATA">
        </form>
        <div class="product-attributes">
            <p class="attr-title">Атрибуты</p>
            <p class="add-attr">+ Добавить атрибут</p>
            <button type="submit" class="edit-attr-btn">Добавить</button>
        </div>
    </div>
</div>
