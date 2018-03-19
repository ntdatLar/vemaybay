$(document).ready(function () {
    // Set auto complete
    $(".txtFlightCity").autocomplete("/Elines/Search/AutoSuggestV2.aspx",
        {
            max: 50,
            highlight: false,
            matchSubset: false,
            scrollHeight: 260,
            width: 261,
            formatItem: function (item, index, total, value) {
                return value.split("{")[0];
            },
            formatResult: function (item, value) {
                return value.split("{")[1];
            }
        });
    $(".txtFlightCity").result(function () {
        var father = $(this).closest('.sl-city');
        var value = $(this).val();
        father.find('.city').attr('value', value);
        $(this).val(' ');
        father.removeClass('active');
        father.find('.error').text(' ');
    });

    // Khi chon departure date, tu dong gan return date = departure data + 3
    $(".depDate").change(function () {
        var d = $(".depDate").datepicker("getDate");
        $(".retDate").datepicker("option", "minDate", $(".depDate").datepicker("getDate"));
        d.setDate(d.getDate() + 3);
        $(".retDate").datepicker("setDate", d);
    });
 
  

    // Ẩn return date nếu one way đang được chọn
    if ($(".one-wave input").attr("checked")) $(".return-date,.xs-return-date").hide();

    // Khi chọn one way, hay round trip, tự động ẩn hiện return date
    $(".one-wave input").click(function () {
        $(".return-date,.xs-return-date").hide();
    });
    $(".round-trip input").click(function () {
        $(".return-date,.xs-return-date").show();
    });
});

function checkValidClientData() { 
    
}

