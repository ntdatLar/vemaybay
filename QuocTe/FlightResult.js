function querySt(paramName) {
    var value = ''; paramName = paramName.toLowerCase(); hu = window.location.search.substring(1); hu = hu.toLowerCase(); gy = hu.split("&"); for (i = 0; i < gy.length; i++) { ft = gy[i].split("="); if (ft[0] == paramName) { value = ft[1]; } }
    return value;
}
function SelectFlight(blockOutBound, blockInBound, rec, message, btnSelectId) {
    var elem = document.getElementById(btnSelectId); var outBoundRef; var inBoundRef; var outBoundSelectedError; var inBoundSelectedError; for (var i = 0; i < document.getElementsByName(blockOutBound).length; i++) { if (document.getElementsByName(blockOutBound)[i].checked) { outBoundRef = document.getElementsByName(blockOutBound)[i].value; } }
    if (outBoundRef === undefined) {
        outBoundRef = document.getElementsByName(blockOutBound)[0].value; var attrSelected = document.getElementsByName(blockOutBound)[0].getAttribute("attrSelected"); if (attrSelected == null)
            outBoundSelectedError = 0; else { outBoundSelectedError = 1; }
    }
    for (var i = 0; i < document.getElementsByName(blockInBound).length; i++) { if (document.getElementsByName(blockInBound)[i].checked) { inBoundRef = document.getElementsByName(blockInBound)[i].value; } }
    if (document.getElementsByName(blockInBound).length > 0 && inBoundRef === undefined) {
        inBoundRef = document.getElementsByName(blockInBound)[0].value; var attrSelected = document.getElementsByName(blockInBound)[0].getAttribute("attrSelected"); if (attrSelected == null)
            inBoundSelectedError = 0; else { inBoundSelectedError = 1; }
    }
    var lang = querySt('lang'); var url = '/Elines/ThongTinChuyenBay/ThongTinChuyenBay.aspx?SessionId=' + querySt("SessionId"); if (inBoundRef === undefined) {
        if (outBoundSelectedError == 1) { elem.setAttribute("value", "This Flight may be not avaiable"); return false; }
        url = url + "&outbound=" + outBoundRef
    }
    else {
        if (outBoundSelectedError == 1 && inBoundSelectedError == 1) { elem.setAttribute("value", "This Flight may be not avaiable"); return false; }
        url = url + "&outbound=" + outBoundRef + "&inbound=" + inBoundRef;
    }
    elem.setAttribute("value", message); if (lang != undefined)
        url = url + "&lang=" + lang; window.location = url + "&rec=" + rec;
}
function SelectFlightV2(blockOutBound, blockInBound, rec, message, btnSelectId) {
    var elem = document.getElementById(btnSelectId); var outBoundRef; var inBoundRef; var outBoundSelectedError; var inBoundSelectedError; for (var i = 0; i < document.getElementsByName(blockOutBound).length; i++) { if (document.getElementsByName(blockOutBound)[i].checked) { outBoundRef = document.getElementsByName(blockOutBound)[i].value; } }
    if (outBoundRef === undefined) {
        outBoundRef = document.getElementsByName(blockOutBound)[0].value; var attrSelected = document.getElementsByName(blockOutBound)[0].getAttribute("attrSelected"); if (attrSelected == null)
            outBoundSelectedError = 0; else { outBoundSelectedError = 1; }
    }
    for (var i = 0; i < document.getElementsByName(blockInBound).length; i++) { if (document.getElementsByName(blockInBound)[i].checked) { inBoundRef = document.getElementsByName(blockInBound)[i].value; } }
    if (document.getElementsByName(blockInBound).length > 0 && inBoundRef === undefined) {
        inBoundRef = document.getElementsByName(blockInBound)[0].value; var attrSelected = document.getElementsByName(blockInBound)[0].getAttribute("attrSelected"); if (attrSelected == null)
            inBoundSelectedError = 0; else { inBoundSelectedError = 1; }
    }
    var lang = querySt('lang'); var url = '/Flight/ThongTinChuyenBay/ThongTinChuyenBay.aspx?SessionId=' + querySt("SessionId"); if (inBoundRef === undefined) {
        if (outBoundSelectedError == 1) { elem.setAttribute("value", "This Flight may be not avaiable"); return false; }
        url = url + "&outbound=" + outBoundRef
    }
    else {
        if (outBoundSelectedError == 1 && inBoundSelectedError == 1) { elem.setAttribute("value", "This Flight may be not avaiable"); return false; }
        url = url + "&outbound=" + outBoundRef + "&inbound=" + inBoundRef;
    }
    elem.setAttribute("value", message); if (lang != undefined)
        url = url + "&lang=" + lang; window.location = url + "&rec=" + rec;
}
function GetPriceBreakDownLink(blockOutBound, blockInBound, rec) {
    var outBoundRef; var inBoundRef; outBoundRef = document.getElementsByName(blockOutBound)[0].value; if (document.getElementsByName(blockInBound).length > 0)
        inBoundRef = document.getElementsByName(blockInBound)[0].value; var lang = querySt('lang'); var url = '?SessionId=' + querySt("SessionId"); if (inBoundRef === undefined)
            url = url + "&outbound=" + outBoundRef
        else
            url = url + "&outbound=" + outBoundRef + "&inbound=" + inBoundRef; if (lang != undefined)
                url = url + "&lang=" + lang; url = url + "&rec=" + rec; return url;
}
$(document).ready(function () { var hasError = $('.error2'); if (hasError.length != 0) { $('html,body').animate({ scrollTop: hasError.offset().top - 250 }, 'fast'); } });