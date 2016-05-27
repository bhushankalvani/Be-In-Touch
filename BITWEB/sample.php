<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		.navbar-form{
			border:1px solid black;
			padding:1%;
		}
		.contentDiv{
			border:1px solid black;
			height: 480px;
			overflow-y:scroll;
		}
		#outer{
	    width:500px;
	    height:300px;
	    padding-top:50px;
		}
		#demo-container{
		   width:200%;
		   height:150%;
		    overflow:auto;
		}

		.dock{
		    position:fixed;
		    background:#FFFFFF;
		}

		.prev-highlight {
		    -moz-border-radius: 5px;
		    /* FF1+ */
		    -webkit-border-radius: 5px;
		    /* Saf3-4 */
		    border-radius: 5px;
		    /* Opera 10.5, IE 9, Saf5, Chrome */
		    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
		    /* FF3.5+ */
		    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
		    /* Saf3.0+, Chrome */
		    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
		    /* Opera 10.5+, IE 9.0 */
		}

		.prev-highlight{
		    background-color: #fff34d;
		     padding:1px 4px;
		      margin:0 -4px;
		}



		 .prev-highlight-selected {
		background-color: #FF8000;
		}

		</style>
		<script type="text/javascript" src="js/jquery.js"></script>
	
<script type="text/javascript" src="js/highlight.js"></script>
<script type="text/javascript">
		$(window).load(function(){
$(function () {
    $('SearchBar').bind('keyup change', function (ev) {
        // pull in the new value
        var searchTerm = $(this).val();
        //searchTerm=searchTerm.removeStopWords();

        // remove any old highlighted terms
        $('contentDiv').removeHighlight('div.prev-highlight');

        // disable highlighting if empty
        if (searchTerm) {
            var terms = searchTerm.split(/\s+/);
            $.each(terms, function (_, term) {
                // highlight the new term
               // term = term.trim();
                if (term != "") $('contentDiv').highlight(term, 'prev-highlight');
            });

        }
    }).triggerHandler('change');

});
 /**  scroll to element function **/

    function scrollToElement(selector, time, verticalOffset) {

         selectedKeyword = $('.prev-highlight-selected');
     if (selectedKeyword) selectedKeyword.removeClass('prev-highlight-selected');
      $(selector).addClass('prev-highlight-selected');


        time = typeof (time) != 'undefined' ? time : 500;
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;

        element = $(selector);
        offset = element.offset();
      //  alert(offset.top);
        offsetTop = offset.top + verticalOffset + $('contentDiv').scrollTop();
        $('contentDiv').animate({
            scrollTop: offsetTop
        }, time);

    }

    /**document ready**/
    $(document).ready(function () {

        count = 0;


        /* scroll to 150px before .highlight with animation time of 400ms */
        $('next1').click(function (e) {        
        count++;
        var max_length = $('.prev-highlight').length;
        var child =  (count-1)% max_length ;

            if (count == max_length) {
                count=0;
            } 
                        e.preventDefault();
            scrollToElement('.prev-highlight:eq(' + child + ')', 400, -150);
        });

        $('prev1').click(function (e) {    
        var max_length = $('.prev-highlight').length;       
        count--;
        if (count <=0)
        {                
        count=max_length;                        
        }

   var  child =  (count-1)% max_length ;

            e.preventDefault();
            scrollToElement('.prev-highlight:eq(' + child + ')', 400, -150);
        });
    });
});		


	</script>
	</head>
	<body><form>
	<div class="container">
		<div class="navbar-form" role="search">&nbsp;Search&nbsp;&nbsp;
			<div class="input-group">
				<input class="SearchBar form-control" type="text" role="form-control" placeholder="Search" id="SearchBar" />
				<button class="btn btn-primary prev1" type="button" id="prev1">Prev</button> 
				<button class="btn btn-primary next1" type="button" id="next1">Next</button>
			</div>
		</div>
	
		<div class="col-md-10 contentDiv" id="contentDiv">
			<script>
				for (var i = 1; i<= 40; i++) {
					document.write("qwe<br>");
				}
			</script>
		</div>




	</div>



</form>






	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		
	</body>
</html>