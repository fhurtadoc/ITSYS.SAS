$(document).ready(function(){


    

   //slider 

   let slider=document.querySelector(".slider-container");
   let sliderIndividual=document.querySelectorAll(".contenido-slider");
   let contenido=document.querySelector(".contenido");
   let contador=1;
   let whith=sliderIndividual[0].clientWidth;
   let intervalo=5000;


   window.addEventListener("resize", function(){
        whith=sliderIndividual[0].clientWidth;
       
   });

   setInterval(function(){         
    sliders();
 },intervalo);


   function sliders(){
       slider.style.transform="translate("+(-whith*contador)+"px)";
       slider.style.transition=" transform .5s";                 
       contador ++;

       if(contador===sliderIndividual.length){
           setTimeout(function() {
            slider.style.transform="translate(0px)";
            slider.style.transition=" transform .5s";                        
            contador=1;
           },1000)

       }
   }

   //menu


    let flag = false;
    let scroll;
    let menu=document.getElementById("head");
    let letra=document.querySelector(" ul li a");
    
    $(window).scroll(function(){
        scroll=$(window).scrollTop();
        if(scroll>30){
         if(!flag){
         menu.style.background="#018ABE";          
		 flag = true;
         }            
        }else{
            menu.style.background="none";            
            flag=false;
        }       

    });


    //efecto scroll

function mostrarScroll() {
    let objetoScroll=document.querySelectorAll(".animation");
        let scrollTop=document.documentElement.scrollTop;
        for(var i=0; i <objetoScroll.length; i++){
            let alutaAnimado=objetoScroll[i].offsetTop;
            if(alutaAnimado -500 <scrollTop){
                objetoScroll[i].style.opacity=1;
                objetoScroll[i].classList.add("slogan-animation"); 
            }else{
                objetoScroll[i].style.opacity=0;
                
            }
        }
        
    }

window.addEventListener('scroll', mostrarScroll);


});
