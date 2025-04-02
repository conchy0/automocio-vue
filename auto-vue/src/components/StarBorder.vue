<template>
  <component
    :is="as"
    :class="['glow-container', className]"
    v-bind="rest"
    @click="$emit('click')"
  >
    <div class="glow-track"></div>
    <div class="glow-effect" :style="glowStyle"></div>
    <div class="button-content">
      <slot />
    </div>
  </component>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  as: {
    type: String,
    default: 'button'
  },
  className: {
    type: String,
    default: ''
  },
  speed: {
    type: String,
    default: '9s'
  },
  intensity: {
    type: Number,
    default: 0.9
  }
});

const glowStyle = computed(() => ({
  '--glow-intensity': props.intensity,
  '--animation-speed': props.speed
}));

defineEmits(['click']);
</script>

  
<style scoped>
.glow-container {
  position: relative;
  display: inline-block;
  border-radius: 40px;
  overflow: hidden;
  background: transparent;
  border: none;
  padding: 1px;
}

.glow-track {
  position: absolute;
  inset: 0;
  border-radius: 40px;
  background: linear-gradient(
    90deg,
    rgba(255, 255, 255, 0.2),
    rgba(255, 255, 255, 0.5),
    rgba(255, 255, 255, 0.2)
  );
  z-index: 0;
}

.glow-effect {
  position: absolute;
  width: 30%;
  height: 100%;
  border-radius: 40px;
  background: linear-gradient(
    90deg,
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, var(--glow-intensity, 1)),
    rgba(255, 255, 255, 0)
  );
  filter: blur(4px);
  animation: fluidGlow 4.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
  z-index: 1;
  opacity: 1;
}

.button-content {
  position: relative;
  padding: 10px 20px;
  background: linear-gradient(135deg, #42a5f5, #1565c0);
  color: white;
  font-size: 1rem;
  font-weight: 500;
  text-align: center;
  border-radius: 40px;
  z-index: 2;
  border: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.glow-container:hover .button-content {
  transform: scale(1.05);
  background: linear-gradient(135deg, #64b5f6, #1976d2);
}

@keyframes fluidGlow {
  0% {
    left: -50%;
    opacity: 0.8;
  }
  50% {
    left: 100%;
    opacity: 1;
  }
  100% {
    left: 190%;
    opacity: 0.8;
  }
}

@media (max-width: 820px) {
  .glow-container {
    border-radius: 35px;
  }

  .button-content {
    padding: 5px 10px;
    font-size: 0.7rem;
    border-radius: 35px;
  }

  .glow-effect {
    filter: blur(2px);
    width: 12%;
    height: 50%;
    animation-duration: 5s; /* Ajustar velocidad de animación */
  }
}

@media (max-width: 768px) {
  .glow-container {
    border-radius: 30px;
  }

  .button-content {
    padding: 4px 8px;
    font-size: 0.6rem;
    border-radius: 30px;
  }

  .glow-effect {
    filter: blur(1.8px);
    width: 10%;
    height: 40%;
    animation-duration: 4.5s; /* Ajustar velocidad de animación */
  }
}

@media (max-width: 480px) {
  .glow-container {
    border-radius: 25px;
  }

  .button-content {
    padding: 3px 6px;
    font-size: 0.5rem;
    border-radius: 25px;
  }

  .glow-effect {
    filter: blur(1.5px);
    width: 8%;
    height: 35%;
    animation-duration: 4s; /* Ajustar velocidad de animación */
  }
}

@media (max-width: 395px) {
  .glow-container {
    border-radius: 20px;
  }

  .button-content {
    padding: 2px 4px;
    font-size: 0.4rem;
    border-radius: 20px;
  }

  .glow-effect {
    filter: blur(1px);
    width: 6%;
    height: 30%;
    animation-duration: 3.5s; /* Ajustar velocidad de animación */
  }
}

@media (min-width: 820px) and (max-width: 1366px) {
  .glow-container {
    border-radius: 40px;
  }

  .button-content {
    padding: 6px 12px;
    font-size: 0.8rem;
    border-radius: 40px;
  }

  .glow-effect {
    filter: blur(2.5px);
    width: 15%;
    height: 60%;
    animation-duration: 6s; /* Ajustar velocidad de animación */
  }
}
</style>