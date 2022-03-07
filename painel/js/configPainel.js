$(function () {
    var configOpen = false;
    
    $('.content').click(() => {
        $('#config').stop().animate({right: '-240px'}, 400);
    })

    $('#config, .settings').click(function(e) {
        e.stopPropagation();
    })

    $('.settings').click(() => {
        if(!configOpen) {
            $('#config').stop().animate({right: '0'});
        } else {
            $('#config').stop().animate({right: '-240px'}, 400);
        }
        configOpen = !configOpen;
    })

    var bgTopLeft, bgTopRight, bgNav, bgContent, colorTxt;
    
    const colors = {
        blue: ['#367fa8','#3c8dbc','#222d31','#ccc','#fff'],
        black: ['#000','#000','#fff','#ccc','#000'],
        purple: ['#370263','#400174','#222d31','#ccc','#fff'],
        green: ['#0c8d00','#10c200','#222d31','#ccc','#fff'],
        yellow: [' #daa520',' #ffd700','#222d31','#ccc','#fff'],
        blueLight: ['#367fa8','#3c8dbc','#fff','#ccc','#000'],
    }
    

    const changeColors = (style) => {
        [bgTopLeft, bgTopRight, bgNav, bgContent, colorTxt] = colors[style];

        $('.top-bar button, header.menu-aside, header aside, a.menu-active ').attr('id',style);
        $('header .logo').css('backgroundColor',bgTopLeft);
        $('.top-bar').css('backgroundColor',bgTopRight);
        $('header aside').css('backgroundColor',bgNav);
        $('#content').css('backgroundColor',bgContent);
    }


    $('.boxes .box').click(function() {
        var style = $(this).attr('id');
        localStorage.setItem('bg',style);
        let bgColor = colors[style][0]
        $.post("ajax/bg.php", {bg: bgColor}, function(data) {
            changeColors(style);
        })
    })

    if(localStorage.getItem('bg') != null) {
        changeColors(localStorage.getItem('bg'));
    } else {
        changeColors('blue');
    }
})