  $(document).ready(function() {      
       
      $("select[name='department']").change(function() {
         alert($(this).val());
         if($(this).val()=="Egypt")
           {
             $("select[name='city']").show();
           }
           else
             {
               $("select[name='city']").hide();
             }
      });

      
      });
