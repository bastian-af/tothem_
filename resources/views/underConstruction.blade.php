<style>
    body {
        background: url("https://res.cloudinary.com/jasonheecs/image/upload/v1480353347/construction/bg.jpg");
        font-family: 'Roboto', sans-serif;
    }

    main {
        display: flex;
        position: absolute;
        left: 0;
        flex-wrap: wrap;
        width: 100%;
        height: 100%;
        text-transform: uppercase;
        overflow: hidden;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .scene,
    .layer {
        display: block;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .scene {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
        list-style-type: none;
    }

    .layer {
        position: absolute;
    }

    .content {
        position: relative;
        padding: 20px;
        font-size: 1rem;
    }
    @media screen and (min-width: 768px) {
        .content {
            top: 10%;
            left: 15%;
        }
    }
    @media screen and (min-width: 992px) {
        .content {
            top: 18%;
        }
    }

    .rocket,
    .cloud-back,
    .cloud-front {
        position: relative;
        width: auto;
        text-align: right;
    }

    .cloud-front {
        bottom: -85vh;
    }
    @media screen and (min-height: 700px) {
        .cloud-front {
            bottom: calc(-98vh + 55px);
        }
    }
    @media screen and (min-width: 768px) and (min-height: 700px) {
        .cloud-front {
            bottom: calc(-85vh + 132px);
        }
    }

    .cloud-back {
        bottom: -75vh;
    }
    @media screen and (min-height: 700px) {
        .cloud-back {
            bottom: calc(-98vh + 87px);
        }
    }
    @media screen and (min-width: 768px) and (min-height: 700px) {
        .cloud-back {
            bottom: calc(-85vh + 182px);
        }
    }

    .rocket {
        bottom: calc(-20vh);
    }
    @media screen and (min-height: 700px) {
        .rocket {
            bottom: calc(-100vh + 330px);
        }
    }
    @media screen and (min-width: 480px) and (min-height: 700px) {
        .rocket {
            bottom: calc(-95vh + 400px);
        }
    }
    @media screen and (min-width: 768px) and (min-height: 700px) {
        .rocket {
            bottom: calc(-85vh + 600px);
        }
    }

    .footer {
        position: absolute;
        bottom: 0%;
        left: -100%;
        width: 300%;
        height: 90vh;
        background: #2929ff;
        z-index: -1;
    }
    @media screen and (min-width: 480px) {
        .footer {
            height: 25vh;
        }
    }
    @media screen and (min-width: 768px) {
        .footer {
            bottom: -25vh;
            height: 50vh;
        }
    }
    @media screen and (min-width: 992px) {
        .footer {
            bottom: -15vh;
            height: 50vh;
        }
    }

    .social {
        position: absolute;
        top: 10px;
        right: 5%;
        color: #999;
        text-transform: uppercase;
    }

    .social__link {
        display: inline-block;
        margin-left: 10px;
    }
    .social__link img {
        vertical-align: middle;
    }

</style>
<main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/2.1.3/parallax.min.js"></script>
    <ul id="scene"
        data-friction-x="0.1"
        data-friction-y="0.1"
        data-scalar-x="25"
        data-scalar-y="15"
        data-limit-y="50"
        class="scene">


        <li class="layer" data-depth="1.00">
            <div class="content">
                <span><h1 id="title">En desarrollo</h1>
                <p>TOTHEM</p></span>
            </div>

            <div class="footer"></div>
        </li>

        <li class="layer" data-depth="0.70">

            <div class="rocket">
                <img src="https://media.giphy.com/media/l3vQYe7l1TInypnYA/giphy.gif" alt="constructor">
            </div>
        </li>
    </ul>

    <script>
        new Parallax(document.getElementById('scene'));
    </script>
</main>
