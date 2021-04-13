function validateForm(formJquery){
    formJquery.validate({
        ignore: ".ignore", // validate all hidden select elements
        rules: {
            first_name: {
                required : true,
                maxlength: 150
            },
            last_name: {
                required : true,
                maxlength: 150
            },
            email: {
                required : true,
                email: true
            },
            mobile: {
                phone_number: true
            },
            fax: {
                maxlength: 150
            },
            job_name: {
                maxlength: 150
            },
            company: {
                maxlength: 150
            },
            message: {
                maxlength: 1500
            },
            agree: {
                required : true
            }
        },
        messages: {
            first_name: {
                required : "名前を入力してください",
                maxlength: "first name nhỏ hơn 150 "
            },
            last_name: {
                required : "nhập last_name",
                maxlength: "last_name nhỏ hơn 150 "
            },
            email: {
                required : "メールを入力してください",
                email: "メールが違います"
            },
            mobile: {
                phone_number: "電話番号が違います"
            },
            fax: {
                maxlength: "nhỏ hơn 150"
            },
            job_name: {
                maxlength: "nhỏ hơn 150"
            },
            company: {
                maxlength: "nhỏ hơn 150"
            },
            message: {
                maxlength: "nhỏ hơn 1500"
            },
            agree: {
                required : "こちらに入力してください"
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