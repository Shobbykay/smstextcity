$(function(){

    const baseUrl = window.location.origin+'/api/';

    function camelCase(str) {
        return str.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index)
        {
            return index == 0 ? word.toLowerCase() : word.toUpperCase();
        }).replace(/\s+/g, '');
    }

    function titleCase(str) {
        str = str.toLowerCase();
        str = str.split(' ');

        for (var i = 0; i < str.length; i++) {
            str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
        }

        return str.join(' ');
    }

    String.prototype.isNumber = function(){return /^\d+$/.test(this);}

    let loader = '<div class="loader">\n' +
        '    <svg class="circular" viewBox="25 25 50 50">\n' +
        '      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>\n' +
        '    </svg>\n' +
        '  </div>';

    let full_page_loader = '<div class="full_page_loader">' + loader + '</div>';

    const preloader = {
        init:function(){
            $('body').append(full_page_loader);
        },
        close:function(){
            $('.full_page_loader').remove().fadeOut(300);
        }
    };


	//login
	$("#login").submit(function(e){
        e.preventDefault();

        $("button#loginbtn").prop('disabled', true);
        var formData = new FormData(this);
        formData.append("action", "login");

        preloader.init();

        $.ajax({
            url: "./db/forms.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(data){
                //
            },
            success: function(obj){
                var data = JSON.parse(obj);
                console.log(data);

                if (data.code == "422"){
                    iziToast.error({
                        title: 'Login',
                        message: data.message,
                    });
                }else{
                    iziToast.success({
                        title: 'Login',
                        message: data.message,
                    });

                    setTimeout(function(){
                        location.href='./dashboard.php';
                    },1000);
                }

                $("button#loginbtn").prop('disabled', false);
                preloader.close();

            },
            error: function(data,msg,status){
                $("button#loginbtn").prop('disabled', false);
                preloader.close();
                console.log(data, msg);

                iziToast.error({
                    title: "Error",
                    message: "An error just occurred: " + status+data+msg,
                });
                
            }
        });
    });


});