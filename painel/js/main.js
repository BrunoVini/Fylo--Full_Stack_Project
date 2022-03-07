$(function(){

	var open  = true;
	var windowSize = $(window)[0].innerWidth;
	const menu = $('.menu-aside');
	const content = $('.content');
	const top = $('.top-bar');


	const menuCLosed = () => {
		$('.menu-btn').removeClass('open');
		menu.animate({'left': '-300px'},function(){
			open = false;
		});
		content.css('width','98%');
		top.animate({'width': '100%'},function(){
			open = false;
		});
		$('body').css('overflow-y','auto');
		$('.topo button, .topo a.out').fadeIn(0);
		if($(window)[0].innerWidth > 1200) {
			$('.content .data-site .box').addClass('w-280');
		}
	}

	const menuOpen = () => {
		$('.menu-btn').addClass('open');
		menu.animate({'left': 0},function(){
			open = true;
		});
		top.css('width','calc(100% - 250px)');
		// top.animate({'width': 'calc(100% - 250px)'})
		
		if($(window)[0].innerWidth < 600) {
			for ( i = 0; i < $('.topo button').length; i++) {
				if(i > 0) $('.topo button').eq(i).fadeOut(0);
			}
			$('.topo a.out').fadeOut();
			$('body').css('overflow-y','hidden');
			$('#config').animate({right: '-240px'});
		} else {
			content.css('width','calc(100% - 260px)');
		}
		
		if ($(window)[0].innerWidth > 1200) {
			$('.content .data-site .box').removeClass('w-280');
		}
	}

	if(windowSize < 768){
		content.css('width','98%');
	} else {
		$('.menu-btn').addClass('open');
	}

	$('.menu-btn').click(function(){
		if(open){
			menuCLosed();
		}else{
			menuOpen();
		}
	})

	$(window).resize(function(){
		const windowSize = $(window)[0].innerWidth;

		if(windowSize < 768){
			menu.css('left','-300px');
			content.css('width','98%');
			top.css('width','100%');
			open = false;
			$('.menu-btn').removeClass('open');
		}else{
			menu.css('left', 0);
			content.css('width','calc(100% - 260px)');
			top.css('width','calc(100% - 250px)');
			open = true;
			$('.topo button').fadeIn();
			$('.menu-btn').addClass('open');
			$('.email-body').css('display','block');
		}

		if($(window)[0].innerWidth < 1200) {
			$('.content .data-site .box').removeClass('w-280');
		}

	})

	document.querySelector('aside a.menu-active').innerHTML += '<i class="fas fa-angle-double-left icon-move"></>';

	$('[actionBtn=delete]').click(function(){
			var txt;
			var r = confirm("Deseja excluir o registro?");
			if (r == true) {
			    return true;
			} else {
			    return false;
			}
	})


})