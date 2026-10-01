<div id="splash-screen">
    <div class="light-sweep"></div>
    <div class="center-light"></div>

    <div class="splash-content">
        <div class="symbol">
            ✦
        </div>

        <h1>
            A JOURNEY
            <br>
            THROUGH TEYVAT
        </h1>

        <div class="gold-line"></div>

        <p>
            Discover a world beyond imagination
        </p>
    </div>
</div>

<style>

/* =================================
   SPLASH
================================= */

#splash-screen{
    position:fixed;
    inset:0;

    background:#030303;

    z-index:999999;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;

    transition:
    opacity .9s ease,
    visibility .9s ease;
}

#splash-screen.hide{
    opacity:0;
    visibility:hidden;
}


/* =================================
   LIGHT SWEEP
================================= */

.light-sweep{
    position:absolute;

    width:140%;
    height:1px;

    background:
    linear-gradient(
    90deg,
    transparent,
    rgba(220,181,108,.9),
    transparent
    );

    transform:translateX(-100%);

    animation:
    sweep 1.2s ease forwards;
}

@keyframes sweep{
    to{
        transform:translateX(100%);
    }
}


/* =================================
   CENTER LIGHT
================================= */

.center-light{
    position:absolute;

    width:180px;
    height:180px;

    border-radius:50%;

    background:
    radial-gradient(
    circle,
    rgba(220,181,108,.18),
    transparent 70%
    );

    filter:blur(25px);

    animation:
    breathing 4s ease-in-out infinite;
}

@keyframes breathing{
    0%,100%{
        transform:scale(.9);
        opacity:.5;
    }

    50%{
        transform:scale(1.15);
        opacity:1;
    }
}


/* =================================
   CONTENT
================================= */

.splash-content{
    position:relative;

    z-index:5;

    text-align:center;

    color:white;
}

.symbol{
    color:#dcb56c;

    font-size:1.2rem;

    opacity:0;

    animation:
    fadeUp .8s .35s ease forwards;
}

h1{
    font-family:'Macondo Swash Caps',cursive;

    font-size:2.7rem;

    font-weight:400;

    letter-spacing:5px;

    line-height:1.3;

    margin:20px 0;

    color:#f5eedc;

    opacity:0;

    transform:translateY(20px);

    filter:blur(5px);

    animation:
    titleReveal 1.1s .7s ease forwards;
}

@keyframes titleReveal{
    to{
        opacity:1;
        transform:translateY(0);
        filter:blur(0);
    }
}


/* =================================
   LINE
================================= */

.gold-line{
    height:1px;

    width:0;

    margin:25px auto;

    background:#dcb56c;

    animation:
    lineReveal .8s 1.6s ease forwards;
}

@keyframes lineReveal{
    to{
        width:190px;
    }
}


/* =================================
   SUBTITLE
================================= */

p{
    font-family:'Itim',cursive;

    color:#aaa;

    letter-spacing:2px;

    margin:0;

    opacity:0;

    transform:translateY(10px);

    animation:
    subtitleReveal .8s 1.8s ease forwards;
}

@keyframes subtitleReveal{
    to{
        opacity:1;
        transform:translateY(0);
    }
}


/* =================================
   PARTICLE SIMPLE
================================= */

#splash-screen::before{
    content:"";

    position:absolute;

    width:3px;
    height:3px;

    background:#dcb56c;

    border-radius:50%;

    box-shadow:
    120px -80px rgba(220,181,108,.8),
    -150px 90px rgba(255,255,255,.5),
    180px 100px rgba(220,181,108,.6),
    -180px -120px rgba(255,255,255,.4);

    animation:
    floatParticle 5s infinite alternate;
}

@keyframes floatParticle{
    from{
        transform:translateY(15px);
        opacity:.2;
    }

    to{
        transform:translateY(-25px);
        opacity:.8;
    }
}


/* =================================
   RESPONSIVE
================================= */

@media(max-width:768px){

    .center-light{
        width:120px;
        height:120px;
    }

    h1{
        font-size:1.8rem;
        letter-spacing:3px;
    }

}


@media(max-width:480px){

    h1{
        font-size:1.35rem;
        letter-spacing:2px;
    }

    p{
        font-size:.7rem;
    }

}

</style>

<script>

document.addEventListener("DOMContentLoaded",()=>{

    const splash = document.getElementById(
        "splash-screen"
    );

    if(!splash) return;

    document.body.style.overflow="hidden";

    setTimeout(()=>{

        splash.classList.add("hide");

        document.body.style.overflow="";

        setTimeout(()=>{

            splash.remove();

        },900);

    },2800);

});

</script>