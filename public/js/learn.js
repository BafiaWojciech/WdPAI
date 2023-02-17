const againButton = document.querySelector("#button_again");
const hardButton = document.querySelector("#button_hard");
const easyButton = document.querySelector("#button_easy");

const flashcard = JSON.parse(JSON.stringify(arr));

let curr = null;
function showFlashcard() {
 let best = flashcard[0];

 for(let i=1; i<flashcard.length; ++i) {
  if (curr !== flashcard[i]) {
   if (best['progress'] > flashcard[i]['progress'])
    best = flashcard[i];
  }
 }
 curr = best;
 document.getElementById("front").innerHTML = curr['front'];
 document.getElementById("back").innerHTML = curr['back'];
}

function again() {
 let n = parseInt(curr['id']);
 fetch(`/againFlashcard/${n}`).then( function() {
  curr['progress'] = Math.floor(curr['progress']/2);
  showFlashcard();
     }
 )

}

function hard() {
 let n = parseInt(curr['id']);
 fetch(`/hardFlashcard/${n}`).then( function() {
  curr['progress'] = Math.floor((100-curr['progress']) / 8 ) + curr['progress'];
  showFlashcard();
     }
 )

}

function easy() {
 let n = parseInt(curr['id']);
 fetch(`/easyFlashcard/${n}`).then( function() {
  curr['progress'] = Math.floor((102-curr['progress']) / 3 ) + curr['progress'];
  showFlashcard();
     }
 )
}

againButton.addEventListener("click", again);
hardButton.addEventListener("click", hard);
easyButton.addEventListener("click", easy);

showFlashcard();


