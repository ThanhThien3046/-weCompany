function validateForm(formJquery){
    formJquery.validate({
        ignore: ".ignore", // validate all hidden select elements
        rules: {
            name: {
                required : true,
                maxlength: 150
            },
            email: {
                required : true,
                email: 150
            },
            mobile: {
                required : true,
                phone_number: true
            }
        },
        messages: {
            name: {
                required : "bắt buộc phải nhập tên của bạn",
                maxlength: "title có độ dài lớn nhất là {0}"
            },
            email: {
                required : "bắt buộc nhập email",
                email: "email đã nhập không đúng định dạng",
            },
            mobile: {
                required : "bắt buộc nhập số điện thoại",
                phone_number: "số điện thoại đã nhập chưa đúng định dạng",
            }
        }
    });
}


jQuery.validator.addMethod('phone_number', function(phone_number, element) {

    if(phone_number.indexOf('--') != -1 ){
        return false
    }
    if(phone_number.indexOf('++') != -1 ){
        return false
    }
    return phone_number.length > 8 && 
    phone_number.match(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/);
})


/// dom load success
$(document).ready(function() {

    var DF_FORM_VALIDATE = $(".js-validate-form")
    if(DF_FORM_VALIDATE.length){
        validateForm(DF_FORM_VALIDATE);
    }
});