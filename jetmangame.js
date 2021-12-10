//canvas
const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = 800;
canvas.height = 520;

let score = 0;
let gameFrame = 0;
ctx.font = "200 30px Verdana";
ctx.fontw
let gameSpeed = 1;
let gameOver = false;

//mus
let canvasPosition = canvas.getBoundingClientRect();
const mouse = {
    x: canvas.width/2,
    y: canvas.height/2,
    click: false
}

canvas.addEventListener('mousedown', function(event){
    mouse.x = event.x - canvasPosition.left;
    mouse.y = event.y - canvasPosition.top;
});

//spiller
const playerLeft = new Image();
playerLeft.src = 'jetman_left.png';
const playerRight = new Image();
playerRight.src = 'jetman_right.png';

class Player {
    constructor(){
        this.x = canvas.width;
        this.y = canvas.height/2;
        this.radius = 50;
        this.angle = 0;
        this.frameX = 0;
        this.frameY = 0;
        this.frame = 0;
        this.spriteWidth = 498;
        this.spriteHeight = 327;
    }
    update(){
        const dx = this.x - mouse.x;
        const dy = this.y - mouse.y;
        let theta = Math.atan2(dy, dx);
        this.angle = theta;

        if (mouse.x != this.x) {
            this.x -= dx/20;
        }
        if (mouse.y != this.y) {
            this.y-= dy/20;
        }
    }
    draw(){
        if (mouse.clik) {
            ctx.lineWidth = 0.2;
            ctx.beginPath();
            ctx.moveTo(this.x, this.y);
            ctx.lineTo(mouse.x, mouse.y);
            ctx.stroke()
        }

       // ctx.fillstyle = 'red';
       // ctx.beginPath();
       // ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
       // ctx.fill();
       // ctx.closePath();
       // ctx.fillRect(this.x,this.y,this.radius,10);

        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.angle)
if (this.x >= mouse.x){
    ctx.drawImage(playerLeft, this.frameX * this.spriteWidth, this.frameY *this.spriteHeight,
        this.spriteWidth, this.spriteHeight, 0 - 115, 0 - 105, this.spriteWidth/2, this.spriteHeight/2);
} else {
    ctx.drawImage(playerRight, this.frameX * this.spriteWidth, this.frameY *this.spriteHeight,
        this.spriteWidth, this.spriteHeight, 0 - 135, 0 - 100, this.spriteWidth/2, this.spriteHeight/2);
}
ctx.restore();
    }
}

const player = new Player();

//guld
const goldArray = [];
const goldImage = new Image();
goldImage.src = 'coin_1.png';

class Guld {
    constructor(){
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + 100;
        this.radius = 40;
        this.speed = Math.random() * 5 + 1;
        this.distance;
        this.counted = false;
        this.sound = 'sound1';
    }
    update(){
        this.y -= this.speed;
        const dx = this.x - player.x;
        const dy = this.y - player.y;
        this.distance = Math.sqrt(dx*dx + dy*dy);
    }
    draw(){
       // ctx.fillstyle = 'blue';
        // ctx.beginPath();
        // ctx.arc(this.x,this.y, this.radius, 0, Math.PI * 2);
        // ctx.fill();
        // ctx.closePath();
        // ctx.stroke();
        ctx.drawImage(goldImage, this.x - 40, this.y - 43, this.radius * 2.1, this.radius * 2.1)
    }
}

const goldtake = document.createElement('audio');
goldtake.src = 'bling1.mp3'

function handleGold(){
    if (gameFrame % 50 == 0){
        goldArray.push(new Guld()); 
    }
    for (let i = 0; i < goldArray.length; i++){
        goldArray[i].update();
        goldArray[i].draw();
        if (goldArray[i].y < 0 - goldArray[i].radius * 2){
            goldArray.splice(i, 1);
            i--;
        } else if (goldArray[i].distance < goldArray[i].radius + player.radius){
                if (!goldArray[i].counted){
                    if (goldArray[i].sound == 'sound1'){
                        goldtake.play();
                    }
                    score++;
                    goldArray[i].counted = true;
                    goldArray.splice(i, 1);
                    i--;
                }
            }    
    }
    for (let i = 0; i < goldArray.length; i++) { 


    }
}

//bagrund

const background = new Image();
background.src = 'sky.png';

const background1 = new Image();
background1.src = 'sky1.png';

const BG = {
    x1: 0,
    x2: canvas.width,
    y: 0,
    width: canvas.width,
    height: canvas.height
}

function handleBackground(){
    BG.x1 -= gameSpeed;
    if (BG.x1 < -BG.width) BG.x1 = BG.width;
    BG.x2 -= gameSpeed;
    if (BG.x2 < -BG.width) BG.x2 = BG.width;
    ctx.drawImage(background, BG.x1, BG.y, BG.width, BG.height);
    ctx.drawImage(background1, BG.x2, BG.y, BG.width, BG.height);
}

//fly

const misilImage = new Image();
misilImage.src = 'plane.png'

class Misil {
    constructor(){
        this.x = canvas.width + 200;
        this.y = Math.random() * (canvas.height -150) + 90;
        this.radius = 40;
        this.speed = Math.random() * 2 +2;
        this.frame = 0;
        this.framex = 0;
        this.frameY = 0;
    
    }
    draw(){
        // ctx.fillstyle = 'blue';
        // ctx.beginPath();
        // ctx.arc(this.x,this.y, this.radius, 0, Math.PI * 2);
        // ctx.fill();
       ctx.drawImage(misilImage, this.x - 55, this.y - 45, this.radius*4, this.radius*2);
        }
    update(){
            this.x -= this.speed;
           if (this.x < 0 - this.radius *2){
            this.x = canvas.width + 200;
            this.y = Math.random() * (canvas.height -150) + 90;
            this.speed = Math.random() * 2 +2;
           }
           //collision
           const dx = this.x - player.x;
           const dy = this.y - player.y;
           const distance = Math.sqrt(dx * dx + dy * dy);
           if (distance < this.radius + player.radius){
               handleGameover();
           }
        }
}

const misil1 = new Misil();
function handleMisil(){
    misil1.draw();
    misil1.update();
    
}

function handleGameover(){
    
    ctx.fillText('GAME OVER, you collected ' + score, 270, 240)
    
    gameOver = true;
}

function reset(){
    gameOver = true;
    score = 0;
}

//animation
function animate(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    player.update();
    handleGold();
    handleBackground();
    player.draw();
    handleMisil();
    ctx.fillText('score: ' + score, 10, 50);
    gameFrame++;
    if (!gameOver) requestAnimationFrame(animate);
}
animate();

window.addEventListener('resize', function(){
    canvasPosition = canvas.getBoundingClientRect();
});