/*-----------------------------------------------------------------------------------------------*/
/*function for all */
function vietdecode(str)
{
    var n = str.length;
    for(i=1;i<=n;i++){
        str = str.replace("."," .");
        str = str.replace("?"," ?");
        str = str.replace("ấ", "a");
        str = str.replace("â", "a");
        str = str.replace("ă", "a");
        str = str.replace("ầ", "a");
        str = str.replace("ẩ", "a");
        str = str.replace("ẫ", "a");
        str = str.replace("ậ", "a");
        str = str.replace("Ấ", "A");
        str = str.replace("Ầ", "A");
        str = str.replace("Ẩ", "A");
        str = str.replace("Ẫ", "A");
        str = str.replace("Ậ", "A");
        str = str.replace("ắ", "a");
        str = str.replace("ằ", "a");
        str = str.replace("ẳ", "a");
        str = str.replace("ẵ", "a");
        str = str.replace("ặ", "a");
        str = str.replace("Ắ", "A");
        str = str.replace("Ằ", "A");
        str = str.replace("Ẳ", "A");
        str = str.replace("Ẵ", "A");
        str = str.replace("Ặ", "A");
        str = str.replace("á", "a");
        str = str.replace("à", "a");
        str = str.replace("ả", "a");
        str = str.replace("ã", "a");
        str = str.replace("ạ", "a");
        str = str.replace("â", "a");
        str = str.replace("ă", "a");
        str = str.replace("Á", "A");
        str = str.replace("À", "A");
        str = str.replace("Ả", "A");
        str = str.replace("Ã", "A");
        str = str.replace("Ạ", "A");
        str = str.replace("Â", "A");
        str = str.replace("Ă", "A");
        str = str.replace("ế", "e");
        str = str.replace("ề", "e");
        str = str.replace("ể", "e");
        str = str.replace("ễ", "e");
        str = str.replace("ệ", "e");
        str = str.replace("Ế", "E");
        str = str.replace("Ề", "E");
        str = str.replace("Ể", "E");
        str = str.replace("Ễ", "E");
        str = str.replace("Ệ", "E");
        str = str.replace("é", "e");
        str = str.replace("è", "e");
        str = str.replace("ẻ", "e");
        str = str.replace("ẽ", "e");
        str = str.replace("ẹ", "e");
        str = str.replace("ê", "e");
        str = str.replace("É", "E");
        str = str.replace("È", "E");
        str = str.replace("Ẻ", "E");
        str = str.replace("Ẽ", "E");
        str = str.replace("Ẹ", "E");
        str = str.replace("Ê", "E");
        str = str.replace("í", "i");
        str = str.replace("ì", "i");
        str = str.replace("ỉ", "i");
        str = str.replace("ĩ", "i");
        str = str.replace("ị", "i");
        str = str.replace("Í", "I");
        str = str.replace("Ì", "I");
        str = str.replace("Ỉ", "I");
        str = str.replace("Ĩ", "I");
        str = str.replace("Ị", "I");
        str = str.replace("ố", "o");
        str = str.replace("ồ", "o");
        str = str.replace("ổ", "o");
        str = str.replace("ỗ", "o");
        str = str.replace("ộ", "o");
        str = str.replace("Ố", "O");
        str = str.replace("Ồ", "O");
        str = str.replace("Ổ", "O");
        str = str.replace("Ô", "O");
        str = str.replace("Ộ", "O");
        str = str.replace("ớ", "o");
        str = str.replace("ờ", "o");
        str = str.replace("ở", "o");
        str = str.replace("ỡ", "o");
        str = str.replace("ợ", "o");
        str = str.replace("Ớ", "O");
        str = str.replace("Ờ", "O");
        str = str.replace("Ở", "O");
        str = str.replace("Ỡ", "O");
        str = str.replace("Ợ", "O");
        str = str.replace("ứ", "u");
        str = str.replace("ừ", "u");
        str = str.replace("ử", "u");
        str = str.replace("ữ", "u");
        str = str.replace("ự", "u");
        str = str.replace("Ứ", "U");
        str = str.replace("Ừ", "U");
        str = str.replace("Ử", "U");
        str = str.replace("Ữ", "U");
        str = str.replace("Ự", "U");
        str = str.replace("ý", "y");
        str = str.replace("ỳ", "y");
        str = str.replace("ỷ", "y");
        str = str.replace("ỹ", "y");
        str = str.replace("ỵ", "y");
        str = str.replace("Ý", "Y");
        str = str.replace("Ỳ", "Y");
        str = str.replace("Ỷ", "Y");
        str = str.replace("Ỹ", "Y");
        str = str.replace("Ỵ", "Y");
        str = str.replace("Đ", "D");
        str = str.replace("Đ", "D");
        str = str.replace("đ", "d");
        str = str.replace("ó", "o");
        str = str.replace("ò", "o");
        str = str.replace("ỏ", "o");
        str = str.replace("õ", "o");
        str = str.replace("ọ", "o");
        str = str.replace("ô", "o");
        str = str.replace("ơ", "o");
        str = str.replace("Ó", "O");
        str = str.replace("Ò", "O");
        str = str.replace("Ỏ", "O");
        str = str.replace("Õ", "O");
        str = str.replace("Ọ", "O");
        str = str.replace("Ô", "O");
        str = str.replace("Ơ", "O");
        str = str.replace("ú", "u");
        str = str.replace("ù", "u");
        str = str.replace("ủ", "u");
        str = str.replace("ũ", "u");
        str = str.replace("ụ", "u");
        str = str.replace("ư", "u");
        str = str.replace("Ú", "U");
        str = str.replace("Ù", "U");
        str = str.replace("Ủ", "U");
        str = str.replace("Ũ", "U");
        str = str.replace("Ụ", "U");
        str = str.replace("Ư", "U");
        str = str.replace("--", "-");
        str = str.replace("---", "-");
        str = str.replace(' ', "-");
        str = str.replace('--', "-");
        str = str.replace('---', "-");
        str = str.replace(".", "-");
        str = str.replace(",", "-");
        str = str.replace("!", "-");
        str = str.replace("@", "-");
        str = str.replace("#", "-");
        str = str.replace("#", "-");
        str = str.replace("$", "-");
        str = str.replace("%", "-");
        str = str.replace("^", "-");
        str = str.replace("&", "-");
        str = str.replace("*", "-");
        str = str.replace("(", "-");
        str = str.replace(")", "-");
        str = str.replace("+", "-");
        str = str.replace("=", "-");
        str = str.replace("/", "-");
        str = str.replace("\\", "-");
        str = str.replace("|", "-");
        str = str.replace("?", "-");
        str = str.replace("<", "-");
        str = str.replace(">", "-");
        str = str.replace("'", "-");
        str = str.replace('"', "-");
        str = str.replace(':', "-");
        str = str.replace(';', "-");
    }
    return str;
}
/*--------*/
$('input[name="name"]').keyup(function(){
    var c_char  = $(this).val();
    var char    = vietdecode(c_char);
    var purl    = src+"/"+text_pdt+"-"+id+'/'+char+".html";
    $('input[name="alias"]').attr('value',purl);
});

