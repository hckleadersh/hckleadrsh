
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <title>Gallery</title>
        <style>
            body {
                background-color: #fff;
                margin: 0;
                font-family: Arial;
                overflow: hidden;
            }

            #search {
              
            }
            
            #container{
           
               background: #fff;
               width:100%;
               
              
            }
            
        </style>
    </head>
    <body>
        <script src="js/three.min.js"></script>
        <script src="js/tween.min.js"></script>
        <script src="js/CSS3DRenderer.js"></script>

        <div id="container"></div>
       

        <script>
            var camera, scene, renderer;
            var player;

            var auto = true;

            var Element = function (entry) {

                var dom = document.createElement('div');
                dom.style.width = '480px';
                dom.style.height = '360px';

                var image = document.createElement('img');
                image.style.position = 'absolute';
                image.style.width = '480px';
                image.style.height = '360px';
                // image.src = entry.media$group.media$thumbnail[ 2 ].url;

                image.src = entry;

                dom.appendChild(image);
                console.log(entry);

                var button = document.createElement('img');
                button.style.position = 'absolute';
                button.style.left = ((480 - 86) / 2) + 'px';
                button.style.top = ((360 - 61) / 2) + 'px';
                button.style.visibility = 'hidden';
                button.style.WebkitFilter = 'grayscale()';

                var blocker = document.createElement('div');
                blocker.style.position = 'absolute';
                blocker.style.width = '480px';
                blocker.style.height = '360px';
                blocker.style.background = 'rgba(0,0,0,0.5)';
                blocker.style.cursor = 'pointer';
                dom.appendChild(blocker);

                var object = new THREE.CSS3DObject(dom);
                object.position.x = Math.random() * 4000 - 2000;
                // object.position.y = Math.random() * 2000 - 1000;
                object.position.y = 3000;
                object.position.z = Math.random() * -5000;

                //

                image.addEventListener('load', function (event) {

                    button.style.visibility = 'visible';

                    new TWEEN.Tween(object.position)
                            .to({y: Math.random() * 2000 - 1000}, 2000)
                            .easing(TWEEN.Easing.Exponential.Out)
                            .start();

                }, false);

                dom.addEventListener('mouseover', function () {

                    button.style.WebkitFilter = '';
                    blocker.style.background = 'rgba(0,0,0,0)';

                }, false);

                dom.addEventListener('mouseout', function () {

                    button.style.WebkitFilter = 'grayscale()';
                    blocker.style.background = 'rgba(0,0,0,0.75)';

                }, false);

                dom.addEventListener('click', function (event) {

                    event.stopPropagation();

                    auto = false;

                    if (player !== undefined) {

                        player.parentNode.removeChild(player);
                        player = undefined;

                    }
            
                    player = document.createElement('div');
                    player.style.position = 'absolute';
                    player.style.width = 'auto';
                    player.style.height = 'auto';
                    player.style.border = '0px';
                    player.src = entry;
                    this.appendChild(player);
                  
                    //

                    var prev = object.position.z + 400;

                    new TWEEN.Tween(camera.position)
                            .to({x: object.position.x, y: object.position.y - 25}, 1500)
                            .easing(TWEEN.Easing.Exponential.Out)
                            .start();

                    new TWEEN.Tween({value: prev})
                            .to({value: 0}, 2000)
                            .onUpdate(function () {

                                move(this.value - prev);
                                prev = this.value;

                            })
                            .easing(TWEEN.Easing.Exponential.Out)
                            .start();

                }, false);

                return object;

            };

            init();
            animate();

            function init() {

                camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 5000);
                camera.position.y = -25;

                scene = new THREE.Scene();
                var con = document.getElementById('container');
                renderer = new THREE.CSS3DRenderer();
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.domElement.style.position = 'absolute';
                renderer.domElement.style.top = 0;
                document.getElementById('container').appendChild(renderer.domElement);

                

                

                search();
                var con = document.getElementById('container');

                con.addEventListener('mousewheel', onMouseWheel, false);

                con.addEventListener('click', function (event) {

                    auto = true;

                    if (player !== undefined) {

                        player.parentNode.removeChild(player);
                        player = undefined;

                    }

                    new TWEEN.Tween(camera.position)
                            .to({x: 0, y: -25}, 1500)
                            .easing(TWEEN.Easing.Exponential.Out)
                            .start();

                }, false);

                window.addEventListener('resize', onWindowResize, false);

            }

            function search() {


                for (var i = 0, l = scene.children.length; i < l; i++) {

                    (function () {

                        var object = scene.children[ i ];
                        var delay = i * 15;

                        new TWEEN.Tween(object.position)
                                .to({y: -2000}, 1000)
                                .delay(delay)
                                .easing(TWEEN.Easing.Exponential.In)
                                .onComplete(function () {

                                    scene.remove(object);

                                })
                                .start();

                    })();

                }

                onData();
            }

            function onData(event) {

              
                var entries = ["imgs/1.jpg", "imgs/2.png", "imgs/3.jpg", "imgs/4.jpg", "imgs/5.jpg", "imgs/6.png", "imgs/7.jpg", "imgs/9.jpg", "imgs/10.jpg", "imgs/11.jpg",  "imgs/1.jpg", "imgs/2.png", "imgs/3.jpg", "imgs/4.jpg", "imgs/5.jpg", "imgs/6.png", "imgs/7.jpg", "imgs/9.jpg", "imgs/10.jpg", "imgs/11.jpg",  "imgs/1.jpg", "imgs/2.png", "imgs/3.jpg", "imgs/4.jpg", "imgs/5.jpg", "imgs/6.png", "imgs/7.jpg", "imgs/9.jpg", "imgs/10.jpg", "imgs/11.jpg",  "imgs/1.jpg", "imgs/2.png", "imgs/3.jpg", "imgs/4.jpg", "imgs/5.jpg", "imgs/6.png", "imgs/7.jpg", "imgs/9.jpg", "imgs/10.jpg", "imgs/11.jpg", "imgs/12.jpg"]
                console.log(entries);

                for (var i = 0; i < entries.length; i++) {

                    (function (data, time) {

                        setTimeout(function () {

                            scene.add(new Element(data));

                        }, time);

                    })(entries[ i ], i * 15);

                }

            }

            function move(delta) {

                for (var i = 0; i < scene.children.length; i++) {

                    var object = scene.children[ i ];

                    object.position.z += delta;

                    if (object.position.z > 0) {

                        object.position.z -= 5000;

                    } else if (object.position.z < -5000) {

                        object.position.z += 5000;

                    }

                }

            }

            function onMouseWheel(event) {

                move(event.wheelDelta);

            }

            function onWindowResize() {

                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();

                renderer.setSize(window.innerWidth, window.innerHeight);

            }

            function animate() {

                requestAnimationFrame(animate);

                TWEEN.update();

                if (auto === true) {

                    move(1);

                }

                renderer.render(scene, camera);

            }

        </script>
    </body>
</html>
