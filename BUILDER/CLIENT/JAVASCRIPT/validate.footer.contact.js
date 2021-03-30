function validateFormFooter(formJquery){
    formJquery.validate({
        ignore: ".ignore", // validate all hidden select elements
        rules: {
            email: {
                required : true,
                email: 150
            },
            mobile: {
                required : true,
                phone_number_foooter: true
            },
            message: {
                required : true,
            }
        },
        messages: {
            email: {
                required : "bắt buộc nhập email",
                email: "email đã nhập không đúng định dạng",
            },
            mobile: {
                required : "bắt buộc nhập số điện thoại",
                phone_number_foooter: "số điện thoại đã nhập chưa đúng định dạng",
            },
            message: {
                required : "bắt buộc nhập tin nhắn bạn muôn nhắn tới quản trị viên",
            }
        }
    });
}


jQuery.validator.addMethod('phone_number_foooter', function(phone_number, element) {

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

    var DF_FORM_VALIDATE_FOOTER = $(".js-validate-form-footer")
    if(DF_FORM_VALIDATE_FOOTER.length){
        validateFormFooter(DF_FORM_VALIDATE_FOOTER);
    }
});