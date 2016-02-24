<?php
?>
<script>
//	Contents
	//	Correct links on log in page
	//	Scroll
	//	Stick
	//	Meat-o-meter
	//	Avatar Meat-o-meters
	//	Groups Bar Chart
	//	Remember team
	//	Signup field replacement
	//	Profile pledge number phrase
	//	Mission image hover
	//	Remove profile duplicates

jQuery(document).ready(function( $ ) {
		
		//	Correct links on log in page
		$( 'a[href="http://parttimecarnivore.org/wp-login.php?action=register"]').html('Sign up');
		$( 'a[href="http://parttimecarnivore.org/wp-login.php?action=register"]').prop('href', '#register');
		$( 'a[href="http://parttimecarnivore.org/wp-login.php?action=lostpassword"]').html('Get a new password');
		$( '#groups-directory-form a[href="http://parttimecarnivore.org/teams/create/"]').prop('href', 'http://parttimecarnivore.org/teams/start-a-team/');
		$( 'a[href="http://www.parttimecarnivore.org/wp-login.php?action=register"]').html('Sign up');
		$( 'a[href="http://www.parttimecarnivore.org/wp-login.php?action=register"]').prop('href', '#register');
		$( 'a[href="http://www.parttimecarnivore.org/wp-login.php?action=lostpassword"]').html('Get a new password');
		$( ".gtags-add:contains('nation')" ).css( "display", "none" );
		$( 'a[href="http://www.parttimecarnivore.org/teams/tag/nation"]').css('display','none');
		$( '#groups-directory-form a[href="http://www.parttimecarnivore.org/teams/create/"]').prop('href', 'http://www.parttimecarnivore.org/teams/start-a-team/');
		$( 'a[href="http://localhost/ptcDev/wp-login.php?action=register"]').html('Sign up');
		$( 'a[href="http://localhost/ptcDev/wp-login.php?action=register"]').prop('href', '#register');
		$( 'a[href="http://localhost/ptcDev/wp-login.php?action=lostpassword"]').html('Get a new password');
		$( '#groups-directory-form a[href="http://localhost/ptcDev/teams/create/"]').prop('href', 'http://localhost/ptcDev/teams/start-a-team/');
		
		
		//Scorll
		var $root = $('html, body');
		$('.logged-in a').click(function() {
		    var href = $.attr(this, 'href');
		    $root.animate({
		        scrollTop: $(href).offset().top - 80
		    }, 800, function () {
		        window.location.hash = href;
		    });
	    return false;
		});
		
		var $root = $('html, body');
		$('.visitor a').click(function() {
		    var href = $.attr(this, 'href');
		    $root.animate({
		        scrollTop: $(href).offset().top - 120
		    }, 800, function () {
		        window.location.hash = href;
		    });
	    return false;
		});

		
		//Stick
		if (!$('.page-id-247').length/* && !$('.woocommerce-page').length*/) {
			if ($('.visitor').length) {
				var stickyNavTop = $('.getstuck').offset().top + $(".getstuck").height() -84;  
				var shifty = $('.getstuck').height() + 16;
				
		  
				var stickyNav = function(){  
					var scrollTop = $(window).scrollTop();  
			   
					if (scrollTop > stickyNavTop) {   
						$('.getstuck').removeClass('unstuck'); 
						$('.mainwrap').css('margin-top',shifty); 
					} else {  
						$('.getstuck').addClass('unstuck');
						$('.mainwrap').removeAttr("style");
					}  
				};  
		  
				stickyNav();  
		  
				$(window).scroll(function() {  
					stickyNav();  
				});  
			}
		}
		
		
		//Meat-o-meter
		//meatometer hovers
		$( '#calltoaction .pledge' ).hover(function() {
			$( '#calltoaction .redClick' ).addClass('notRed');
			$( '#calltoaction .currentClick' ).addClass('notCurrent');
		}, function() {
			$( '#calltoaction .redClick' ).removeClass('notRed');
			$( '#calltoaction .currentClick' ).removeClass('notCurrent');
		});
		$('#six').hover(function() {
			$( '#calltoaction .six' ).addClass('red');
		}, function() {
			$( '#calltoaction .six' ).removeClass('red');
		});
		$('#five').hover(function() {
			$( '#calltoaction .five' ).addClass('red');
		}, function() {
			$( '#calltoaction .five' ).removeClass('red');
		});
		$('#four').hover(function() {
			$( '#calltoaction .four' ).addClass('red');
		}, function() {
			$( '#calltoaction .four' ).removeClass('red');
		});
		$('#three').hover(function() {
			$( '#calltoaction .three' ).addClass('red');
		}, function() {
			$( '#calltoaction .three' ).removeClass('red');
		});
		$('#two').hover(function() {
			$( '#calltoaction .two' ).addClass('red');
		}, function() {
			$( '#calltoaction .two' ).removeClass('red');
		});
		$('#one').hover(function() {
			$( '#calltoaction .one' ).addClass('red');
		}, function() {
			$( '#calltoaction .one' ).removeClass('red');
		});
		//meatometer clicks
		var land = 29;
		var water = 1611;
		var carbon = 8;
		$( '#calltoaction .pledge' ).click(function() {
			$( '#gform_1 #input_1_6' ).addClass('nodisplay');
			$( '#calltoaction .redClick' ).removeClass('redClick');
			$( '#calltoaction .currentClick' ).removeClass('currentClick');
			$( '#calltoaction .notCurrent' ).removeClass('notCurrent');
			$( '#calltoaction .notRed' ).removeClass('notRed');
			$( this ).find('div div').addClass('currentClick');
		});
		$('#six').click(function() {
			$( '#calltoaction .six' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('6');
			$( '#meatyDays' ).html('Up to 6 meaty days each week<br><span class="saving">saving '+(land*1)+'m<sup>2</sup> land, '+(carbon*1)+'kg CO<sub>2</sub> and '+(water*1)+' litres water every week!</span>');
//			weeklySavings( 1 );
		});
		$('#five').click(function() {
			$( '#calltoaction .five' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('5');
			$( '#meatyDays' ).html('Up to 5 meaty days each week<br><span class="saving">saving '+(land*2)+'m<sup>2</sup> land, '+(carbon*2)+'kg CO<sub>2</sub> and '+(water*2)+' litres water every week!</span>');
//			weeklySavings( 2 );
		});
		$('#four').click(function() {
			$( '#calltoaction .four' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('4');
			$( '#meatyDays' ).html('Up to 4 meaty days each week<br><span class="saving">saving '+(land*3)+'m<sup>2</sup> land, '+(carbon*3)+'kg CO<sub>2</sub> and '+(water*3)+' litres water every week!</span>');
//			weeklySavings( 3 );
		});
		$('#three').click(function() {
			$( '#calltoaction .three' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('3');
			$( '#meatyDays' ).html('Up to 3 meaty days each week<br><span class="saving">saving '+(land*4)+'m<sup>2</sup> land, '+(carbon*4)+'kg CO<sub>2</sub> and '+(water*4)+' litres water every week!</span>');
//			weeklySavings( 4 );
		});
		$('#two').click(function() {
			$( '#calltoaction .two' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('2');
			$( '#meatyDays' ).html('Up to 2 meaty days each week<br><span class="saving">saving '+(land*5)+'m<sup>2</sup> land, '+(carbon*5)+'kg CO<sub>2</sub> and '+(water*5)+' litres water every week!</span>');
//			weeklySavings( 5 );
		});
		$('#one').click(function() {
			$( '#calltoaction .one' ).addClass('redClick');
			$( '#gform_1 #input_1_6' ).val('1');
			$( '#meatyDays' ).html('Up to 1 meaty day each week<br><span class="saving">saving '+(land*6)+'m<sup>2</sup> land, '+(carbon*6)+'kg CO<sub>2</sub> and '+(water*6)+' litres water every week!</span>');
//			weeklySavings( 6 );
		});
		$('#zero').click(function() {
			$( '#calltoaction .notRed' ).removeClass('notRed');
			$( '#gform_1 #input_1_6' ).val('No');
			$( '#meatyDays' ).html('No meaty days at all!<br><span class="saving">saving '+(land*7)+'m<sup>2</sup> land, '+(carbon*7)+'kg CO<sub>2</sub> and '+(water*7)+' litres water every week!</span>');
//			weeklySavings( 7 );
		});
		
		
		// Avatar Meat-o-meters
		$( '#members-list li' ).each(function() {
			var mymeatydays = $( this ).find('.mypledge').html();
			$( this ).find('a').addClass('bg' + mymeatydays);
		});
		$(window).scroll(function() {
			$( '#members-list li' ).each(function() {
				var mymeatydays = $( this ).find('.mypledge').html();
				$( this ).find('a').addClass('bg' + mymeatydays);
			});
		});
		$( '#member-list li' ).each(function() {
			var mymeatydays = $( this ).find('.mypledge').html();
			$( this ).find('a').addClass('bg' + mymeatydays);
		});
		$( '#item-header' ).each(function() {
			var mymeatydays = $( this ).find('.mypledge').html();
			$( this ).addClass('bg' + mymeatydays);
		});
		
		
		
		// Groups bar chart
		//if ( $('.directory').length || $('.tag').length ) {
		//}
		
		//	Remember team
		if (window.localStorage){
			if ( $( '.thisteam' ).length ) {
				//store team
				var thisteam = $( '.thisteam' ).html();
				localStorage.storedteam = thisteam;
				var teams = [];
				//store child teams
				if ($('#toplevel-groups-list .item-title a').length){
					$('#toplevel-groups-list .item-title a').each(function(i, element) {
						teams.push($(this).html());
					});
				localStorage["teams"] = JSON.stringify(teams);
				} else {
					localStorage.removeItem('teams');
				}
				//store parent team
				if ($('#item-header-content .parent').length){
					var parentteam = $('#item-header-content .parent').html();
					localStorage.parentteam = parentteam;
				} else {
					localStorage.removeItem('parentteam');
				}
			}
			if (localStorage.storedteam){ 
				$( '.myteam' ).append( localStorage.storedteam );
				if (localStorage.parentteam){
					//Signup field replacement
					$( '#gform_1 #field_1_5' ).remove();
				}
				var jointeam = $('.fix .myteam a').html();
				//$( '#gform_1 #field_1_7 input' ).val(jointeam);
				$( '#gform_1 #field_1_9 .gfield_label').append(': <span id="team-name">' + jointeam + '</span>');
				var selectTeams = [];
				selectTeams.push('<option value="' + jointeam + '">teams in ' + jointeam + '...</option>');
				if (localStorage["teams"]) {
					var storedTeams = JSON.parse(localStorage["teams"])
					$.each( storedTeams, function(i, teamName) {
						selectTeams.push('<option value="'+ teamName +'">'+ teamName +'</option>');
					});
				} else {
					$( '#gform_1 #field_1_9 .ginput_container' ).addClass('invisible');
				}
				$('#input_1_9').html(selectTeams.join(''));
			} else {
				$( '#gform_1 #field_1_9' ).remove();
    		}
		}
		
		//Signup field replacement
		$( '#gform_1 #field_1_6' ).append('<span id="meatyDays" class="redtext">meaty days per week.</span>');
//		$( '#gform_1 #field_1_6' ).change(function() {
//			switch( $( '#gform_1 #field_1_6 option:selected' ).text() ) {
//				case '6':
//					weeklySavings( 1 );
//					break;
//				case '5':
//					weeklySavings( 2 );
//					break;
//				case '4':
//					weeklySavings( 3 );
//					break;
//				case '3':
//					weeklySavings( 4 );
//					break;
//				case '2':
//					weeklySavings( 5 );
//					break;
//				case '1':
//					weeklySavings( 6 );
//					break;
//				case 'No':
//					weeklySavings( 7 );
//					break;
//			}
//		});
		
		
		//Remove profile duplicates
		var seen = {};
		$('tr').each(function() {
			var txt = $(this).text();
			if (seen[txt])
				$(this).remove();
			else
				seen[txt] = true;
		});
		
		var seen = {};
		$('.editfield').each(function() {
			var txt = $(this).text();
			if (seen[txt])
				$(this).remove();
			else
				seen[txt] = true;
		});
		
		var tag = $('.tag #gtags-results b').html();
		if (tag) {
			$('.tag #gtags-top-cloud a').each(function() {
				if ($(this).html() == tag) {
					$(this).addClass('light-grey');
				}
			});
			$('.tag #groups-directory-form>h3').wrap('<a href="http://www.parttimecarnivore.org/teams/"></a>');
		}

});
</script>