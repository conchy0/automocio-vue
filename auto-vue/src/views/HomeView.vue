<template>
    <div class="home">
        <div class="photo">
            <img src="/montilivi.jpg" alt="foto" typeof="image/jpg" />
            <div class="text-overlay">
                <h1>Segona Jornada Automoció</h1>
                <p class="p1">Mobilitat a les nostres comarques</p>
                <p class="p2">Del 4 el 6 de <span class="colorful">Febrer</span> del 2026</p>
                <p class="p3">Departament de transport i manteniment de vehicles</p>
                <StarBorder 
                    className="confirm-btn" 
                    speed="7s" 
                    intensity="5"
                >
                    Confirmar Assistencia
                </StarBorder>
            </div>
        </div>
        <HomeView2 />
    </div>
</template>

<script>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { toast } from 'vue3-toastify';
import StarBorder from '@/components/StarBorder.vue';
import HomeView2 from './HomeView2.vue';

export default {
  components: {
    StarBorder,
    HomeView2,
  },
  setup() {
    const route = useRoute();
    
    
onMounted(() => {
  const toastMessage = sessionStorage.getItem('toastMessage');
  if (toastMessage) {
    toast.success(toastMessage, { position: 'top-center' });
    sessionStorage.removeItem('toastMessage'); 
  }
    });
  }
};
</script>

<style scoped>
.home {
    margin-top: 1%;
    width: 80%;
    margin-left: 10%;
    display: flex;
    flex-direction: column;
    
}

.confirm-btn {
  margin-top: 25px;
  cursor: pointer;
}

.photo {
    width: 100%; 
    height: auto; 
    overflow: hidden; 
    border-radius: 40px;
    position: relative;
}

.colorful {
    font-weight: bold;
    color: #93c9ff;

}

.photo img {
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
    border-radius: 40px;
    transition: transform 0.3s ease-in-out;
}

.photo:hover img {
    transform: scale(1.05);
}

