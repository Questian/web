window.onload = function () {
    var nearQuestian = document.getElementById("near-questian");
    
    scrollPosition();
    
    window.addEventListener("scroll", scrollPosition);
    window.addEventListener("resize", windowResize);

    function scrollPosition() {
        var scroll = window.pageYOffset;

        if (window.innerWidth >= 1000 && scroll > 350) {
            nearQuestian.style.marginTop = scroll - 350 + "px";
        } else if (window.innerWidth < 1000) {
            nearQuestian.style.marginTop = "0px";
        } else {
            nearQuestian.style.marginTop = "0px";
        }
    }

    function windowResize() {
        if (window.innerWidth < 1000) {
            nearQuestian.style.marginTop = "0px";
        }
    }
};