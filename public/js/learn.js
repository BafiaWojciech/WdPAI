const againButton = document.querySelector("#button_again");
const hardButton = document.querySelector("#button_hard");
const easyButton = document.querySelector("#button_easy");
const statsButton = document.querySelector("#stats");
const deleteButton = document.querySelector("#delete");
const card = document.querySelector(".card");
const flashcard = JSON.parse(JSON.stringify(arr));

let currIndex = null;
const start = Date.now();

let againcounter = 0;
let hardcounter = 0;
let easycounter = 0;

function showFlashcard() {
 let best = 0;

 for(let i=1; i<flashcard.length; ++i) {
  if (currIndex !== i) {
   if (flashcard[best]['progress'] > flashcard[i]['progress'])
    best = i;
  }
 }
 currIndex = best;
 document.getElementById("front").innerHTML = flashcard[currIndex]['front'];
 document.getElementById("back").innerHTML = '';
}

function again() {
 againcounter++;
 let n = parseInt(flashcard[currIndex]['id']);
 fetch(`/againFlashcard/${n}`).then( function() {
  flashcard[currIndex]['progress'] = Math.floor(flashcard[currIndex]['progress']/2);
  showFlashcard();
 }
 )
}

function hard() {
 hardcounter++;
 let n = parseInt(flashcard[currIndex]['id']);
 fetch(`/hardFlashcard/${n}`).then( function() {
  flashcard[currIndex]['progress'] = Math.floor((100-flashcard[currIndex]['progress']) / 8 ) + flashcard[currIndex]['progress'];
  showFlashcard();
     }
 )
}

function easy() {
 easycounter++;
 let n = parseInt(flashcard[currIndex]['id']);
 fetch(`/easyFlashcard/${n}`).then( function() {
  flashcard[currIndex]['progress'] = Math.floor((102-flashcard[currIndex]['progress']) / 3 ) + flashcard[currIndex]['progress'];
  showFlashcard();
     }
 )
}

function stats() {
 const duration = Date.now() - start;
 let min = Math.floor(duration/60000);
 let sec = Math.floor(duration/1000)%60;
 alert(`time: ${min} min ${sec} sec
 again: ${againcounter} cards
 hard: ${hardcounter} cards
 easy: ${easycounter} cards
 `);

}

function trash() {

 let n = parseInt(flashcard[currIndex]['id']);
 fetch(`/deleteCard/${n}`).then( function() {
  currIndex = null;
  flashcard.splice(currIndex, 1);
  document.getElementById("front").innerHTML = '';
  document.getElementById("back").innerHTML = '';
  showFlashcard();
     }
 )

}

function showback() {
 document.getElementById("back").innerHTML = flashcard[currIndex]['back'];
}

againButton.addEventListener("click", again);
hardButton.addEventListener("click", hard);
easyButton.addEventListener("click", easy);

statsButton.addEventListener("click", stats);
deleteButton.addEventListener("click", trash);

card.addEventListener("click", showback);
showFlashcard();