.photo::before {
    content: '';
    position: absolute;
    top: 0;
    left: -150%;
    width: 100%;
    height: 100%;
    background: linear-gradient(120deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
    transform: skewX(-20deg);
    transition: none; 
    z-index: 2;
    pointer-events: none;
    opacity: 0; 
}

.photo:hover::before {
    left: 150%;
    transition: left 0.4s ease-in-out, opacity 0.1s; 
    opacity: 1; 
}

.text-overlay {
    position: absolute;
    top: 46%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white; 
    text-align: left;
    font-size: clamp(2rem, 1.5vw, 0.5rem);
    font-weight: bold;
    white-space: nowrap; 
    overflow: hidden;
}

.text-overlay h1 {
    font-size: clamp(5.3rem, 2.5vw, 1.5rem);
    margin-bottom: 5px;
}

.text-overlay p {
    margin: 5px 0;
}

.text-overlay .p1 {
    margin-bottom: 20px;
    font-size: clamp(3.5rem, 2vw, 1.2rem);
    font-weight: bold;
}

.text-overlay .p2 {
    font-size: clamp(2.3rem, 1.8vw, 1rem);
    font-weight: normal;
}

.text-overlay .p3 {
    font-size: clamp(1rem, 1.5vw, 0.8rem);
    font-weight: normal;
}

@media (max-width: 820px) {
    .text-overlay {
        top: 50%;
        width: 85%;
        text-align: center;
        white-space: normal;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .text-overlay h1 {
        font-size: clamp(1.2rem, 1.5rem, 1.3rem);
        margin-bottom: 8px;
    }

    .text-overlay .p1 {
        font-size: clamp(0.8rem, 1rem, 0.9rem);
        margin-bottom: 6px;
    }

    .text-overlay .p2 {
        font-size: clamp(0.7rem, 0.9rem, 0.8rem);
        margin-bottom: 6px;
    }

    .text-overlay .p3 {
        font-size: clamp(0.6rem, 0.8rem, 0.7rem);
        margin-bottom: 10px; /* Espacio antes del botón */
    }

    .confirm-btn {
        padding: 6px 12px;
        font-size: clamp(0.9rem, 1.3rem, 1rem);
        border-radius: 6px;
        margin-top: 0; /* Eliminamos el margen superior */
    }
}

@media (max-width: 768px) {
    .text-overlay {
        top: 50%;
        width: 90%;
    }

    .text-overlay h1 {
        font-size: clamp(1rem, 1.2rem, 1.1rem);
        margin-bottom: 6px;
    }

    .text-overlay .p1 {
        font-size: clamp(0.7rem, 0.9rem, 0.8rem);
        margin-bottom: 5px;
    }

    .text-overlay .p2 {
        font-size: clamp(0.6rem, 0.8rem, 0.7rem);
        margin-bottom: 5px;
    }

    .text-overlay .p3 {
        font-size: clamp(0.5rem, 0.7rem, 0.6rem);
        margin-bottom: 8px; /* Reducimos espacio antes del botón */
    }

    .confirm-btn {
        padding: 4px 10px;
        font-size: clamp(0.8rem, 1.2rem, 0.9rem);
        border-radius: 5px;
        margin-top: 0;
    }
}

@media (max-width: 480px) {
    .text-overlay {
        top: 45%;
        width: 100%;
    }

    .text-overlay h1 {
        font-size: clamp(0.8rem, 1rem, 0.9rem);
        margin-bottom: 4px;
    }

    .text-overlay .p1 {
        font-size: clamp(0.6rem, 0.8rem, 0.7rem);
        margin-bottom: 4px;
    }

    .text-overlay .p2 {
        font-size: clamp(0.5rem, 0.7rem, 0.6rem);
        margin-bottom: 4px;
    }

    .text-overlay .p3 {
        font-size: clamp(0.4rem, 0.6rem, 0.5rem);
        margin-bottom: 6px; /* Menos espacio en móviles */
    }

    .confirm-btn {
        padding: 3px 8px;
        font-size: clamp(0.7rem, 1rem, 0.8rem);
        border-radius: 4px;
        margin-top: 0;
    }
}

@media (max-width: 395px) {
    .text-overlay {
        top: 50%;
        width: 100%;
    }

    .text-overlay h1 {
        font-size: clamp(0.6rem, 0.8rem, 0.7rem);
        margin-bottom: 3px;
    }

    .text-overlay .p1 {
        font-size: clamp(0.5rem, 0.7rem, 0.6rem);
        margin-bottom: 3px;
    }

    .text-overlay .p2 {
        font-size: clamp(0.4rem, 0.6rem, 0.5rem);
        margin-bottom: 3px;
    }

    .text-overlay .p3 {
        font-size: clamp(0.3rem, 0.5rem, 0.4rem);
        margin-bottom: 4px; /* Mínimo espacio en pantallas muy pequeñas */
    }

    .confirm-btn {
        padding: 2px 6px;
        font-size: clamp(0.6rem, 0.9rem, 0.7rem);
        border-radius: 3px;
        margin-top: 0;
    }
}

@media (min-width: 820px) and (max-width: 1366px) {
    .text-overlay {
        top: 40%;
        width: 75%;
        padding: 6px;
        text-align: center;
        white-space: normal;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .text-overlay h1 {
        font-size: clamp(1.4rem, 1.8rem, 1.6rem);
        margin-bottom: 5px;
    }

    .text-overlay .p1 {
        font-size: clamp(1rem, 1.5rem, 1.2rem);
        margin-bottom: 4px;
    }

    .text-overlay .p2 {
        font-size: clamp(0.9rem, 1.3rem, 1.1rem);
        margin-bottom: 4px;
    }

    .text-overlay .p3 {
        font-size: clamp(0.8rem, 1.1rem, 1rem);
        margin-bottom: 8px;
    }

    .confirm-btn {
        margin-top: 0;
        padding: 3px 8px;
        font-size: clamp(0.7rem, 1rem, 0.8rem);
        border-radius: 4px;
    }
}
</style>