/*--------*/
/*delItem*/
$('.delItem').click(function () {
    var link    = $(this).attr('data-link');
    var id      = $(this).attr('data-id');
    var msg     = $(this).attr('data-msg');
    var _token  = $('input[name="_token"]').val();
    if(confirm(msg)){
        $.ajax({
            url: link,
            type:'POST',
            data:{'_token':_token,'id':id},
            success: function(data){
                if(data == "Ok"){
                    $('#'+id).slideUp(500,function () {
                        $(this).remove();
                    });
                }else{
                    alert('Xóa không thành công! Vui lòng liên hệ cho admin.');
                }
            }
        });
    }

});
/*--------*/
    var selector = $(document).find('.switchery');

    selector.click(function () {
        var val = 0;
        var style = $(this).children('small').attr('style');
        if (style == "left: 0px; transition: background-color 0.4s, left 0.2s;") {
            val = 0;
        } else {
            val = 1;
        }
        var input = $(this).parent().find('input.updateItem');
        var id = input.attr('data-id');
        var type = input.attr('data-type');
        var src = input.attr('data-src');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: src,
            type: 'POST',
            data: {'_token': _token, 'id': id, 'type': type, 'val': val},
            success: function (data) {
                console.log(data);
            }
        });
        /*console.log(id +'--'+type+'--'+src);*/
    });

/*-------*/
/*function change order */
    $('.upOrder').change(function () {
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var val  = $(this).val();
        var src = $(this).attr('data-src');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: src,
            type: 'POST',
            data: {'_token': _token, 'id': id, 'type': type, 'val': val},
            success: function (data) {
                console.log(data);
                if(data != 'Ok'){
                    alert('Số bạn nhập không hợp lệ');
                }
            }
        });
        /*console.log(id +'--'+type+'--'+src);*/
    });

/*end function for all */
/*-----------------------------------------------------------------------------------------------*/
/*function for module product */
/*function calculator price*/
$(document).ready(function() {
    $('input[name="price_old"]').val();
    $('input[name="percent"]').val();
    $('input[name="price_old"]').keyup(function () {
        var price_old = $(this).val();
        var percent = $('input[name="percent"]').val();
        var price_new = ((100 - percent) / 100) * price_old;
        $('input[name="price_new"]').attr('value', price_new);
    });
    $('input[name="percent"]').keyup(function () {
        var percent = $(this).val();
        var price_old = $('input[name="price_old"]').val();
        var price_new = ((100 - percent) / 100) * price_old;
        $('input[name="price_new"]').attr('value', price_new);
    });
});
/*------Function show image edit product------*/
$(document).ready(function () {
    var img = $('input[name="avatar"]').attr('value');
});
/*------end Function show image edit product------*/
/*-----------------------------------------------------------------------------------------------*/
/*function for module category */
$(document).ready(function(){
    $('#contentN').hide();

    $(this).find('.iCheck-helper').click(function(){
        var dk = $(this).parent().find('input').attr('value');
        if(dk == 1){
            $('#contentN').slideDown(500);
            $('#cate_id').html(cate_page);
        }else
        if(dk == 2){
            $('#cate_id').html(cate_post);
            $('#contentN').slideUp(500);
        }else{
            $('#cate_id').html(cate_product);
            $('#contentN').slideUp(500);
        }
    });
    $('div.my-alert').delay(10000).slideUp();

});
/*end function for module category */
/*-----------------------------------------------------------------------------------------------*/

$(document).ready(function(){
    var content = $(this).find('textarea[name="content"]');
    if(content.length > 0){
        ckeditor('content');
    }
});