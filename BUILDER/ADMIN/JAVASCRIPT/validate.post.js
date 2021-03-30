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
            excerpt : {
                required : true,
                maxlength: 255
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
            public : {
                required : true
            },
            topic_id: {
                required : true
            },
            rate_value: {
                required : true,
                number: true,
                min: 2.5,
                max: 5
            },
            site_name : {
                required : true,
                maxlength: 150
            },
            image_seo : {
                required : true,
                maxlength: 255
            },
            type:{
                required : true
            },
            stylesheet: {
                maxlength: 10000
            },
            javascript:{
                maxlength: 10000
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
            excerpt : {
                required : "bắt buộc nhập đoạn trích(excerpt)",
                maxlength: "độ dài đoạn trích(excerpt) không vượt quá {0} kí tự"
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
            public : {
                required : "bắt buộc nhập public"
            },
            topic_id: {
                required : "bắt buộc nhập topic"
            },
            rate_value: {
                required : "bắt buộc nhập số",
                number: "bắt buộc nhập số",
                min: "đánh giá không nên nhỏ hơn 3.5",
                max: "đánh giá không được phép lớn hơn 5"
            },
            site_name : {
                required : "cần thêm site_name cho seo",
                maxlength: "phần site_name không vượt quá {0} kí tự"
            },
            image_seo : {
                required : "cần nhập hình ảnh (image_seo) để seo tốt hơn",
                maxlength: "phần hình ảnh (image_seo) không vượt quá {0} kí tự"
            },
            type:{
                required : "cần thêm type post hoặc tag"
            },
            stylesheet: {
                maxlength: "phần stylesheet không nên vượt quá {0} kí tự "
            },
            javascript:{
                maxlength: "phần javascript không nên vượt quá {0} kí tự "
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