<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section">
          <p class="title">Institut Montilivi</p>
        </div>
        
        <div class="footer-info">
          <p>Av. Montilivi, 125</p>
          <p>17003 Girona (Girona)</p>
          <p>Tel.: 972209458</p>
          <p>Fax: 972209069</p>
          <p>Mail: <a href="mailto:institutmontilivi@xtec.cat">institutmontilivi@xtec.cat</a></p>
        </div>
        
        <div class="social-icons">
          <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </footer>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  .footer {
    background-color: #1976d2;
    color: white;
    padding: 20px 0;
    text-align: center;
  }
  .footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1500px;
    margin: 0 auto;
  }
  .footer-section .title {
    font-weight: bold;
    font-size: 18px;
  }
  .footer-info p {
    margin: 3px 0;
    font-size: 14px;
  }
  .footer-info a {
    color: white;
    text-decoration: none;
    font-weight: bold;
  }
  .footer-info a:hover {
    text-decoration: underline;
  }
  .social-icons {
    display: flex;
    gap: 15px;
  }
  .social-icon {
    color: white;
    font-size: 24px;
    text-decoration: none;
  }
  .social-icon:hover {
    opacity: 0.8;
  }
  </style>
  