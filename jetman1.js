const canvas = document.getElementById('canvas2');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
let particleArray = [];


// handle maouse

const mouse = {
    x: null,
    y: null,
    radius: 30
}

window.addEventListener('mousemove', function(event){
    mouse.x = event.x;
    mouse.y = event.y;
});

ctx.fillStyle = 'gold';
ctx.font = '11px Arial';
ctx.fillText('COLLECTOR', 10, 10);

const textCord = ctx.getImageData(0, 0, 100, 100);

function drawSky() {
    ctx.fillStyle = 'white';
    ctx.beginPath();
    ctx.arc(this.x - 1, this.y - 1, this.size/3, 0, Math.PI * 2);
    ctx.fill();
    ctx.closePath();
}

class Particle {
    constructor(x, y){
        this.x = x + 100;
        this.y = y;
        this.size = 4.6;
        this.baseX = this.x;
        this.baseY = this.y;
        this.density = (Math.random() * 20) + 1;

    }
    draw(){
        
        ctx.fillStyle = 'gold';
        ctx.strokeStyle = 'black';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.stroke();
        ctx.closePath();

        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.closePath();
        ctx.fill();
       
        drawSky();

        
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.arc(this.x - 1, this.y - 1, this.size/2, 0, Math.PI * 2);
            ctx.closePath();
            ctx.fill();
           
        
    }




    update(){
        let dx = mouse.x - this.x;
        let dy = mouse.y - this.y;
        let distance = Math.sqrt(dx * dx + dy * dy);
        let forceDirectionX = dx / distance;
        let forceDirectionY = dy / distance;
        let maxDistance = mouse.radius;
        let force = (maxDistance - distance) / maxDistance;
        let DirectionX = forceDirectionX * force * this.density;
        let DirectionY = forceDirectionY * force * this.density;

        if (distance < mouse.radius){
            this.x -= DirectionX;
            this.y -= DirectionY;
          
        } else {
            if (this.x !== this.baseX){
                let dx = this.x - this.baseX;
                this.x -= dx/10;
            }
            if (this.y !== this.baseY){
                let dy = this.y - this.baseY;
                this.y -= dy/10; 
             }
        }
    }
}

function init() {
    particleArray = [];
    for (let y = 0, y2 = textCord.height; y < y2; y++){
        for (let x = 0, x2 = textCord.width; x < x2; x++){
            if (textCord.data[(y * 4 * textCord.width) + (x * 4) +3 ] > 128){
                let positionX = x;
                let positionY = y;
                particleArray.push(new Particle(positionX * 10, positionY * 10));
            }
        }
    }
}

init();

function animate(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < particleArray.length; i++){
        particleArray[i].draw();
        particleArray[i].update();
    }
   // connect();
    requestAnimationFrame(animate);
}
animate();

function connect(){
    for(let a = 0; a < particleArray.length; a++){
        for (let b = a; b < particleArray.length; b++){
            let dx = particleArray[a].x - particleArray[b].x;
            let dy = particleArray[a].y - particleArray[b].y;
            let distance = Math.sqrt(dx * dx + dy * dy);
            opacityValue = 1;
            ctx.strokeStyle = 'rgba(225, 255, 62,' + opacityValue + ')';

            if (distance < 17){
           
            ctx.beginPath();
            ctx.moveTo(particleArray[a].x, particleArray[a].y);
            ctx.lineTo(particleArray[b].x, particleArray[b].y);
            ctx.stroke();
            
           }

        }
    }
}