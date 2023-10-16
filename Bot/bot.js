// ==UserScript==
// @name         Bot for ZapMeta
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot
// @author       Vinnichenko Olga
// @match        https://www.zapmeta.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let links = document.links;
let searchBtn = document.querySelector(".search-field__submit-button");
let input = document.getElementsByName("q")[0];
let keywords = ["10 самых популярных шрифтов от Google",
                "Отключение редакций и ревизий в WordPress",
                "Вывод произвольных типов записей и полей в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];
let event = new MouseEvent("click", {
    view: window,
    bubbles: true,
    cancelable: true,
  });

if (searchBtn !== null && links.length === 0) {
  input.value = keyword;
  searchBtn.dispatchEvent(event);
} else {
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.includes("napli.ru")) {
      let link = links[i];
      console.log("Нашел строку!" + link);
      window.location = link.href
      return;
    }
  }

  input.value = keyword;
  searchBtn.dispatchEvent(event);
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
