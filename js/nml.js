$(function() {
    $(".sortbyOptions").change(function() {
        $('.headerLi').remove();
        $('ul#peopleList1>li').removeClass("floatme");
        var whichVal = $(this).val();
        if (whichVal == 'name') {
            $('ul#peopleList1>li').addClass("floatme");
            $('ul#peopleList1>li').tsort({
                data: 'rank'
            });
        } else {
            var dept, oldDept;
            $('ul#peopleList1>li').tsort({
                data: 'department'
            }).each(function(i, el) {
                var $El = $(el);
                dept = $El.data('department');
                if (oldDept !== dept) {
                    $El.before("<li class='headerLi'>" + dept + "</li>");
                }
                oldDept = dept;
            });
        }
    });
});