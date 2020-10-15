
/* JS Functions for Popups*/


/* Contact Popup */
function div_show() {
	document.getElementById('contact').style.display = "block";
}

function div_hide(){
	document.getElementById('contact').style.display = "none";
}


/* Login Popup */

function show() {
	document.getElementById('login').style.display = "block";
}
	
function hide(){
	document.getElementById('login').style.display = "none";
}


/* Signup Popup */

function popup() {
	document.getElementById('signup').style.display = "block";
}

function popout(){
	document.getElementById('signup').style.display = "none";
}

/* Works Page filters */

/*function filterSelection(elementToShow){
    if(elementToShow != "All"){ 
	    // Get an array of elements with the class name, filter.
	    var x = document.getElementsByClassName("filterDiv");
	    // For each of them
	    for(var i = 0; i < x.length; i++){
	    // Make them invisible
	    x[i].style.display = "none";
	    }
	    // Get and then make the one you want, visible
	    var y = document.getElementsById(elementToShow).style.display = "block";
    }
    else{ // If the parameter provided is all, we want to display everything
    // Get an array of elements with the class name, filter.
    	var x = document.getElementsByClassName("filterDiv");
    // For each of them
	    for(var i = 0; i < x.length; i++){
		    //Make them visible
		    x[i].style.display = "block";
    	}
    }
} */
/*
$(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*'
        
    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
            
         });
         return false;
    }); 
}); */

$(document).ready(function(){
    // clicking button with class "category-button"
    $(".category-button").click(function(){
        // get the data-filter value of the button
        var filterValue = $(this).attr('data-filter');
        
        // show all items
        if(filterValue == "all")
        {
            $(".all").show("slow");
        }
        else
        {   
            // hide all items
            $(".all").not('.'+filterValue).hide("slow");
            // and then, show only items with selected data-filter value
            $(".all").filter('.'+filterValue).show("slow");
        }
    });

});