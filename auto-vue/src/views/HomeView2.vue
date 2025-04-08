<template>
    <div class="agenda-container">
      <div class="header-container">
        <h1>AGENDA</h1>
        <h3>Xerrades, activitats i tallers</h3>
      </div>
      
    
      <div class="dies-fila">
        <div class="dia-card">
          <h4>DIA 1 <span>(Dimarts 4)</span></h4>
          <p class="hora">9:00 - 16:30</p>
          <div class="event-content">
            <p class="event-tag">Esdeveniment dia 1</p>
            <h5>Xerrada inaugural</h5>
            <p>Presentació de la jornada i ponents principals</p>
          </div>
        </div>
        
        <div class="dia-card">
          <h4>DIA 2 <span>(Dimecres 5)</span></h4>
          <p class="hora">11:30 - 13:30</p>
          <div class="event-content">
            <p class="event-tag">Esdeveniment dia 2</p>
            <h5>Taller pràctic</h5>
            <p>Taller interactiu sobre noves tecnologies</p>
          </div>
        </div>
        
        <div class="dia-card">
          <h4>DIA 3 <span>(Dijous 6)</span></h4>
          <p class="hora">16:00 - 17:30</p>
          <div class="event-content">
            <p class="event-tag">Esdeveniment dia 3</p>
            <h5>Clausura</h5>
            <p>Conclusions i entrega de diplomes</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
   
  }
  </script>
  
  <style scoped>
  .agenda-container {
    margin-top: 5%;
    overflow-x: hidden; 
    margin-bottom: 5%;
  }
  
  .header-container {
    margin-bottom: 20px;
    text-align: left;
  }
  
  .header-container h1 {
    font-size: 1.9rem;
    color: #1976d2;
    margin: 0;
  }
  
  .header-container h3 {
    font-size: 1.1rem;
    color: #7f8c8d;
    font-weight: normal;
    margin-top: 5px;
  }
  
  .dies-fila {
    display: flex;
    justify-content: space-between; 
    gap: 15px; 
    width: 100%;
  }
  
  .dia-card {
    flex: 1; 
    min-width: 0; 
    background: #f9f9f9;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  
  .dia-card h4 {
    font-size: 1.1rem;
    color: #2c3e50;
    margin-bottom: 8px;
  }
  
  .dia-card h4 span {
    font-size: 0.9rem;
    color: #7f8c8d;
    font-weight: normal;
  }
  
  .hora {
    font-size: 0.9rem;
    color: #93c9ff;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  .event-content {
    margin-top: 10px;
  }
  
  .event-tag {
    font-size: 0.8rem;
    color: #7f8c8d;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  .event-content h5 {
    font-size: 1rem;
    color: #2c3e50;
    margin-bottom: 8px;
  }
  
  .event-content p {
    font-size: 0.85rem;
    color: #34495e;
    line-height: 1.4;
  }
  
  
  @media (max-width: 900px) {
    .dies-fila {
      flex-wrap: wrap;
    }
    
    .dia-card {
      flex: 1 1 calc(50% - 20px); 
      min-width: 250px;
    }
  }
  
  @media (max-width: 600px) {
    .dia-card {
      flex: 1 1 100%; 
    }
    
    .header-container h1 {
      font-size: 1.5rem;
    }
    
    .header-container h2 {
      font-size: 1.2rem;
    }
  }
  </style>