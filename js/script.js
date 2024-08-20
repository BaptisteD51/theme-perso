hljs.highlightAll(); //activate my hinghlighting library

// Lang Switcher
(function languageSwitcher(){
    let button = document.querySelector(".pll-parent-menu-item")
    let subMenu = document.querySelector(".pll-parent-menu-item ul")
    
    button.childNodes[0].innerHTML += ' <i class="fa-solid fa-chevron-down"></i>'
    let chevron = button.querySelector("i.fa-chevron-down")

    subMenu.style.display = "none"

    button.addEventListener('click', function(){
        button.style.overflow = "visible"
        if(subMenu.style.display == "none"){
            subMenu.style.display = ""
            chevron.classList.value = "fa-solid fa-chevron-up"
        }else if(subMenu.style.display != "none"){
            subMenu.style.display = "none"
            chevron.classList.value = "fa-solid fa-chevron-down"
        }
    })

    document.addEventListener('click', function(event){
        if((event.target != button) && (!button.contains(event.target))){
            subMenu.style.display = "none"
            chevron.classList.value = "fa-solid fa-chevron-down"
        }
    })
})()