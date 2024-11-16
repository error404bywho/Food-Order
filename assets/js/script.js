'use strict';

/**
 * Navbar toggle in mobile
 */
const navbar = document.querySelector("[data-navbar]");
const navToggleBtn = document.querySelector("[data-nav-toggle-btn]");
const searchContainer = document.querySelector("[data-search-wrapper]");
const searchBtn = document.querySelector("[data-search-btn]");

navToggleBtn.addEventListener("click", () => {
    if (navToggleBtn.classList.contains("active") && navbar.classList.contains("active")) {
        navbar.classList.toggle("active");
        navToggleBtn.classList.toggle("active");
    } else {
        closeAllPanels();
        closeAllBtn();
        navbar.classList.add("active");
        navToggleBtn.classList.add("active");
    }
});

/**
 * Search toggle
 */
searchBtn.addEventListener("click", () => {
    if (searchContainer.classList.contains("active")) {
        searchContainer.classList.toggle("active");
    } else {
        closeAllPanels();
        closeAllBtn();
        searchContainer.classList.add("active");
    }
});

/**
 * Wishlist and Cart toggle
 */
const panelBtns = document.querySelectorAll("[data-panel-btn]");
const sidePanels = document.querySelectorAll("[data-side-panel]");

panelBtns.forEach(panelBtn => {
    panelBtn.addEventListener("click", () => {
        const panelType = panelBtn.getAttribute("data-panel-btn");

        const sidePanel = document.querySelector(`[data-side-panel="${panelType}"]`);

        if (sidePanel.classList.contains("active")) {
            sidePanel.classList.toggle("active");
            panelBtn.classList.toggle("active");
        } else {
            closeAllPanels();
            closeAllBtn();
            sidePanel.classList.add("active");
            panelBtn.classList.add("active");
        }

    });
});

/**
 * Function to close all panels
 */

function closeAllPanels() {
    navbar.classList.remove("active");
    navToggleBtn.classList.remove("active");
    searchContainer.classList.remove("active");
    sidePanels.forEach(panel => {
        panel.classList.remove("active");
    });
}

function closeAllBtn() {
    panelBtns.forEach(panelBtn => {
        panelBtn.classList.remove("active");
    })
}
