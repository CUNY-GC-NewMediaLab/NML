$(function() {
 	$("#menu-primary-nav").tinyNav();
 	
 	$('.projects-landing-page .qt li>a').each(function() { 
    	$(this).next('div').click(function(){
     		window.location=$(this).find("a").attr("href"); 
     		return false;
		});
    	$(this).qtip({
        	content: { text: $(this).next('div')},
    		style: {
        		classes: 'qtip-light', tip: false
        		},
        	
        	hide: {
             fixed: true,
             delay: 300
         	},
        position: {
        		my: 'center right',  
       			at: 'bottom right',
       			adjust: {y: -32 },
        		target: $(this).parent('li'), 
        		viewport: $(this).parents('.qt'),
        		
        		//viewport: $(window),
        		adjust: {
            		method: 'shift'
        		}
    		},
    		 /*	position: {
        		my: 'top right',  
       			at: 'top right',
        		target: $(this).parents('.qt'), 
        		viewport: $(window),
        		adjust: {
            		method: 'shift'
        		}
    		},*/
    		show: {
        		solo: true
    		}
    	});
	});


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