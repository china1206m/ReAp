document.getElementsByClassName("menu-item").onclick = function () {
    document.getElementsByClassName("menu-item").classList.remove("is-btn-active");
    this.classList.add("is-btn-active");
};