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
            public : {
                required : true
            },
            branch_id: {
                required : true
            },
            image : {
                required : true,
                maxlength: 255
            },
            image_long : {
                required : true,
                maxlength: 255
            },
            type:{
                required : true
            }
        },
        messages: {
            title: {
                required : "タイトルを入力する必要があります",
                maxlength: "タイトルの最大長は{0}です"
            },
            excerpt : {
                required : "bắt buộc nhập đoạn trích(excerpt)",
                maxlength: "độ dài đoạn trích(excerpt) không vượt quá {0} kí tự"
            },
            content : {
                cke_required : "cần nhập nội dung"
            },
            public : {
                required : "bắt buộc nhập public"
            },
            branch_id: {
                required : "bắt buộc nhập bài viết thuộc chi nhánh nào"
            },
            image : {
                required : "cần nhập hình ảnh để seo tốt hơn",
                maxlength: "phần hình ảnh không vượt quá {0} kí tự"
            },
            image_long : {
                required : "cần nhập hình ảnh để seo tốt hơn",
                maxlength: "phần hình ảnh không vượt quá {0} kí tự"
            },
            type:{
                required : "cần cho biết kiểu hiện thị bài viết"
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