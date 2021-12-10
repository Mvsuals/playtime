let canvas = document.querySelector("canvas");
let ctx = canvas.getContext("2d")

let tileSize = 50;

let playerImage = new Image();
playerImage.src ='img/player1.png';
let wallImage = new Image();
wallImage.src ='img/wall2.png';
let wallconerImage = new Image();
wallconerImage.src ='img/wallconer.png';
let wallconer1Image = new Image();
wallconer1Image.src ='img/wallconer1.png';
let lavaImage = new Image();
lavaImage.src ='img/lava1.png';
let finishImage = new Image();
finishImage.src ='img/fin2.png';
let floorImage = new Image();
floorImage.src ='img/floor3.png';
let diaImage = new Image();
diaImage.src ='img/diamond2.png';
let wallbotImage = new Image();
wallbotImage.src='img/wallbot.png';
let walltopImage = new Image();
walltopImage.src='img/walltop.png';
let stairImage = new Image();
stairImage.src='img/stair.png';
let hulImage = new Image();
hulImage.src='img/hul.png';
let wallmidImage = new Image();
wallmidImage.src='img/wallmid.png';
let point = 0;
let liv = 3;
var container = document.querySelector(".text");

var speeds = {
   pause: 500, //Higher number = longer delay
   slow: 120,
   normal: 90,
   fast: 40,
   superFast: 10
};

var textLines = [
   { speed: speeds.slow, string: "Oh, hello!" },
   { speed: speeds.pause, string: "", pause: true },
   { speed: speeds.normal, string: "Have you seen my precious" },
   { speed: speeds.fast, string: "Diamonds", classes: ["green"] },
   { speed: speeds.normal, string: "around?" },
   { speed: speeds.pause, string: "", pause: true },
   { speed: speeds.normal, string: "Use the arrowKeys to navigate the dungeon" },
   { speed: speeds.normal, string: "collect Diamonds", classes: ["green"]},
   { speed: speeds.normal, string: "and avoid BlueFlames" },
];


var characters = [];
textLines.forEach((line, index) => {
   if (index < textLines.length - 1) {
      line.string += " "; //Add a space between lines
   }

   line.string.split("").forEach((character) => {
      var span = document.createElement("span");
      span.textContent = character;
      container.appendChild(span);
      characters.push({
         span: span,
         isSpace: character === " " && !line.pause,
         delayAfter: line.speed,
         classes: line.classes || []
      });
   });
});

function revealOneCharacter(list) {
   var next = list.splice(0, 1)[0];
   next.span.classList.add("revealed");
   next.classes.forEach((c) => {
      next.span.classList.add(c);
   });
   var delay = next.isSpace && !next.pause ? 0 : next.delayAfter;

   if (list.length > 0) {
      setTimeout(function () {
         revealOneCharacter(list);
      }, delay);
   }
}

//Kick it off
setTimeout(() => {
   revealOneCharacter(characters);   
}, 600)



function walk(){

    let gameSound = new Audio('sound/walk1.mp3');
    gameSound.play();
    
    }
    

function dead(){

    let deadSound = new Audio('sound/dead.mp3');
    deadSound.play();
    if (liv == 0) 
     popDead();

      gameOver();

    }

 function gameOver(){
     
   // if(!alert){window.location.reload();}
     
 }

 function popDead(){

    swal.fire("You died!", "No more life! wanna try agian? click ok","error").then( () => {
        location.href = 'pixel.php'
    })

 }
 function popWin(){

    swal.fire("You won!", "awesome done! if wanna try agian click ok","success").then( () => {
        location.href = 'pixel.php'
    })

 }

function win(){
    
let winSound = new Audio('sound/win.mp3');
    winSound.play(); 
    popWin();
  
 // if(!alert('Level completed, Try again!')){window.location.reload();}

 }


// Swal.fire({
// title: 'Level completed!, Do you want to try again?',
//  width: 600,
//  padding: '3em',
//  background: '#fff url(img/back.png)',
//  backdrop: `
//    rgba((23, 24, 24, 0.6)
//    left top
//    no-repeat
//  `,
//  confirmButtonText:
//  'Lets go!', 
//  }) 



function take(){

    let takeSound = new Audio('sound/bling.mp3');
    takeSound.play();
}    

