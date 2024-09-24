document.addEventListener('DOMContentLoaded', function () {
    // ----- SEARCH -----
    var a = document.querySelector('#btn_search');
    a.addEventListener('click', toggleSearch);
    function toggleSearch() {
        var searchForm = document.querySelector('#search_input');
        if (searchForm.style.display === "block") {
            searchForm.style.display = "none";
            setTimeout(function () {}, 800);
        } else {
            searchForm.style.display = "block";
        }
    }

    var b = document.querySelector('.show_menu');
    b.addEventListener('click', toggleMenu);
    function toggleMenu() {
        console.log(b);
        var mainMenu = document.querySelector('.nav_toggle');
        if (mainMenu.style.display === "block") {
            mainMenu.style.display = "none"
        } else {
            mainMenu.style.display = "block";
        }
    }

    if (window.screen.width < 768) {
        // ----- SUB_MENU -----
        var arrowIcon = document.querySelectorAll('.menu_icon');
        arrowIcon.forEach(function (i) {
            i.addEventListener('click', toggleSubmenu);

            function toggleSubmenu(e) {
                e.stopPropagation();
                e.preventDefault();
                if (this.parentNode.children[2].style.display === "block") {
                    this.parentNode.children[2].style.display = "none";
                } else {
                    this.parentNode.children[2].style.display = "block";
                }
            }
        })
    }

    //---- LIGHT MODE DARK MODE ----
    var lightIcon = document.querySelector('.light_mode');
    var darkIcon = document.querySelector('.dark_mode');
    lightIcon.addEventListener('click', lightMode);
    function lightMode() {
        lightIcon.style.display = "none"
        darkIcon.style.display = "block"
        document.body.classList.add('dark');
    }
    darkIcon.addEventListener('click', darkMode);
    function darkMode() {
        darkIcon.style.display = "none"
        lightIcon.style.display = "block"
        document.body.classList.remove('dark');
    }

    //---- splide ----
    if (document.getElementById('main_section')) {
        new Splide('#main_section', {
            autoplay: true,
            interval: 4000,
            type: 'loop',
            direction: 'rtl',
            pagination: false,
            adaptiveHeight: false,
        }).mount();
    }
    //---- END OF splide ----

    // ------ START OF TABs ------
    var tabHeader = document.querySelectorAll(".primary_multi_tab #tabs_title li");
    tabHeader.forEach(function (item, index) {
        item.addEventListener("click", function () {

            var tabContent = document.querySelectorAll("#tab_content_cnt .tab_content");

            tabContent.forEach(function (content) {
                content.classList.add("hidden");
                content.classList.remove("block");
            });
            tabContent[index].classList.remove("hidden");
            tabContent[index].classList.add("block");

            tabHeader.forEach(function (tab) {
                tab.classList.remove("bg-cyan-900");
                tab.classList.remove("text-white");
            });
            item.classList.add("bg-cyan-900");
            item.classList.add("text-white");
        });
    });
    // ------- END OF TABs -------





});