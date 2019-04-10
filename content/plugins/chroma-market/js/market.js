var app = {


    init: function() {      

        var $titles = document.getElementsByClassName('thallium');

        for (i = 0; i < $titles.length; i++) {

            var $title = $titles[i];
            $title.addEventListener('click', app.hideMyUl);
           
        }

    },

    hideMyUl: function(){    
    
        var $h2 = event.target;
  
        $h2.nextSibling['nextElementSibling'].classList.toggle('hidden');

    }


};
document.addEventListener('DOMContentLoaded', app.init);