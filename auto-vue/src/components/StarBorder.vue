<template>
    <component
      :is="as"
      :class="['glow-container', className]"
      v-bind="rest"
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
      default: '6s'
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
  </script>
  
  <style scoped>
  .glow-container {
    position: relative;
    display: inline-block;
    border-radius: 50px;
    overflow: hidden;
    background: transparent;
    border: none;
    padding: 2px;
  }
  
  .glow-track {
    position: absolute;
    inset: 0;
    border-radius: 50px;
    background: linear-gradient(
      90deg,
      rgba(255, 255, 255, 0.1),
      rgba(255, 255, 255, 0.05),
      rgba(255, 255, 255, 0.1)
    );
    z-index: 0;
  }
  
  .glow-effect {
    position: absolute;
    width: 40%;
    height: 100%;
    border-radius: 50px;
    background: linear-gradient(
      90deg,
      rgba(255, 255, 255, 0),
      rgba(255, 255, 255, var(--glow-intensity, 0.9)),
      rgba(255, 255, 255, 0)
    );
    filter: blur(8px);
    animation: fluidGlow var(--animation-speed, 6s) cubic-bezier(0.4, 0, 0.2, 1) infinite;
    z-index: 1;
    opacity: 0;
  }
  
  .button-content {
    position: relative;
    padding: 16px 40px;
    background: linear-gradient(135deg, #64b5f6, #1976d2);
    color: white;
    font-size: 1.1rem;
    font-weight: 500;
    text-align: center;
    border-radius: 50px;
    z-index: 2;
    border: none;
    transition: all 0.4s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }
  
  @keyframes fluidGlow {
    0% {
      left: -20%;
      opacity: 0;
    }
    20% {
      opacity: 0.8;
    }
    60% {
      opacity: 0.9;
    }
    80% {
      opacity: 0.5;
    }
    100% {
      left: 80%;
      opacity: 0;
    }
  }
  </style>