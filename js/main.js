const button = document.getElementById('mobile-close');
const navMobile = document.getElementById('mobile');
var buttonOpen =  true;

button.addEventListener('click', () => {
    if(buttonOpen){
        button.classList.add('open');
        $("#mobile").css("margin-right","0");
        $("body").css("overflow-y", "hidden");
    }else{
        button.classList.remove('open');
        $("#mobile").css("margin-right","100%");
        $("body").css("overflow-y", "auto");
    }
    buttonOpen = !buttonOpen;
})