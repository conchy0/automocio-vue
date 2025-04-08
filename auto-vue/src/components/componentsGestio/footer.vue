<template>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section institut-name">
          <p>Institut Montilivi</p>
        </div>
                
        <div class="footer-section footer-info">
          <p>Av.Montilivi,125</p>
          <p>17003 Girona(Girona)</p>
          <p>+34 972 20 94 58</p>
          <p>institutmontilivi@xtec.cat</p>
          <p><a href="https://www.institutmontilivi.cat" target="_blank">www.institutmontilivi.cat</a></p>
        </div>
        
        <div class="footer-section social-icons">
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
    width: 100%;
    box-sizing: border-box;
    margin-top: auto;
  }
  .footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
  }
  .footer-section {
    flex: 1;
  }
  .footer-info p {
    margin: 5px 0;
    font-size: 14px;
  }
  .footer-info a {
    color: white;
    text-decoration: none;
  }
  .footer-info a:hover {
    text-decoration: underline;
  }
  .social-icons {
    display: flex;
    gap: 10px;
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
  
  