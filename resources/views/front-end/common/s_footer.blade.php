
<script type="text/javascript"
        src="{!! url('public/home/') !!}/Scripts/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/jquery.autocomplete.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/jquery-ui-1.8.6.core.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/jquery.noconflict.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/modernizr.2.7.1.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/jquery.placeholder.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/jquery-ui.1.10.4.min.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/lazyload.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/bootstrap.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForest/theme-scripts.js"></script>
<script type="text/javascript" src="
        {!! url('public/home/') !!}/Scripts/themeForestComponents/flexslider/jquery.flexslider-min.js">
</script>
<script type="text/javascript">
    var header_height = $('#header').height();
    $(document).ready(function() {
        var url = window.location.href;
        $('.menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
        jQuery("img.lazy").lazy();
    })
    $(window).scroll(function() {
        var offset = $(window).scrollTop();
        if (offset >= header_height) {
            $('.banner-lr').css('top', '0px');
        } else {
            $('.banner-lr').css('top', '146px');
        }
    });
</script>
<script src="{!! url('public/home/') !!}/Scripts/SearchForm.js" type="text/javascript"></script>
<script type="text/javascript" src="{!! url('public/home/') !!}/Scripts/HomePageSearch.js"></script>
<script type="text/javascript" src="{!! url('public/home/') !!}/Scripts/themeForest/jquery.stellar.min.js"></script>
<script type="text/javascript" src="{!! url('public/home/') !!}/Scripts/themeForest/waypoints.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.find-cheap-fare').click(function() {
            var departureCode = $(this).find('.depatureCityCode').html();
            var arrivalCityCode = $(this).find('.arrivalCityCode').html();
            var startDate = $(this).find('.depatureDate').html();
            $.ajax({
                type: "Post",
                contentType: "application/json;charset=utf-8",
                url: "/Default.aspx/SearchCheapFare",
                data: "{'startDate':'" + startDate + "','depatureCity':'" + departureCode + "','arrivalCity':'" + arrivalCityCode + "'}",
                dataType: "json",
                success: function(data) {
                    $(location).attr('href', data.d);
                }
            }).done(function(data) {
                location.href = data.d;
            });
            return false;
        });
    });
</script>






