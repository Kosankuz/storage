window.onload = function(){

// Initialise an empty canvas on the page

var canvas = document.createElement("canvas");
  var context = canvas.getContext("2d");
  canvas.width = 800;
  canvas.height = 500;
  document.body.appendChild(canvas);

  // No longer setting velocites as they will be random
       // Set up object to contain particles and set some default values
       var particles = {},
           particleIndex = 0,
           settings = {
             density: 20,
             particleSize: 10,
             startingX: canvas.width / 2,
             startingY: canvas.height / 4,
             gravity: 0.5,
             groundLevel: canvas.height,
             leftWall: canvas.width * 0.05,
             rightWall: canvas.width * 0.95,
             blur: 0.5,
             color: "#ffffff"
           };

       // Set up a function to create multiple particles
       function Particle() {
         // Establish starting positions and velocities
         this.x = settings.startingX;
         this.y = settings.startingY;

         // Determine original X-axis speed based on setting limitation
         this.vx = Math.random() * 20 - 10;
         this.vy = Math.random() * 20 - 5;

         // Add new particle to the index
         // Object used as it's simpler to manage that an array
         particleIndex ++;
         particles[particleIndex] = this;
         this.id = particleIndex;
         this.life = 0;
         this.maxLife = 100;
       }

       // Some prototype methods for the particle's "draw" function
       Particle.prototype.draw = function() {
         this.x += this.vx;
         this.y += this.vy;

         // Adjust for gravity
         this.vy += settings.gravity;

         // Age the particle
         this.life++;

         // If Particle is old, it goes in the chamber for renewal
         if (this.life >= this.maxLife) {
           delete particles[this.id];
         }

         // Create the shapes
         context.clearRect(settings.leftWall, settings.groundLevel, canvas.width, canvas.height);
         context.beginPath();
         context.fillStyle= settings.color;
         // Draws a circle of radius 20 at the coordinates 100,100 on the canvas
         context.arc(this.x, this.y, settings.particleSize, 0, Math.PI*2, true);
         context.closePath();
         context.fill();

         // Bounce off the ground
          if ((this.y + settings.particleSize) > settings.groundLevel) {
            this.vy *= -0.6;
            this.vx *= 0.75;
            this.y = settings.groundLevel - settings.particleSize;
          }

          // Determine whether to bounce the particle off a wall
          if (this.x - (settings.particleSize) <= settings.leftWall) {
            this.vx *= -1;
            this.x = settings.leftWall + (settings.particleSize);
          }

          if (this.x + (settings.particleSize) >= settings.rightWall) {
            this.vx *= -1;
            this.x = settings.rightWall - settings.particleSize;
          }

          // Adjust for gravity
          this.vy += settings.gravity;

          // Age the particle

       }

       setInterval(function() {
         var blur = 1 - settings.blur;
        context.fillStyle = "rgba(6,10,6,"+blur+")";

         context.fillRect(0, 0, canvas.width, canvas.height);

         // Draw a left, right walls and floor
         context.fillStyle = "white";
         context.fillRect(0, 0, settings.leftWall, canvas.height);
         context.fillRect(settings.rightWall, 0, canvas.width, canvas.height);
         context.fillRect(0, settings.groundLevel, canvas.width, canvas.height);


         // Draw the particles
         for (var i = 0; i < settings.density; i++) {
           if (Math.random() > 0.97) {
             // Introducing a random chance of creating a particle
             // corresponding to an chance of 1 per second,
             // per "density" value
             new Particle();
           }
         }

         for (var i in particles) {
           particles[i].draw();
         }
       }, 30);

       var gui = new dat.GUI();
       gui.add(settings, 'density', 0, 5 );
       gui.add(settings, 'particleSize', 1, 50 );
       gui.add(settings, 'gravity', -2, 2 );
       gui.add(settings, 'startingY', 0, canvas.height * 0.75 )
       gui.add(settings, 'groundLevel', 0, canvas.height );
       gui.add(settings, 'leftWall', 0, canvas.width * 0.4);
       gui.add(settings, 'rightWall', canvas.width * 0.6, canvas.width);
       gui.add(settings, 'blur', 0.1, 0.9);
       gui.add(settings, 'color', "red" );
     };
