// ==UserScript==
// @name         Задание15
// @namespace    http://tampermonkey.net/
// @version      2024-04-25
// @description  try to take over the world!
// @author       Гурьев Сергей
// @match        https://ya.ru/*
// @match        https://www.avito.ru/*
// @grant        none
// ==/UserScript==

let yaInput = document.getElementById("text");
let naiti = document.getElementsByClassName('search3__button mini-suggest__button')[0];
let links = '';
let keywords = ["Купить автомобиль", "лучшие триллеры", "услуги сантехника", "красивый Крым", "продать ботинки"];
let keyword = keywords[getRandom(0, keywords.length)];
let nextPage = true;
//let keyword = ["лучшие триллеры"];

//Работаем на главной странице
if(naiti != undefined) {
  yaInput.value = keyword;
  naiti.click();
//Работаем на странице поисковой выдачи
} else {
    links = document.links;
//  let nextPage = true;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("avito.ru") != -1) {
      let link = links[i];
      nextPage = false;
      console.log("Нашел строку " + link);
     //Если это не страница о бизнесе, о вакансиях, не каталог, откуда не уйти переходим на сайт
      if (link.href.includes("business") == false && 
          link.href.includes("career") == false && 
          link.href.includes("support") == false &&
          link.href.includes("catalog") == false && 
          link.href.includes("from=mp_header") == false && 
          link.href.includes("favorites") == false) {
        setTimeout(() => {
          link.removeAttribute('target');
          // или link.target = "";
          link.click();
          }, getRandom(2000, 3000));
        break;
      }
    }
  }
 //Работаем на сайте
  if (nextPage == false) {
    console.log("Мы на нужном сайте");
    setInterval(() => {
           let linkIndex = getRandom(0, links.length);
           let localLink = links[linkIndex];

           if (getRandom(0, 10) < 6) {
             location.href = "https://ya.ru/";
           }
           if (links.length == 0) {
             location.href = "https://www.avito.ru";
           }
           if (localLink.href.includes("www.avito.ru") && 
               localLink.href.includes("business") == false && 
               localLink.href.includes("career") == false && 
               localLink.href.includes("support") == false && 
               localLink.href.includes("catalog") == false && 
               localLink.href.includes("from=mp_header") == false && 
               localLink.href.includes("favorites") == false) {
             localLink.removeAttribute('target');
             localLink.click();
           }
    }, getRandom(8000, 10000));
  }
// Если не найден сайт на 1-й странице поисковой выдачи гуляем не дальше 5-й и переходим на главную страницу
  // Кнопка "ДАЛЬШЕ"
  let dalshe = document.getElementsByClassName("VanillaReact Pager-Item Pager-Item_type_next")[0];
  // Cтраницы поисковой выдачи
  let str = document.getElementsByClassName("VanillaReact Pager-Item Pager-Item_type_page")[0];

  if(nextPage) {
    let elementExist = setInterval(() => {
      dalshe.click();
      console.log("Страница " + str.innerText);
      if (str.innerText == "3") {
        clearInterval(elementExist);
        location.href = "https://ya.ru/";
      }
    }, 2000);
  }
}

function getRandom(min,max) {
  return Math.floor(Math.random() * (max - min) + min);
}
