function validateForm(formJquery){
    formJquery.validate({
        ignore: ".ignore", // validate all hidden select elements
        onfocusout: function (element) {
            console.log("đay")
            $(element).valid()
        },
        errorPlacement: function(error, element) {
            var $inputEle = element
            /// nếu tồn tại class jquery__append-out thì sẽ đưa dom error ra phía ngoài
            /// còn không gữi nguyên như mặc định
            if ($inputEle.hasClass('jquery__append-out')) {
                // $(placement).append(error)
                error.insertAfter($inputEle.parent());
            } else {
                error.insertAfter(element)
            }
        },
        rules: {
            title: {
                required : true,
                maxlength: 150
            },
            excerpt : {
                required : true,
                maxlength: 255
            },
            banner : {
                required : true,
                maxlength: 255
            },
            image : {
                required : true,
                maxlength: 255
            },
        },
        messages: {
            title: {
                required : "bắt buộc phải nhập title",
                maxlength: "title có độ dài lớn nhất là {0}"
            },
            excerpt : {
                required : "bắt buộc nhập đoạn trích(excerpt)",
                maxlength: "độ dài đoạn trích(excerpt) không vượt quá {0} kí tự"
            },
            image : {
                required : "cần nhập hình ảnh  để seo tốt hơn",
                maxlength: "phần hình ảnh  không vượt quá {0} kí tự"
            },
            banner : {
                required : "cần nhập hình ảnh  để seo tốt hơn",
                maxlength: "phần hình ảnh  không vượt quá {0} kí tự"
            },
        }
    });
}


function checkCkeditorRequried(element){
    
    return CKEDITOR.instances[$(element).attr('id')].getData()
}

jQuery.validator.addMethod('cke_required', function(value, element) {

    return checkCkeditorRequried(element)
})

/// dom load success
$(document).ready(function() {

    var DF_FORM_VALIDATE = $(".js-validate-form")
    if(DF_FORM_VALIDATE.length){
        validateForm(DF_FORM_VALIDATE);
    }
});