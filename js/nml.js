$(function() {
 
    $("#sorter1").click(function() {
     	$('.headerLi').remove();
        $('ul#peopleList1>li').removeClass("floatme");
        if ($(this).data('sortcriteria') === 'name') {
        	$(this).data('sortcriteria', 'department');
        	$(this).html("View by doctoral program");
            $('ul#peopleList1>li').addClass("floatme");
            $('ul#peopleList1>li').tsort({
                data: 'rank'
            });
        } else {
        	$(this).data('sortcriteria', 'name');
        	$(this).html("View by name");
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
	$("#sorter2").click(function() {    	
        $('.headerLi2').remove();
        $('ul#peopleList2>li').removeClass("floatme");
        if ($(this).data('sortcriteria') === 'name') {	
        	$(this).data('sortcriteria', 'department');
        	$(this).html("View by doctoral program");
            $('ul#peopleList2>li').addClass("floatme");
            $('ul#peopleList2>li').tsort({
                data: 'rank'
            });
        } else {
        	$(this).data('sortcriteria', 'name');
        	$(this).html("View by name");
            var dept, oldDept;
            $('ul#peopleList2>li').tsort({
                data: 'department'
            }).each(function(i, el) {
                var $El = $(el);
                dept = $El.data('department');
                if (oldDept !== dept) {
                    $El.before("<li class='headerLi2'>" + dept + "</li>");
                }
                oldDept = dept;
            });
        }
    });
});