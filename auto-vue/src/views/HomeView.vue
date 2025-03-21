<template>
    <div class="home-container">
        <div class="containerText">
            <img class="photo" src="/coche.png" alt="png">
            <h1>Segona Jornada <br> d'Automoció</h1>
            <h2>Mobilitat a les <br>Comarques Gironinies</h2>
            <h3>4 al 6 de <label class="month">Febrer</label> de 2006</h3>
            <h4>Departament de transport i <br> manteniment de vehicles</h4>
            <button class="button">Confirmar l'Assistència</button>

            <div class="linea"></div> 
        </div>
    </div>
</template>

<style scoped>
.home-container {
    background: rgb(255,255,255);
    background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(141,162,255,1) 19%, rgba(0,48,255,1) 100%);
    min-height: 200vh;
    margin: 0;
    width: 100%; 
    padding: 0;
    position: relative;
    user-select: none;
    overflow-x: hidden; 
    max-width: 100%;
   
}

.photo {
    position: absolute;
    top: 3%;
    left: 40%;
    width: 60%;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

h1 {
    color: rgb(48, 66, 197);
    font-size: 600%;
    padding: 0;
    margin-bottom: 10px; 
    letter-spacing: 2px;
}

h2 {
    color: rgb(48, 66, 197);
    font-size: 300%;
    padding: 0;
    margin-top: 10px;
    margin-bottom: 10px; 
    letter-spacing: 2px;
}

h3 {
    color: rgb(48, 66, 197);
    font-size: 250%;
    padding: 0;
    margin-top: 20px; 
    margin-bottom: 10px; 
    font-weight: 300;
    letter-spacing: 2px;
}

h4 {
    color: rgb(48, 66, 197);
    font-size: 150%;
    padding: 0;
    margin-top: 20px; 
    margin-bottom: 10px; 
    font-weight: 300;
    letter-spacing: 2px;
}

button {
    background-color: rgb(48, 66, 197);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    margin-top: 20px; 
    font-size: 100%;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.5s;
}

button:hover {
    background-color: rgb(32, 43, 128);
}

.linea {
    margin-top: 5%;
    height: 1px;
    background-color: aliceblue;
    width: 93%;
    opacity: 0.3;
}

.month {
    color: rgb(48, 66, 197);
    font-weight: 600;
    margin-bottom: 0;
}

.containerText {
    margin: 2% 0 0 5%;
    letter-spacing: 2px;
}
</style>