define(['jquery', 'underscore', 'uiRegistry', 'Magento_Ui/js/form/components/button',
        'Magento_Ui/js/form/form'],
    function ($, _, uiRegistry, button) {
        var mydata = uiRegistry.get("quote_form.quote_form_data_source");
        console.log(mydata);

        return button.extend({
            defaults: {
                elementTmpl: 'ui/form/element/button',
            },
            action: function () {
                $.ajax({
                    type: "POST",
                    url: "/firstproject/quotef/frontend/save",
                    data: mydata.data
                })
            }
        });
    });