/*ctx.fillRect(x,y,50,50); */

let arr = [
    [7,0,0,0,0,0,0,0,0,0,0,8],
    [9,1,11,3,3,3,5,3,11,11,3,6],
    [9,3,11,11,3,3,3,11,3,5,3,6],
    [9,3,2,11,3,11,3,3,3,2,3,6],
    [9,3,5,11,3,11,3,3,2,3,3,6],
    [9,3,11,11,3,11,11,3,11,3,3,6],
    [9,3,3,3,3,3,11,3,3,11,11,6],
    [9,11,11,11,11,2,3,3,3,3,3,6],
    [9,3,3,5,11,3,3,3,11,11,3,6],
    [9,3,2,3,3,3,3,11,11,2,3,6],
    [9,3,5,11,11,3,3,11,5,3,3,6],
    [7,0,0,0,0,0,0,0,0,4,0,8]
    
]

let wall = 0
let player = 1
let monster = 2
let free = 3
let finish = 4
let diamond = 5
let wallbot = 6
let wallconer = 7
let wallconer1 = 8
let walltop = 9
let hul = 10
let wallmid = 11
let playerPosition = {x:0, y:0}

//console.log(arr);

function drawMaze(){

for(let x = 0; x < arr.length; x++){

    for(let y = 0; y < arr[x].length; y++){

        if(arr[x][y] == wall){
            ctx.drawImage(wallImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == wallbot){
            ctx.drawImage(wallbotImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == wallconer){
            ctx.drawImage(wallconerImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == wallconer1){
            ctx.drawImage(wallconer1Image,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == walltop){
            ctx.drawImage(walltopImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == hul){
            ctx.drawImage(hulImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == wallmid){
            ctx.drawImage(wallmidImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 
        if(arr[x][y] == player){
            playerPosition.x = x;
            playerPosition.y = y;
            ctx.drawImage(playerImage,x*tileSize,y*tileSize,tileSize,tileSize);
        }
        if(arr[x][y] == monster){
            ctx.drawImage(lavaImage,x*tileSize,y*tileSize,tileSize,tileSize);
        }
        if(arr[x][y] == free){
            ctx.drawImage(floorImage,x*tileSize,y*tileSize,tileSize,tileSize);
        }
        if(arr[x][y] == finish){
            ctx.drawImage(finishImage,x*tileSize,y*tileSize,tileSize,tileSize);
        }
        if(arr[x][y] == diamond){
            ctx.drawImage(diaImage,x*tileSize,y*tileSize,tileSize,tileSize);
        }
        if(arr[x][y] == walltop){
            ctx.drawImage(walltopImage,x*tileSize,y*tileSize,tileSize,tileSize);
        } 

    }

  }
}

document.addEventListener("keyup", function(event){
    if(event.keyCode == 37){
        if(arr[playerPosition.x -1][playerPosition.y]==free){
            arr[playerPosition.x -1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x -1][playerPosition.y]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x -1][playerPosition.y]==diamond){
            arr[playerPosition.x -1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();
        
    }
    if(event.keyCode == 38){
        if(arr[playerPosition.x][playerPosition.y -1]==free){
            arr[playerPosition.x][playerPosition.y -1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x][playerPosition.y -1]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x][playerPosition.y-1]==diamond){
            arr[playerPosition.x][playerPosition.y-1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();  
    }

    if(event.keyCode == 39){
        if(arr[playerPosition.x +1][playerPosition.y]==free){
            arr[playerPosition.x +1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==finish){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            win();
            
            
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==diamond){
            arr[playerPosition.x +1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();
        
        
    }
    if(event.keyCode == 40){
        if(arr[playerPosition.x][playerPosition.y +1] == free){
            arr[playerPosition.x][playerPosition.y +1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            walk();
        }
        else if(arr[playerPosition.x][playerPosition.y +1] == monster){
            arr[playerPosition.x,1][playerPosition.y,1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x][playerPosition.y+1] == diamond){
            arr[playerPosition.x][playerPosition.y+1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            take();
            document.getElementById("point").innerText = point+=10;
           
        }
        drawMaze();
        
        
    } 


    /*
    venstre: 37 
    op: 38
    højre: 39
    ned: 40
    */
})

window.addEventListener("load", drawMaze);


//<>