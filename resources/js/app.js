import './bootstrap';

$(document).ready(function () {
    let productInfo = ''

    $(document).on("click", '.add-product-button', function () {
        $('.add-product-block').show()
    })

    $(document).on('click', '.close-popup', function () {
        $(this).closest('.popup').hide()
        this.parentElement.parentElement.querySelectorAll('.product-attributes>div').forEach(function (e) {
            e.remove()
        })
    })

    $(document).on('click', '.selected-version', function () {
        $('.status-versions').slideToggle();
    })

    $(document).on('click', '.status-version', function () {
        this.parentElement.querySelector('.active-status-version').classList.remove("active-status-version")
        $(this).addClass('active-status-version')
        $('.status-versions').slideUp();
        $('input[name="STATUS"]').val($(this).attr('data-val'))
        $('.selected-version-text').text($(this).text())
    })

    $(document).on('click', '.add-attr', function () {
        let html = "<div class=\"added-attribute\">\n" +
            "                    <label>\n" +
            "                        <span class=\"fz9 \">Название</span>\n" +
            "                        <input type=\"text\" class='key' name=\"attr-name\">\n" +
            "                    </label>\n" +
            "                    <label>\n" +
            "                        <span class=\"fz9\">Значение</span>\n" +
            "                        <input type=\"text\" class='value' name=\"attr-val\">\n" +
            "                    </label>\n" +
            "                    <span class=\"del-attr\"><img src=\"storage/images/Delete.svg\" alt=\"delete\"></span>\n" +
            "                </div>"
        $(this).before(html)
    })

    $(document).on('click', '.add-attr-btn', function (e) {
        let keyValuePairs = document.querySelectorAll('.add-product-block .product-attributes > div');
        let data = {};
        keyValuePairs.forEach(function (pair) {
            let key = pair.querySelector('.key').value;
            let value = pair.querySelector('.value').value;

            if (key && value) {
                data[key] = value;
            }
        });
        let jsonData = JSON.stringify(data);
        $('.add-product-block .product-action-form>input[name="DATA"]').val(jsonData)

        let form = $('.add-product-block .product-action-form')
        form.submit();
    })

    $(document).on('click', '.edit-attr-btn', function (e) {
        let keyValuePairs = document.querySelectorAll('.edit-product-block .product-attributes > div');
        let data = {};
        keyValuePairs.forEach(function (pair) {
            let key = pair.querySelector('.key').value;
            let value = pair.querySelector('.value').value;

            if (key && value) {
                data[key] = value;
            }
        });
        let jsonData = JSON.stringify(data);
        $('.edit-product-block .product-action-form>input[name="DATA"]').val(jsonData)

        let form = $('.edit-product-block .product-action-form')
        form.submit();
    })

    $(document).on('click', '.del-attr', function () {
        $(this).parent().remove();
    })

    $(document).on('click', '.product-detail', function () {
        let id = $(this).attr('data-id')
        axios.get(window.productShow + "/" + id, {
            data: {
                product: id
            }
        })
            .then(function (response) {
                productInfo = response.data
                let attributes = JSON.parse(response.data.DATA)
                let dataString = ''
                Object.keys(attributes).forEach(key => {
                    dataString += "<p>" + key + ": " + attributes[key] + "</p>"
                })
                $('.edit-product').attr('data-id', response.data.id)
                $('.show-product-block .popup-title').text(response.data.NAME)
                $('.show-product-block .article').text(response.data.ARTICLE)
                $('.show-product-block .name').text(response.data.NAME)
                $('.show-product-block .status').text(response.data.STATUS)
                $('.show-product-block .attributes').html(dataString)
                $('.delete-product').attr('action', window.productDel + "/" + response.data.id)
                $('.show-product-block').show();
            })
            .catch(function () {
                console.error('Element not found')
            })
    })

    $(document).on('click', '.edit-product', function () {
        let id = $(this).attr('data-id')
        $('.edit-product-block .product-action-form').attr('action',
            $('.edit-product-block .product-action-form').attr('action') + '/' + id)

        $('.edit-product-block input').each(function (e) {
            let name = $('.edit-product-block input')[e].getAttribute('name')
            if (productInfo[name])
                $('.edit-product-block input')[e].value = productInfo[name]
        })
        let attributes = JSON.parse(productInfo['DATA'])

        Object.keys(attributes).forEach(function (e) {
            let html = "<div class=\"added-attribute\">\n" +
                "                    <label>\n" +
                "                        <span class='fz9'>Название</span>\n" +
                "                        <input value=" + e + " type='text' class='key' name='attr-name'>\n" +
                "                    </label>\n" +
                "                    <label>\n" +
                "                        <span class='fz9'>Значение</span>\n" +
                "                        <input value=" + attributes[e] + " type='text' class='value' name='attr-val'>\n" +
                "                    </label>\n" +
                "                    <span class='del-attr'><img src='storage/images/Delete.svg' alt='delete'></span>\n" +
                "                </div>"
            $('.edit-product-block .add-attr').before(html);
        })
        if (!productInfo["STATUS"]) {
            $('.edit-product-block .status-versions p:nth-child(2)').trigger('click')
        } else {
            $('.edit-product-block .status-versions p:nth-child(1)').trigger('click')
        }

        $('.edit-product-block').show();
        $('.show-product-block').hide();
    })
})
