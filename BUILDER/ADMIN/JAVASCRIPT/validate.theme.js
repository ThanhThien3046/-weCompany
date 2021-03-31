function validateForm(formJquery){
    formJquery.validate({
        ignore: ".ignore", // validate all hidden select elements
        // onfocusout: function (element) {
        //     var $inputEle = $(element)
        //     if ($inputEle.attr('name') == 'title') {
        //         console.log("đây")
        //         $('input[name=slug]').valid()
        //     }
        //     $(element).valid()
        // },
        errorPlacement: function(error, element) {
            var $inputEle = element
            /// nếu tồn tại class jquery__append-out thì sẽ đưa dom error ra phía ngoài
            /// còn không gữi nguyên như mặc định
            if ($inputEle.hasClass('jquery__append-out')) {
                // $(placement).append(error)
                error.insertAfter($inputEle.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            title: {
                required : true,
                maxlength: 150
            },
            slug: {
                required : true,
                maxlength: 150
            },
            author: {
                required : true,
                maxlength: 100
            },
            url: {
                required : true,
                maxlength: 255
            },
            excerpt : {
                required : true,
                maxlength: 255
            },
            introduce : {
                cke_required : true
            },
            content : {
                cke_required : true
            },
            background : {
                required : true,
                maxlength: 255
            },
            thumbnail : {
                required : true,
                maxlength: 255
            },
            image_laptop : {
                required : true,
                maxlength: 255
            },
            image_tablet : {
                required : true,
                maxlength: 255
            },
            image_mobile : {
                required : true,
                maxlength: 255
            },
            site_name : {
                required : true,
                maxlength: 150
            },
            image : {
                required : true,
                maxlength: 255
            },
            description: {
                maxlength: 160
            }
        },
        messages: {
            title: {
                required : "bắt buộc phải nhập title",
                maxlength: "title có độ dài lớn nhất là {0}"
            },
            slug: {
                required : "bắt buộc nhập title để tạo slug",
                maxlength: "độ dài slug được tạo ra không vượt quá {0} kí tự"
            },
            author: {
                required : "bắt buộc phải nhập author",
                maxlength: "author có độ dài lớn nhất là {0}"
            },
            url: {
                required : "bắt buộc phải nhập url",
                maxlength: "url có độ dài lớn nhất là {0}"
            },
            excerpt : {
                required : "bắt buộc nhập đoạn trích(excerpt)",
                maxlength: "độ dài đoạn trích(excerpt) không vượt quá {0} kí tự"
            },
            introduce : {
                cke_required : "cần nhập nội dung introduce"
            },
            content : {
                cke_required : "cần nhập nội dung"
            },
            background : {
                required : "bắt buộc nhập background",
                maxlength: "đường link vượt {0} kí tự"
            },
            thumbnail : {
                required : "bắt buộc nhập thumbnail",
                maxlength: "đường link vượt {0} kí tự"
            },
            image_laptop : {
                required : "bắt buộc nhập image_laptop",
                maxlength: "image_laptop vượt {0} kí tự"
            },
            image_tablet : {
                required : "bắt buộc nhập image_tablet",
                maxlength: "image_tablet vượt {0} kí tự"
            },
            image_mobile : {
                required : "bắt buộc nhập image_mobile",
                maxlength: "image_mobile vượt {0} kí tự"
            },
            site_name : {
                required : "cần thêm site_name cho seo",
                maxlength: "phần site_name không vượt quá {0} kí tự"
            },
            image : {
                required : "cần nhập hình ảnh (image) để seo tốt hơn",
                maxlength: "phần hình ảnh (image seo ) không vượt quá {0} kí tự"
            },
            description: {
                maxlength: "phần description không vượt quá {0} kí tự"
            }
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