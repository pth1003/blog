<style>
    @import url('https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap');


    html, body {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    * {
        font-family: 'Tilt Warp', cursive;
        box-sizing: border-box;
    }

    #app {
        padding: 1rem;
        background: black;
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        color: green;
        text-shadow: 0px 0px 10px;
        font-size: 10rem;
        flex-direction: column;
    }

    .txt {
        font-size: 3rem;
    }

    @keyframes blink {
        0% {
            opacity: 0
        }
        49% {
            opacity: 0
        }
        50% {
            opacity: 1
        }
        100% {
            opacity: 1
        }
    }

    .blink {
        animation-name: blink;
        animation-duration: 1s;
        animation-iteration-count: infinite;
    }
</style>
<div id="app">
    <div>403</div>
    <div class="txt">
        You don't have permission and role<span class="blink">_</span>
    </div>
</div>
