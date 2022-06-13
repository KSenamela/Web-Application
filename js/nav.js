window.addEventListener("load", () => {
    const header = document.querySelector("header.navigation");
    const main = document.querySelector("div.main-content");

    main.style.paddingTop = `${header.clientHeight}px`;
})