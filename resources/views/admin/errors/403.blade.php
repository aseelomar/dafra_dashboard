<style>
    h1 {
        font-size: 15vmin;
        margin-bottom: 0;
    }
    h2 {
        font-size: 5vmin;
        margin-top: 0;
        margin-bottom: 40px;
    }

    body {
        height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: white;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    #jail {
        position: relative;
        border: 2px solid gray;
        border-radius: 50%;
        width: 32px;
        height: 32px;
    }

    #spinner {
        display: none;
        position: absolute;
        width: 100px;
        height: 100px;
        left: 50%;
        top: 50%;
        transform-origin: 50% 50%;
        animation: 4s spin linear infinite;
    }

    body.seenMouse #spinner {
        display: block;
    }


</style>

<h1>Forbidden!</h1>
<h2>Code 403</h2>


