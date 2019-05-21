function toggleMenu() {
    var element = document.getElementById("burger");
    element.classList.toggle("open");
    var element2 = document.getElementById("main_menu");
    element2.classList.toggle("open");
}


function textToggle() {
    var element = document.getElementById("info_block");
    element.classList.toggle("active");
}


function toggleModal() {
        var element = document.getElementById("w-modal");
        element.classList.toggle("active");
        var element2 = document.getElementById("wrapper");
        element2.classList.toggle("blur");
        var element3 = document.getElementById("footer");
        element3.classList.toggle("blur");
}


function filterToggle() {
        var element = document.getElementById("filter-btn");
        element.classList.toggle("filter-active");
        var element2 = document.getElementById("filter-container");
        element2.classList.toggle("active");
}


function tabToggle() {
        var element = document.getElementById("link1");
        element.classList.toggle("tab-control-item_active");
        var element2 = document.getElementById("link2");
        element2.classList.toggle("tab-control-item_active");
        var element3 = document.getElementById("tab-item-wrap1");
        element3.classList.toggle("tab-item-wrap_show");
        var element4 = document.getElementById("tab-item-wrap2");
        element4.classList.toggle("tab-item-wrap_show");
}