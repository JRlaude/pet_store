/**
 * Sidebar DOM
 */
 let path = window.location.pathname;
 const getActive = document.querySelectorAll('.active');
 const dashboardPath = document.querySelector('#dashboard-link').pathname;
 const productsPath = document.querySelector('#products-link').pathname;  
 const ordersPath = document.querySelector('#orders-link').pathname;  
 /**
  * FUNCTIONS
  */ 
 // To change the active navigation link in side bar
 window.onload = () => {
     switch (path) {
         case dashboardPath:
             getActive[0].classList.remove('active');
             document.querySelector('#dashboard-link').classList.add('active');
             break;
     
         case productsPath:
             getActive[0].classList.remove('active');
             document.querySelector('#products-link').classList.add('active');
             break;
      
             case ordersPath:
                getActive[0].classList.remove('active');
                document.querySelector('#orders-link').classList.add('active');
                break;
      
                
         default:
             break;
     }
 }
  