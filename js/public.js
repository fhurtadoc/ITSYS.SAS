$(document).ready(function(){

    $(window).load(function() {
        $('.flexslider').flexslider({
            touch: true,
            pauseOnAction: false,
            pauseOnHover: false,
        });
      });
      

 $('.flexslider').css({"height":$(window).height()+'px'})

    let flag = false;
    let scroll;
    
    $(window).scroll(function(){

        scroll=$(window).scrollTop();
        if(scroll>50){
            if(!flag){
                $("#logo").css({"margin-top": "5px", "width": "80px","height":"50px", "margin-right":"20px"});
            $("header").css({"background-color": "#007bff"});
				flag = true;

            }
            
        }else{

            if(flag){
                $("#logo").css({"margin-top": "150px", "width": "350px","height":"300px"});
                

				$("header").css({"background-color": "transparent"});
				flag = false;
			}

        }

    });
    


});
