// ==UserScript==
// @name         Задание14
// @namespace    http://tampermonkey.net/
// @version      2024-04-22
// @description  try to take over the world!
// @author       Гурьев Сергей
// @match        https://ya.ru/*
// @grant        none
// ==/UserScript==

let yaInput = document.getElementById("text");
let naiti = document.getElementsByClassName('search3__button mini-suggest__button')[0];
let keywords = ["Купить автомобиль", "услуги сантехника",
                "Купить квартиру в Москве", "продать ботинки"];
let keyword = keywords[getRandom(0, keywords.length)];

if(naiti != undefined) {
  yaInput.value = keyword;
  naiti.click();
} else {
  let links = document.links;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("avito.ru") != -1) {
      let link = links[i];
      console.log("Нашел строку " + link);
      link.removeAttribute('target');
      // или link.target = "";
      link.click();
      break;
    }
  }
}

function getRandom(min,max) {
  return Math.floor(Math.random() * (max - min) + min);
}
